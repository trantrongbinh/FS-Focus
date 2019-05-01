<?php

namespace App\Traits;

use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\DatabaseNotification;

trait NotificationHandling
{
	use Notifiable;

	/**
     * Get the entity's notifications without yourself.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function getNotifications()
    {
        return $this->morphMany(new DatabaseNotification, 'notifiable')
                    ->join('users', 'users.id', '=', 'notifications.agent_id')
                    ->select('notifications.*', 'users.id', 'users.name',  'users.avatar')
                    ->where('agent_id', '!=', \Auth::id())
                    ->orderBy('notifications.created_at', 'desc');
    }

    /**
     * Get the entity's unread notifications from outside, not yourself.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function unreadNotificationsCustom()
    {
        return $this->notifications()->where('agent_id', '!=', \Auth::id())->whereNull('read_at');
    }
}
