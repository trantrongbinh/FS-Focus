<?php

namespace App\Transformers;

use App\Article;
use League\Fractal\TransformerAbstract;

class ArticleTransformer extends TransformerAbstract
{
    protected $availableIncludes  = [
        'tags',
        'category',
        'user'
    ];

    public function transform(Article $article)
    {
        return [
            'id'                => $article->id,
            'title'             => $article->title,
            'user'              => $article->user,
            'slug'              => $article->slug,
            'content'           => $article->content['html'],
            'page_image'        => $article->page_image,
            'meta_description'  => $article->meta_description,
            'is_original'       => $article->is_original,
            'visitors'          => $article->view_count,
            'created_at'        => $article->created_at,
            'published_at'      => (is_null($article->published_at)) ? null : $article->published_at->diffForHumans(),
            'published_time'    => (is_null($article->published_at)) ? null : $article->published_at->toDateTimeString(),
            'is_voted'          => auth()->guard('api')->id() ? $article->isVotedBy(auth()->guard('api')->id()) : false,
            'is_up_voted'       => auth()->guard('api')->id() ? auth()->guard('api')->user()->hasUpVoted($article) : false,
            'is_down_voted'     => auth()->guard('api')->id() ? auth()->guard('api')->user()->hasDownVoted($article) : false,
            'vote_count'        => $article->countUpVoters(),
        ];
    }

    /**
     * Include Category
     *
     * @param Article $article
     * @return \League\Fractal\Resource\Collection
     */
    public function includeCategory(Article $article)
    {
        if ($category = $article->category) {
            return $this->item($category, new CategoryTransformer);
        }
    }

    /**
     * Include Tags
     *
     * @param Article $article
     * @return \League\Fractal\Resource\Collection
     */
    public function includeTags(Article $article)
    {
        if ($tags = $article->tags) {
            return $this->collection($tags, new TagTransformer);
        }
    }

    /**
     * Include User
     *
     * @param Article $article
     * @return \League\Fractal\Resource\Collection
     */
    public function includeUser(Article $article)
    {
        if ($user = $article->user) {
            return $this->item($user, new UserTransformer);
        }
    }
}
