<?php

declare(strict_types=1);

namespace Modules\Notify\Datas;

<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Actions\Cast\SafeStringCastAction;

final class SmsData
{
    public string $from;

    public string $recipient;

    public string $body;

    /**
     * Create a new SmsData instance.
     *
     * @param  array<string, mixed>  $data
     * @return void
     */
    public function __construct(array $data = [])
    {
        $this->from = SafeStringCastAction::cast($data['from'] ?? '');
        $this->recipient = SafeStringCastAction::cast($data['recipient'] ?? '');
        $this->body = SafeStringCastAction::cast($data['body'] ?? '');
    }

    /**
     * Named constructor for convenience.
     *
     * @param  array<string, mixed>  $data
     */
    public static function from(array $data): self
    {
        return new self($data);
    }
=======
=======
>>>>>>> laraxot/dev
use Spatie\LaravelData\Data;

/**
 * Dati di un messaggio SMS: mittente, destinatario e corpo.
 *
 * Istanziare con `SmsData::from([...])` (costruttore magico fornito da
 * `Spatie\LaravelData\Data`), passando le chiavi `from`, `recipient`, `body`.
 * Le chiavi assenti restano stringa vuota.
 */
final class SmsData extends Data
{
    public function __construct(
        public string $from = '',
        public string $recipient = '',
        public string $body = '',
    ) {}
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
}
