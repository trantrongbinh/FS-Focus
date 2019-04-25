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
        $a = $this->morphMany(new DatabaseNotification, 'notifiable')->join('users', 'users.id', '=', 'notifications.notifiable_id')->orderBy('notifications.created_at', 'desc');

        return $a;
    }
}
