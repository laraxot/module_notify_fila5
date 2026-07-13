<?php

/**
 * @see https://smsvi-docs.web.app/docs/restful/send-batch/
 */

declare(strict_types=1);

namespace Modules\Notify\Actions\Mail\Engines\Duocircle;

use Exception;
use Spatie\QueueableAction\QueueableAction;

/**
 * Recupera email tramite IMAP con engine Duocircle (try).
 */
class TryDuocircleMailAction
{
    use QueueableAction;

    public ?string $from = null;

    public string $to = '';

    public ?string $body = null;

    /**
     * @var array<string, mixed>
     */
    public array $vars = [];

    /**
     * @param array<string, mixed> $vars
     *
     * @return array<int, array{subject: string, attachments: int, body: string, moved: bool}>
     *
     * @throws Exception
     */
    public function execute(array $vars = []): array
    {
        foreach ($vars as $key => $value) {
            if (\is_string($key)) {
                $this->{$key} = $value;
            }
        }

        $this->vars = array_merge($this->vars, $vars);

        if (! class_exists(\Webklex\PHPIMAP\Client::class)) {
            throw new Exception('class [Webklex\\PHPIMAP\\Client] not exists ['.__LINE__.']['.__CLASS__.']');
        }

        if (! class_exists(\Webklex\IMAP\Facades\Client::class)) {
            throw new Exception('class [Webklex\\IMAP\\Facades\\Client] not exists ['.__LINE__.']['.__CLASS__.']');
        }

        /** @var \Webklex\PHPIMAP\Client $client */
        $client = \Webklex\IMAP\Facades\Client::account('default');
        $client->connect();

        /** @var \Webklex\PHPIMAP\Support\FolderCollection $folders */
        $folders = $client->getFolders();

        $result = [];

        /** @var \Webklex\PHPIMAP\Folder $folder */
        foreach ($folders as $folder) {
            /** @var \Webklex\PHPIMAP\Support\MessageCollection $messages */
            $messages = $folder->messages()->all()->get();

            /** @var \Webklex\PHPIMAP\Message $message */
            foreach ($messages as $message) {
                $result[] = [
                    'subject' => $message->getSubject(),
                    'attachments' => $message->getAttachments()->count(),
                    'body' => $message->getHTMLBody(),
                    'moved' => (bool) $message->move('INBOX.read'),
                ];
            }
        }

        return $result;
    }
}
