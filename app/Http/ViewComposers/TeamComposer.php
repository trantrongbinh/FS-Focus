<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Team;

class TeamComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
    	$teams = Team::with(['users' => function($q) {
    				$q->select('users.id','name', 'nickname');
		    	}
		    ])
            ->OrderBy('rank', 'desc')
            ->get(['teams.id', 'name', 'slug', 'avatar'])
            ->take(4);

        $view->with('teams', $teams);
    }
}
