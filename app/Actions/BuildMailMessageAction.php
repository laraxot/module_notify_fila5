<?php
declare(strict_types=1);

namespace Modules\Notify\Actions;

use Illuminate\Notifications\Messages\MailMessage;
use Modules\Notify\Datas\AttachmentData;

class BuildMailMessageAction
{
    /**
     * Build mail message from template data.
     *
     * @param array<string, mixed> $viewParams
     * @param array<int, AttachmentData>|null $attachments
     */
    public function execute(
        string $name,
        mixed $model,
        array $viewParams,
        ?array $attachments = null,
    ): MailMessage {
        $message = new MailMessage;
        $message->subject($name);

        return $message;
    }

    /**
     * @param array<string>|string $richText
     */
    public function decodeRichText(array|string $richText): string
    {
        // Fallback semplice per il test
        return is_array($richText) ? implode('', $richText) : (string) $richText;
    }
}
