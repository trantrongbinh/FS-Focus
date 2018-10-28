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
            'subtitle'          => $article->subtitle,
            'user'              => $article->user,
            'slug'              => $article->slug,
            'content'           => $article->content['raw'],
            'page_image'        => $article->page_image,
            'meta_description'  => $article->meta_description,
            'is_original'       => $article->is_original,
            'is_draft'          => $article->is_draft,
            'visitors'          => $article->view_count,
            'published_at'      => $article->published_at->diffForHumans(),
            'published_time'    => $article->published_at->toDateTimeString(),
            'is_voted'      => auth()->guard('api')->id() ? $comment->isVotedBy(auth()->guard('api')->id()) : false,
            'is_up_voted'   => auth()->guard('api')->id() ? auth()->guard('api')->user()->hasUpVoted($comment) : false,
            'is_down_voted' => auth()->guard('api')->id() ? auth()->guard('api')->user()->hasDownVoted($comment) : false,
            'vote_count'    => $comment->countUpVoters(),
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
