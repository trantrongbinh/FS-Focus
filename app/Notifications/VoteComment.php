<?php

namespace App\Notifications;

use App\User;
use App\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Notifications\CustomDbChannel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class VoteComment extends Notification implements ShouldQueue
{
    use Queueable;

    protected $vote_type;
    protected $user;
    protected $comment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($vote_type, User $user, Comment $comment)
    {
        $this->vote_type = $vote_type;
        $this->user = $user;
        $this->comment = $comment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [CustomDbChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        $data = [
            'agent_id' => $this->user->id,
            'table_type' => 'comment',
            'action' => $this->vote_type,
            'table_data' => [
                'team_id' => $this->comment->commentable->team_id,
                'slug' => $this->comment->commentable->slug,
                'title' => $this->comment->commentable->title,
            ],
        ];

        return $data;
    }
}
