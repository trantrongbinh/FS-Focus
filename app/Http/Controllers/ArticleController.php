<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Repositories\TagRepository;
use App\Repositories\CategoryRepository;
use App\Http\Requests\ArticleRequest;
use App\Repositories\ArticleRepository;

class ArticleController extends Controller
{
    protected $article;

    /**
    * @var \App\Repositories\TagRepository
    * @var  \App\Repositories\CategoryRepository
    */
    protected $tag;
    protected $category;

    public function __construct(ArticleRepository $article, CategoryRepository $category, TagRepository $tag)
    {
        $this->article = $article;
        $this->category = $category;
        $this->tag = $tag;
    }

    /**
     * Display the articles resource.
     *
     * @return mixed
     */
    public function index()
    {
        $articles = $this->article->page(config('blog.article.number'), config('blog.article.sort'), config('blog.article.sortColumn'));

        return view('article.index', compact('articles'));
    }

    /**
     * Display the article resource by article slug.
     *
     * @param  string $slug
     * @return mixed
     */
    public function show($slug)
    {
        $article = $this->article->getBySlug($slug);

        return view('article.show', compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->all()->pluck('name', 'id');
        $tags = $this->tag->all()->pluck('tag', 'id');

        return view('article.create', compact('categories', 'tags'));
    }

    /**
     * Store a new article.
     *
     * @param  DiscussionRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

}
