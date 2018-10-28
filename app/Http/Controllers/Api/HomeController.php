<?php

namespace App\Http\Controllers\Api;

use App\Repositories\UserRepository;
use App\Repositories\VisitorRepository;
use App\Repositories\ArticleRepository;
use App\Repositories\CommentRepository;
use Carbon\Carbon;

class HomeController extends ApiController
{
    protected $user;
    protected $visitor;
    protected $article;
    protected $comment;

    public function __construct(
        UserRepository $user,
        VisitorRepository $visitor,
        ArticleRepository $article,
        CommentRepository $comment)
    {
        parent::__construct();

        $this->user = $user;
        $this->visitor = $visitor;
        $this->article = $article;
        $this->comment = $comment;
    }

    public function statistics()
    {
        $users = $this->user->getNumber();
        $visitors = $this->article->countAllViews();
        $articles = $this->article->getNumber();
        $comments = $this->comment->getNumber();

        $new_users = $this->user->getNewNumberToday();
        $views_article = $this->article->countAllViewsToday();
        $new_articles = $this->article->getNewNumberToday();
        $new_comments = $this->comment->getNewNumberToday();
        
        $data = compact('users', 'visitors', 'articles', 'comments', 'new_users', 'views_article', 'new_articles', 'new_comments');

        return $this->response->json($data);
    }

}
