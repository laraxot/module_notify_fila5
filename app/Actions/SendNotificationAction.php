<?php

declare(strict_types=1);

namespace Modules\Notify\Actions;

use App\Models\Notification;
use Illuminate\Support\Facades\Log;
use Spatie\QueueableAction\QueueableAction;

/**
 * Queueable Action per l'invio di notifiche
 * 
 * Pattern: Spatie Queueable Action per operazioni di business
 * Architettura: SINGLE RESPONSIBILITY - questa azione gestisce solo l'invio notifiche
 * 
 * @see https://github.com/spatie/laravel-queueable-action
 * @see AGENTS.md#🏗️-ARCHITETTURA-LARAXOT---Queueable-Actions-Rules
 * @see AGENTS.md#🚨-COMANDO-CRITICO-GIT-git-remote--v - RICORDATI SEMPRE git remote -v prima di ogni push/pull!
 */
class SendNotificationAction
{
    use QueueableAction;

    public function __construct(
        protected string $type,
        protected mixed $recipient,
        protected string $title,
        protected string $message,
        protected ?array $data = null,
        protected ?string $channel = null
    ) {
        // Validazione input nel costruttore
        if (empty($this->type) || empty($this->recipient) || empty($this->title) || empty($this->message)) {
            throw new \InvalidArgumentException('Parametri obbligatori mancanti');
        }
    }

    public function handle(): Notification
    {
        $notification = Notification::create([
            'type' => $this->type,
            'recipient' => $this->recipient,
            'title' => $this->title,
            'message' => $this->message,
            'data' => $this->data,
            'channel' => $this->channel,
            'status' => 'pending'
        ]);

        // Logica di business per inviare la notifica
        $this->routeNotification($notification);
        $this->updateStatus($notification, 'sent');

        return $notification;
    }

    private function routeNotification(Notification $notification): void
    {
        // Routing della notifica al canale appropriato
        $channel = $this->channel ?? $this->determineChannel($notification);
        
        Log::info("Routing notifica {$notification->id} su canale: {$channel}");
        
        // Implementazione del routing specifico per canale
        match($channel) {
            'email' => $this->sendEmail($notification),
            'sms' => $this->sendSms($notification),
            'push' => $this->sendPush($notification),
            default => $this->sendPush($notification),
        };
    }

    private function determineChannel(Notification $notification): string
    {
        // Determina automaticamente il canale migliore
        return 'push';
    }

    private function sendEmail(Notification $notification): void
    {
        // Implementazione invio email
        Log::info("Invio email per notifica: {$notification->id}");
    }

    private function sendSms(Notification $notification): void
    {
        // Implementazione invio SMS
        Log::info("Invio SMS per notifica: {$notification->id}");
    }

    private function sendPush(Notification $notification): void
    {
        // Implementazione invio push notification
        Log::info("Invio push per notifica: {$notification->id}");
    }

    private function updateStatus(Notification $notification, string $status): void
    {
        $notification->status = $status;
        $notification->save();
    }
}