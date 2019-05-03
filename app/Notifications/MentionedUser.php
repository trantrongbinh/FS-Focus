<?php

namespace App\Notifications;

use App\User;
use App\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Notifications\CustomDbChannel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MentionedUser extends Notification implements ShouldQueue
{
    use Queueable;

    protected $comment;
    protected $user;

    /**
     * Create a new notification instance.
     *
     * @param \App\Comment $comment
     *
     * @return void
     */
    public function __construct(Comment $comment, User $user)
    {
        $this->comment = $comment;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [CustomDbChannel::class, 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $comment = $this->comment;

        $type = lang(substr(ucfirst($comment->commentable_type), 0, -1));

        $message = lang('Mentioned Content', [
            'user' => $comment->user->name,
            'title' => $comment->commentable->title]);

        $url = ($comment->commentable_type == 'articles')
            ? url('article', ['slug' => $comment->commentable->slug])
            : url('discussion', ['id' => $comment->commentable->id]);

        $data = [
            'username' => $notifiable->name,
            'message' => $message,
            'content' => json_decode($comment->content)->raw,
            'url' => $url
        ];

        return (new MailMessage)
            ->subject(lang('Someone Mentioned', ['type' => strtolower($type), 'title' => $comment->commentable->title]))
            ->markdown('mail.mention.user', $data);
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
            'agent_id' => $this->comment->user_id,
            'table_type' => 'comment',
            'action' => 'Reply',
            'table_data' => [
                'team_id' => $this->comment->commentable->team_id,
                'slug' => $this->comment->commentable->slug,
                'title' => $this->comment->commentable->title,
            ],
        ];

        return $data;
    }
}
