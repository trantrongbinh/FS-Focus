<?php

use Illuminate\Database\Seeder;
use App\Team;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$listRoleName = ['admin', 'member'];
    	$listUserId = \App\User::pluck('id');
        
        factory(Team::class, 15)->create()
        	->each(function ($team) use ($listUserId, $listRoleName) {
	        	$team->users()->attach($listUserId->random(), [
	        		'role' => mt_rand(0, 1)
	        	]);
    		});
    }
}
