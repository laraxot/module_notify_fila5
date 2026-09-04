<?php

declare(strict_types=1);

namespace Modules\Notify\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TicketAssignedNotification extends Notification
{
    use Queueable;

    /**
     * @return void
     */
    public function __construct(
        public mixed $ticket, // Using mixed type since Ticket model doesn't exist
        public Authenticatable $assignedBy
    ) {}

    /**
     * @return array<int, string>
     */
    public function via(mixed $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(mixed $notifiable): MailMessage
    {
        $name = property_exists($this->assignedBy, 'name') ? $this->assignedBy->name : null;
        $displayName = is_string($name) ? $name : 'Unknown';

        return (new MailMessage)
            ->subject('New Ticket Assigned')
            ->line('A new ticket has been assigned to you by '.$displayName)
            ->action('View Ticket', url('/'));
    }

    /**
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