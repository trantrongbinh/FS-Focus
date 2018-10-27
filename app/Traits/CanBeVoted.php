<?php

namespace App\Traits;

use Overtrue\LaravelFollow\Traits\CanBeVoted as parentCanBeVoted;

trait CanBeVoted
{
	use parentCanBeVoted;
    /**
     * Return the total vote score
     *
     * @return int
     */
    public function countTotalVotes()
    {
        $downVote = $this->countVoters('downvote');
        $upVotes = $this->countVoters('upvote');
        return $upVotes - $downVote;
    }

    /**
     * Count the number of up votes.
     *
     * @return int
     */
    public function countUpVoters()
    {
        return $this->countVoters('upvote');
    }

    /**
     * Count the number of down votes.
     *
     * @return int
     */
    public function countDownVoters()
    {
        return $this->countVoters('downvote');
    }

    /**
     * Count the number of voters.
     *
     * @param  string $type
     *
     * @return int
     */
    public function countVoters($type = null)
    {
        $voters = $this->voters();

        if(!is_null($type)) $voters->wherePivot('relation', $type);

        return $voters->count();
    }
}
