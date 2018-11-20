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
        if (\Auth::check()) {
            // $teams = Team::with(['users' => function($q) {
            //         $q->select('users.id','name', 'nickname');
            //     }
            // ])
            // ->OrderBy('rank', 'desc')
            // ->get(['teams.id', 'name', 'slug', 'avatar'])
            // ->take(4);

            $yourTeam = Team::select('name', 'slug', 'avatar')
                ->whereHas('users', function($q) {
                    $q->where('users.id', \Auth::id())->where('role', 1);
                })->withCount('users')->get();

            $otherTeam = Team::select('name', 'slug', 'avatar')
                ->whereHas('users', function($q) {
                    $q->where('users.id', '!=', \Auth::id());
                })->take(4)->get();

                dd($yourTeam);
        } else {
            $yourTeam = null;
            $otherTeam = Team::select('name', 'slug', 'avatar')->take(4)->get();
        }

        $view->with('teams', ['yourTeam' => $yourTeam, 'otherTeam' => $otherTeam]);
    }
}
