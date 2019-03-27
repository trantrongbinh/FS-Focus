<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Repositories\ArticleRepository;

class ArticleController extends ApiController
{
    protected $article;

    public function __construct(ArticleRepository $article)
    {
        parent::__construct();

        $this->article = $article;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        return $this->response->collection($this->article->pageWithRequest($request));
    }

    /**
     * Get draft post.
     *
     * @param  int $userId
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDraft($userId)
    {
        $article = $this->article->getDraftByUserID($userId);

        return $this->response->collection($article);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ArticleRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ArticleRequest $request)
    {
        $data = array_merge($request->all(), [
            'user_id' => \Auth::id(),
            'last_user_id' => \Auth::id(),
            'is_original' => true,
            'published_at' => now()->timestamp,
        ]);

        $this->article->store($data);
        $this->article->syncTag(json_decode($request->get('tags')));

        return $this->response->withNoContent();
    }

    /**
     * Save draft post
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveDraft(Request $request)
    {
        $data = array_merge($request->all(), [
            'user_id' => \Auth::id(),
            'last_user_id' => \Auth::id(),
        ]);
        $draftArticle = $this->article->store($data);

        if (!empty($request->get('tags'))) {
            $this->article->syncTag(json_decode($request->get('tags')));
        }

        return $this->response->json($draftArticle);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        return $this->response->item($this->article->getById($id));
    }

    /**
     * Update draft post
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateDraft(Request $request, $id)
    {
        $data = array_merge($request->all(), [
            'last_user_id' => \Auth::id()
        ]);

        $draftArticle = $this->article->update($id, $data);

        if (!empty($request->get('tags'))) {
            $this->article->syncTag(json_decode($request->get('tags')));
        }

        return $this->response->json($draftArticle);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ArticleRequest $request
     * @param  int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $data = array_merge($request->all(), [
            'last_user_id' => \Auth::id()
        ]);

        $this->article->update($id, $data);

        if (!empty($request->get('tags'))) {
            $this->article->syncTag(json_decode($request->get('tags')));
        }

        return $this->response->withNoContent();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->article->destroy($id);

        return $this->response->withNoContent();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function showVote(Request $request, $id)
    {
        $vote = $this->article->getVoteById($id, $request);

        return $this->response->json($vote);
    }
}
