<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    /**
     * Display the categories resource.
     *
     * @return mixed
     */
    public function index()
    {
        $categories = $this->category->all();

        return view('category.index', compact('categories'));
    }

    /**
     * Display the category resource by category name.
     *
     * @param  string $category
     * @return mixed
     */
    public function show($category)
    {
        if (!$category = $this->category->getByName($category)) abort(404);

        $articles = $category->articles;

        return view('category.show', compact('category', 'articles'));
    }

    /**
     * Store a newly created resource.
     *
     * @param  \App\Http\Requests\CategoryRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CategoryRequest $request)
    {
        $data = array_merge($request->all(), [
            'user_id' =>  \Auth::id(),
        ]);
        
        $category = $this->category->store($data);

        return back()->with('category_id', $category->id);
    }
}
