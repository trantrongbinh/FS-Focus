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
            $yourTeam = Team::select('id', 'name', 'slug', 'avatar')
                ->whereHas('users', function($q) {
                    $q->where('users.id', \Auth::id())->where('role', 1);
                })
                ->withCount('users')
                ->get();


            $otherTeam = Team::select('id', 'name', 'slug', 'avatar')
                ->whereHas('users', function($q) {
                    $q->where('users.id', '!=', \Auth::id());
                })
                ->withCount('users')
                ->take(4)
                ->get();
        } else {
            $yourTeam = null;
            $otherTeam = Team::select('id', 'name', 'slug', 'avatar')
            ->withCount('users')
            ->take(4)
            ->get();
        }

        $view->with('teams', ['yourTeam' => $yourTeam, 'otherTeam' => $otherTeam]);
    }
}
