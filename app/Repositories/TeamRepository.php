<?php

namespace App\Repositories;

use App\Team;

class TeamRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(Team $team)
    {
        $this->model = $team;
    }

    /**
     * Store a new team.
     * @param  array $data
     * @return Model
     */
    public function store($data, $syncData)
    {
        $team = $this->model->create($data);

        $this->syncTeam($team, $syncData);

        return $team;
    }

    /**
     * Sync the team for the user.
     *
     * @param  Discussion $discussion
     * @param  array $team
     * @return void
     */
    public function syncTeam(Team $team, array $syncData)
    {
        return $team->users()->sync($syncData);
    }

    /**
     * Get record by the slug.
     *
     * @param  string $slug
     * @return collection
     */
    public function getBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }

    /**
     * Attach the team for the user.
     *
     * @param  Team $team
     * @param  User $id
     * @return void
     */
    public function attachUser(Team $team, $id)
    {
        return $team->users()->attach($id);
    }
}
