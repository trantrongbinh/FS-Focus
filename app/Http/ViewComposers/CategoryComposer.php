<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Category;

class CategoryComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $public = Category::withCount('articles')->whereNull('user_id')->OrderBy('articles_count', 'desc')->get();
        
        if (\Auth::check()) {
            $yourCategory = Category::withCount('articles')->where('user_id', \Auth::id())->OrderBy('articles_count', 'desc')->get();
            $other = Category::withCount('articles')->whereNotNull('user_id')->where('user_id', '!=', \Auth::id())->OrderBy('articles_count', 'desc')->get();
        } else {
            $yourCategory = null;
            $other = Category::withCount('articles')->whereNotNull('user_id')->OrderBy('articles_count', 'desc')->get();
        }

        $view->with('categories', ['yourCategory' => $yourCategory, 'public' => $public, 'other' => $other]);
    }
}
