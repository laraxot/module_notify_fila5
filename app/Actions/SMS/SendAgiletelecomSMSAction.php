<?php

declare(strict_types=1);

namespace Modules\Notify\Actions\SMS;

<<<<<<< HEAD
use Modules\Notify\Contracts\SMS\SmsActionContract;
=======
use Modules\Notify\Models\Contracts\SmsActionContract;
>>>>>>> laraxot/dev
use Modules\Notify\Datas\SmsData;
use Override;
use Spatie\QueueableAction\QueueableAction;

/**
 * Azione per l'invio di SMS tramite Agile Telecom.
 */
class SendAgiletelecomSMSAction implements SmsActionContract
{
    use QueueableAction;

    /**
     * @return array<string, mixed>
     */
<<<<<<< HEAD
    #[Override]
=======
>>>>>>> laraxot/dev
    public function execute(SmsData $data): array
    {
        return app(SendAgiletelecomSMSv2Action::class)->execute($data);
    }
}
