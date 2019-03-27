<?php

namespace App\Repositories;

use App\Article;
use App\View;
use App\Notifications\VoteArticle;
use App\Scopes\DraftScope;
use Carbon\Carbon;

class ArticleRepository
{
    use BaseRepository;

    protected $model;

    protected $visitor;

    public function __construct(Article $article, VisitorRepository $visitor)
    {
        $this->model = $article;
        $this->visitor = $visitor;
    }

    /**
     * Get the page of articles without draft scope.
     *
     * @param  Request $request
     * @param  integer $number
     * @param  string $sort
     * @param  string $sortColumn
     * @return collection
     */
    public function pageWithRequest($request, $number = 10, $sort = 'desc', $sortColumn = 'created_at')
    {
        $this->model = $this->checkAuthScope();

        $keyword = $request->get('keyword');

        return $this->model
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('title', 'like', "%{$keyword}%");
            })
            ->orderBy($sortColumn, $sort)->paginate($number);
    }

    /**
     * Get the page of articles without draft scope.
     *
     * @param  integer $number
     * @param  string $sort
     * @param  string $sortColumn
     * @return collection
     */
    public function page($number = 10, $sort = 'desc', $sortColumn = 'created_at')
    {
        $this->model = $this->checkAuthScope();

        return $this->model->with(['user', 'tags'])->withCount('comments')->orderBy($sortColumn, $sort)->paginate($number);
    }

    /**
     * Get draft article.
     *
     * @param  int $userId
     * @return mixed
     */
    public function getDraftByUserID($id, $sort = 'desc', $sortColumn = 'created_at')
    {
        return $this->model->withoutGlobalScope(DraftScope::class)->where('is_original', 0)->orderBy($sortColumn, $sort)->get();
    }

    /**
     * Get the article record without draft scope.
     *
     * @param  int $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->model->withoutGlobalScope(DraftScope::class)->findOrFail($id);
    }

    /**
     * Get the slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->model->getUniqueSlug();
    }

    /**
     * Update the article record without draft scope.
     *
     * @param  int $id
     * @param  array $input
     * @return boolean
     */
    public function update($id, $input)
    {
        $this->model = $this->model->withoutGlobalScope(DraftScope::class)->findOrFail($id);

        return $this->save($this->model, $input);
    }

    /**
     * Get the article by article's slug.
     * The Admin can preview the article if the article is drafted.
     *
     * @param $slug
     * @return object
     */
    public function getBySlug($slug)
    {
        $this->model = $this->checkAuthScope();
        $article = $this->model->where('slug', $slug)->withCount('comments')->firstOrFail();

        $this->visitor->log($article->id);

        return $article;
    }

    /**
     * Get the vote of article by article's id.
     *
     * @param $slug
     * @return object
     */
    public function getVoteById($id)
    {
        $article = $this->getById($id);
        $vote = [
            'is_voted' => auth()->id() ? $article->isVotedBy(auth()->id()) : false,
            'is_up_voted' => auth()->id() ? auth()->user()->hasUpVoted($article) : false,
            'is_down_voted' => auth()->id() ? auth()->user()->hasDownVoted($article) : false,
            'vote_count' =>  $article->countUpVoters()
        ];

        return $vote;
    }

    /**
     * Check the auth and the model without global scope when user is the admin.
     *
     * @return Model
     */
    public function checkAuthScope()
    {
        if (auth()->check() && auth()->user()->is_admin) {
            $this->model = $this->model->withoutGlobalScope(DraftScope::class);
        }

        return $this->model;
    }

    /**
     * Sync the tags for the article.
     *
     * @param  int $number
     * @return Paginate
     */
    public function syncTag(array $tags)
    {
        $this->model->tags()->sync($tags);
    }

    /**
     * Search the articles by the keyword.
     *
     * @param  string $key
     * @return collection
     */
    public function search($key)
    {
        $key = trim($key);

        return $this->model
            ->where('title', 'like', "%{$key}%")
            ->orderBy('published_at', 'desc')
            ->paginate(7);

    }

    /**
     * Get a list of tag ids that are associated with the given article.
     *
     * @param \App\Article $article
     *
     * @return array
     */
    public function listTagsIdsForArticle(Article $article)
    {
        return $article->tags->pluck('id')->toArray();
    }

    /**
     * Delete the draft article.
     *
     * @param int $id
     * @return boolean
     */
    public function destroy($id)
    {
        return $this->getById($id)->delete();
    }

    /**
     * Toogle up vote and down vote by user.
     *
     * @param  int $id
     * @param  boolean $isUpVote
     *
     * @return boolean
     */
    public function toggleVote($id, $isUpVote = true)
    {
        $user = auth()->user();

        $article = $this->getById($id);

        if ($article == null) {
            return false;
        }

        return $isUpVote
            ? $this->upOrDownVote($user, $article)
            : $this->upOrDownVote($user, $article, 'down');
    }

    /**
     * Up vote or down vote item.
     *
     * @param  \App\User $user
     * @param  \Illuminate\Database\Eloquent\Model $target
     * @param  string $type
     *
     * @return boolean
     */
    public function upOrDownVote($user, $target, $type = 'up')
    {
        $hasVoted = $user->{'has' . ucfirst($type) . 'Voted'}($target);

        if ($hasVoted) {
            $user->cancelVote($target);
            return false;
        }

        if ($type == 'up') {
            $target->user->notify(new VoteArticle($type . '_vote', $user, $target));
        }

        $user->{$type . 'Vote'}($target);

        return true;
    }

    public function countAllViews()
    {
        $viewsArticles = View::where('viewable_type', 'articles')->count();

        return $viewsArticles;
    }

    public function countAllViewsToday()
    {
        $viewsArticlesToday = View::where('viewable_type', 'articles')
            ->where('viewed_at', '>=', Carbon::today())
            ->count();

        return $viewsArticlesToday;
    }

    /**
     * Get related post by category.
     *
     * @param  object $article
     *
     * @return collection
     */
    public function getRelatedPostsByCategory($article)
    {
        $articles = $article->where('id', '!=' , $article->id)
            ->where('category_id', $article->category_id)
            ->where('user_id', '!=', $article->user_id)
            ->with('user')
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get(['id', 'user_id', 'slug', 'page_image', 'published_at', 'title', 'content']); 

        return $articles;
    }

    /**
     * Get related post by author.
     *
     * @param $article
     *
     * @return collection
     */
    public function getRelatedPostsByAuthor($article)
    {   
        $articles = $article->where('id', '!=' , $article->id)
            ->where('user_id', $article->user_id)
            ->with('user')
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get(); 

        return $articles;
    }
}
