<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Repositories\ArticleRepository;
use Carbon\Carbon;

class ArticleController extends Controller
{
    /**
     * @var \App\Repositories\ArticleRepository
     */
    protected $article;

    public function __construct(ArticleRepository $article)
    {
        $this->article = $article;
    }

    /**
     * Display the articles resource.
     *
     * @return mixed
     */
    public function index()
    {
        $articles = $this->article->page(
            config('blog.article.number'), 
            config('blog.article.sort'), 
            config('blog.article.sortColumn')
        );

        return view('article.index', compact('articles'));
    }

    /**
     * Display the article resource by article slug with related.
     *
     * @param  string $slug
     * @return mixed
     */
    public function show($slug)
    {
        $article = $this->article->getBySlug($slug);
        $related = [];
        
        $related['relatedCategory'] = ($article->category_id != NULL) ? $this->article->getRelatedPostsByCategory($article) : null;
        $related['relatedAuthor'] = $this->article->getRelatedPostsByAuthor($article);

        $article->addViewWithExpiryDate(Carbon::now()->addMinute());
        
        return view('article.show', compact('article', 'related'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a new article.
     *
     * @param  \App\Http\Requests\ArticleHomeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $data = array_merge($request->all(), [
            'user_id' => \Auth::id(),
            'last_user_id' => \Auth::id(),
            'published_at' => date('Y-m-d H:i:s'),
        ]);

        //$time_now =  \Carbon\Carbon::now();
        $data['is_original'] = isset($data['is_original']);
        $data['type'] = isset($data['type']);
        $data['content'] = $data['content'];

        $this->article->store($data);

        if ($request->tags) {
            $this->article->syncTag($data['tags']);
        }

        return redirect()->to('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('article.edit', compact('slug'));
    }

    /**
     * Update the article by id.
     *
     * @param  ArticleHomeRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleHomeRequest $request, $id)
    {
        $article = $this->article->getById($id);

        $this->authorize('update', $article);

        $data = array_merge($request->all(), [
            'last_user_id' => \Auth::id()
        ]);

        $data['content'] = $data['content'];

        $this->article->update($id, $data);

        return redirect()->to("{$this->article->getSlug()}");
    }

}
