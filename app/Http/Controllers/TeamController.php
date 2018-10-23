<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeamRequest;
use App\Repositories\TeamRepository;

class TeamController extends Controller
{
    protected $team;

    public function __construct(TeamRepository $team)
    {
    	$this->middleware('auth')->except(['index', 'show']);
        $this->team = $team;
    }

    /**
     * Store a new team.
     *
     * @param  TeamRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
    	$data = array_merge($request->all(), [
            'slug' => str_slug($request->name)
        ]);
    	$userID = array('user_id' => \Auth::id());
		$syncData = array();

		foreach($userID as $id){
			$syncData[$id] = array('role' => 1);
		}
		
        $this->team->store($data, $syncData);

        return redirect()->to('/');
    }
}
