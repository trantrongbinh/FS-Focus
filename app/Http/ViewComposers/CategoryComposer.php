<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Category;

class CategoryComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('categories', Category::all());
    }
}
