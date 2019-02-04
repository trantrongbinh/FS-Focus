<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Article;

class HotPostComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('hotPosts', Article::select('slug', 'title', 'page_image', 'rate', 'view_count')
            ->withCount('comments')
            ->orderByViewsCount()
            ->take(5)
            ->get());
    }
}
