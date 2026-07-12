<?php

declare(strict_types=1);

namespace Modules\Notify\Actions;

use DateTime;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Modules\Notify\Jobs\SendScheduledPushNotification;
<<<<<<< HEAD
use Modules\Notify\Support\PushNotificationPlatformDelivery;
=======
>>>>>>> 18a3188 (.)
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

/**
 * QueueableAction per notifiche push avanzate.
 *
 * Gestisce l'invio di notifiche push attraverso multiple piattaforme e canali.
 */
final class SendPushNotificationAction
{
    use QueueableAction;

    private PushNotificationPlatformDelivery $delivery;

    /** @var list<string> */
<<<<<<< HEAD
    private array $platformNames = ["fcm", "apns", "webpush"];
=======
    private array $platformNames = ['fcm', 'apns', 'webpush'];
>>>>>>> 18a3188 (.)

    public function __construct(?PushNotificationPlatformDelivery $delivery = null)
    {
        $this->delivery = $delivery ?? new PushNotificationPlatformDelivery();
    }

    /**
<<<<<<< HEAD
     * @param array<string, mixed> $notification
     * @param array<string, mixed> $data
=======
     * @param  list<string>  $tokens
     * @param  array<string, mixed>  $notification
     * @param  array<string, mixed>  $data
     * @return array<string, array<string, mixed>>
     */
    public function execute(array $tokens, array $notification, array $data = []): array
    {
        return $this->sendToDevicesInternal($tokens, $notification, $data);
    }

    /**
     * @param  array<string, mixed>  $notification
     * @param  array<string, mixed>  $data
>>>>>>> 18a3188 (.)
     * @return array<string, array<string, mixed>>
     */
    public function sendToDevice(string $token, array $notification, array $data = []): array
    {
<<<<<<< HEAD
=======
        return $this->sendToDeviceInternal($token, $notification, $data);
    }

    /**
     * @param  array<string, mixed>  $notification
     * @param  array<string, mixed>  $data
     * @return array<string, array<string, mixed>>
     */
    private function sendToDeviceInternal(string $token, array $notification, array $data = []): array
    {
>>>>>>> 18a3188 (.)
        $results = [];

        foreach ($this->platformNames as $platform) {
            Assert::string($platform, 'Platform must be a string');
            try {
                $result = $this->delivery->sendToPlatform($platform, $token, $notification, $data);
                $results[$platform] = $result;
            } catch (Exception $e) {
                Log::error("Push notification failed for platform {$platform}", [
                    'error' => $e->getMessage(),
                    'token' => $token,
                    'notification' => $notification,
                ]);

                $results[$platform] = [
                    'success' => false,
                    'error' => $e->getMessage(),
                ];
            }
        }

        return $results;
    }

    /**
     * @param  list<string>  $tokens
     * @param  array<string, mixed>  $notification
     * @param  array<string, mixed>  $data
     * @return array<string, array<string, mixed>>
     */
    public function sendToDevices(array $tokens, array $notification, array $data = []): array
    {
<<<<<<< HEAD
=======
        return $this->execute($tokens, $notification, $data);
    }

    /**
     * @param  list<string>  $tokens
     * @param  array<string, mixed>  $notification
     * @param  array<string, mixed>  $data
     * @return array<string, array<string, mixed>>
     */
    private function sendToDevicesInternal(array $tokens, array $notification, array $data = []): array
    {
>>>>>>> 18a3188 (.)
        $results = [];

        $tokensByPlatform = $this->delivery->groupTokensByPlatform($tokens);

        foreach ($tokensByPlatform as $platform => $platformTokens) {
            Assert::string($platform, 'Platform must be a string');
            Assert::isArray($platformTokens, 'Platform tokens must be an array');
            try {
                $result = $this->delivery->sendBatchToPlatform($platform, $platformTokens, $notification, $data);
                $results[$platform] = $result;
            } catch (Exception $e) {
                Log::error("Batch push notification failed for platform {$platform}", [
                    'error' => $e->getMessage(),
                    'token_count' => count($platformTokens),
                ]);

                $results[$platform] = [
                    'success' => false,
                    'error' => $e->getMessage(),
                    'sent' => 0,
                    'failed' => count($platformTokens),
                ];
            }
        }

        return $results;
    }

    /**
     * @param  array<string, mixed>  $notification
     * @param  array<string, mixed>  $data
     * @return array<string, array<string, mixed>>
     */
    public function sendToTopic(string $topic, array $notification, array $data = []): array
    {
<<<<<<< HEAD
=======
        return $this->sendToTopicInternal($topic, $notification, $data);
    }

    /**
     * @param  array<string, mixed>  $notification
     * @param  array<string, mixed>  $data
     * @return array<string, array<string, mixed>>
     */
    private function sendToTopicInternal(string $topic, array $notification, array $data = []): array
    {
>>>>>>> 18a3188 (.)
        $results = [];

        foreach ($this->platformNames as $platform) {
            Assert::string($platform, 'Platform must be a string');
            try {
                $result = $this->delivery->sendTopicToPlatform($platform, $topic, $notification, $data);
                $results[$platform] = $result;
            } catch (Exception $e) {
                Log::error("Topic push notification failed for platform {$platform}", [
                    'error' => $e->getMessage(),
                    'topic' => $topic,
                ]);

                $results[$platform] = [
                    'success' => false,
                    'error' => $e->getMessage(),
                ];
            }
        }

        return $results;
    }

    /**
     * @param  array<string, mixed>  $notification
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    public function sendToAll(array $notification, array $data = []): array
    {
<<<<<<< HEAD
=======
        return $this->sendToAllInternal($notification, $data);
    }

    /**
     * @param  array<string, mixed>  $notification
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    private function sendToAllInternal(array $notification, array $data = []): array
    {
>>>>>>> 18a3188 (.)
        $tokens = $this->delivery->getAllActiveTokens();

        if ($tokens === []) {
            return [
                'success' => false,
                'message' => 'No active tokens found',
            ];
        }

<<<<<<< HEAD
        return $this->sendToDevices($tokens, $notification, $data);
=======
        return $this->sendToDevicesInternal($tokens, $notification, $data);
>>>>>>> 18a3188 (.)
    }

    /**
     * @param  list<string>  $tokens
     * @param  array<string, mixed>  $notification
     * @param  array<string, mixed>  $data
     */
    public function scheduleNotification(array $tokens, array $notification, array $data, DateTime $scheduleTime): string
    {
<<<<<<< HEAD
=======
        return $this->scheduleNotificationInternal($tokens, $notification, $data, $scheduleTime);
    }

    /**
     * @param  list<string>  $tokens
     * @param  array<string, mixed>  $notification
     * @param  array<string, mixed>  $data
     */
    private function scheduleNotificationInternal(array $tokens, array $notification, array $data, DateTime $scheduleTime): string
    {
>>>>>>> 18a3188 (.)
        $jobId = uniqid('push_', true);

        Cache::put("scheduled_push:{$jobId}", [
            'tokens' => $tokens,
            'notification' => $notification,
            'data' => $data,
            'schedule_time' => $scheduleTime->getTimestamp(),
        ], $scheduleTime);

        SendScheduledPushNotification::dispatch($jobId)
            ->delay($scheduleTime);

        return $jobId;
    }

    /**
     * @param  list<string>  $tokens
     * @param  array<string, mixed>  $variables
     * @return array<string, array<string, mixed>>
     */
    public function sendWithTemplate(string $templateId, array $tokens, array $variables = []): array
    {
<<<<<<< HEAD
=======
        return $this->sendWithTemplateInternal($templateId, $tokens, $variables);
    }

    /**
     * @param  list<string>  $tokens
     * @param  array<string, mixed>  $variables
     * @return array<string, array<string, mixed>>
     */
    private function sendWithTemplateInternal(string $templateId, array $tokens, array $variables = []): array
    {
>>>>>>> 18a3188 (.)
        $template = $this->delivery->getTemplate($templateId);

        if ($template === null) {
            throw new Exception("Template {$templateId} not found");
        }

        $notification = $this->delivery->processTemplate($template, $variables);
        /** @var array<string, mixed> $data */
        $data = isset($template['data']) && is_array($template['data']) ? $template['data'] : [];

<<<<<<< HEAD
        return $this->sendToDevices($tokens, $notification, $data);
=======
        return $this->sendToDevicesInternal($tokens, $notification, $data);
>>>>>>> 18a3188 (.)
    }

    /**
     * @param  array<string, mixed>  $criteria
     * @param  array<string, mixed>  $notification
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    public function sendWithTargeting(array $criteria, array $notification, array $data = []): array
    {
<<<<<<< HEAD
=======
        return $this->sendWithTargetingInternal($criteria, $notification, $data);
    }

    /**
     * @param  array<string, mixed>  $criteria
     * @param  array<string, mixed>  $notification
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    private function sendWithTargetingInternal(array $criteria, array $notification, array $data = []): array
    {
>>>>>>> 18a3188 (.)
        $tokens = $this->delivery->getTokensByCriteria($criteria);

        if ($tokens === []) {
            return [
                'success' => false,
                'message' => 'No tokens found matching criteria',
            ];
        }

<<<<<<< HEAD
        return $this->sendToDevices($tokens, $notification, $data);
    }
}
    
=======
        return $this->sendToDevicesInternal($tokens, $notification, $data);
    }
}
>>>>>>> 18a3188 (.)
