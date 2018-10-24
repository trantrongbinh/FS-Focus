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
        $yourCategory = Category::withCount('articles')->where('user_id', 1)->get();
        $public = Category::withCount('articles')->whereNull('user_id')->get();
        $other = Category::withCount('articles')->whereNotNull('user_id')->Where('user_id', '!=', 1)->get();

        $view->with('categories', ['yourCategory' => $yourCategory, 'public' => $public, 'other' => $other]);
    }
}
