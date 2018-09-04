<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Article;

class HotPostComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('hot_post', Article::select('slug', 'title', 'page_image', 'rate', 'view_count')->take(5)->orderBy('view_count', 'desc')->get());
    }
}
