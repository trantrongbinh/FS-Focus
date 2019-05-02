<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Repositories\CommentRepository;
use App\Repositories\ArticleRepository;

class MeController extends ApiController
{
    protected $comment, $article;

    public function __construct(CommentRepository $comment, ArticleRepository $article)
    {
        parent::__construct();

        $this->comment = $comment;
        $this->article = $article;
    }

    /**
     * post up vote the comment by user.
     *
     * @param Request $request
     * @param string $type
     *
     * @return mixed
     */
    public function postVoteComment(Request $request, $type)
    {
        $this->validate($request, [
            'id' => 'required|exists:comments,id',
        ]);

        ($type == 'up')
            ? $this->comment->toggleVote($request->id)
            : $this->comment->toggleVote($request->id, false);

        return $this->response->withNoContent();
    }

    /**
     * post up vote the article by user.
     *
     * @param Request $request
     * @param string $type
     *
     * @return mixed
     */
    public function postVoteArticle(Request $request, $type)
    {
        $this->validate($request, [
            'id' => 'required|exists:articles,id',
        ]);

        ($type == 'up')
            ? $this->article->toggleVote($request->id)
            : $this->article->toggleVote($request->id, false);

        return $this->response->withNoContent();
    }

    /**
     * post bookmark the post by user.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function bookmarkArticle(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:articles,id',
        ]);

        $this->article->toggleBookmark($request->id, $request['is_hasBookmarked']);

        return $this->response->withNoContent();
    }
}
