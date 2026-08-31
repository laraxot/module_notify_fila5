<?php

declare(strict_types=1);

namespace Modules\Notify\Notifications;

use Illuminate\Bus\Queueable;
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
=======
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
=======
>>>>>>> a988596b (first)
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Modules\User\Models\User;

class TicketAssignedNotification extends Notification
{
    use Queueable;

<<<<<<< HEAD
<<<<<<< HEAD
    public function __construct(
        public Model $ticket,
        public Authenticatable $assignedBy
=======
=======
>>>>>>> a988596b (first)
    /**
     * @return void
     */
    public function __construct(
        public mixed $ticket, // Using mixed type since Ticket model doesn't exist
        public User $assignedBy
<<<<<<< HEAD
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
=======
>>>>>>> a988596b (first)
    ) {}

    /**
     * @return array<int, string>
     */
<<<<<<< HEAD
    public function via(object $notifiable): array
=======
    public function via(mixed $notifiable): array
>>>>>>> a988596b (first)
    {
        return ['mail', 'database'];
    }

<<<<<<< HEAD
    public function toMail(object $notifiable): MailMessage
    {
<<<<<<< HEAD
        $name = $this->assignedBy instanceof User ? ($this->assignedBy->name ?? null) : null;
        $displayName = is_string($name) ? $name : 'Unknown';

        return (new MailMessage)
            ->subject('New Ticket Assigned')
            ->line('A new ticket has been assigned to you by '.$displayName)
=======
        return (new MailMessage)
            ->subject('New Ticket Assigned')
            ->line("A new ticket has been assigned to you by {$this->assignedBy->name}")
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
=======
    public function toMail(mixed $notifiable): MailMessage
    {
        return (new MailMessage())
            ->subject('New Ticket Assigned')
            ->line("A new ticket has been assigned to you by {$this->assignedBy->name}")
>>>>>>> a988596b (first)
            ->action('View Ticket', url('/'));
    }

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * @return array{assigned_by: int|string}
     */
    public function toArray(mixed $notifiable): array
    {
        /** @var int|string $key */
        $key = $this->assignedBy->getAuthIdentifier();

        return [
            'assigned_by' => $key,
        ];
    }
}
=======
     * @return array{assigned_by: string}
     */
    public function toArray(object $notifiable): array
    {
        return [
            'assigned_by' => $this->assignedBy->id,
        ];
    }
}
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
=======
     * @return array{assigned_by: string}
     */
    public function toArray(mixed $notifiable): array
    {
        return [
            'assigned_by' => $this->assignedBy->id];
    }
}
>>>>>>> a988596b (first)
