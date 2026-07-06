<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Actions\SMS;

use Modules\Notify\Actions\SMS\SendAgiletelecomSMSv1Action;
use Modules\Notify\Contracts\SMS\SmsActionContract;
use Modules\Notify\Datas\SmsData;
use Spatie\QueueableAction\QueueableAction;

use function Safe\class_implements;
use function Safe\class_uses;
use function Safe\file_get_contents;

describe('SendAgiletelecomSMSv1Action', function () {
    // Test strutturali senza istanziazione - la classe richiede config() nel costruttore
    it('has correct class definition', function () {
        $reflection = new \ReflectionClass(SendAgiletelecomSMSv1Action::class);

        expect($reflection->isInstantiable())->toBeTrue();
    });

    it('implements SmsActionContract', function () {
        $interfaces = class_implements(SendAgiletelecomSMSv1Action::class);

        expect($interfaces)->toContain(SmsActionContract::class);
    });

    it('has execute method with correct signature', function () {
        $reflection = new \ReflectionClass(SendAgiletelecomSMSv1Action::class);
        $method = $reflection->getMethod('execute');

        expect($method->isPublic())->toBeTrue();
        expect($method->getNumberOfParameters())->toBe(1);
    });

    it('execute accepts SmsData parameter', function () {
        $reflection = new \ReflectionClass(SendAgiletelecomSMSv1Action::class);
        $method = $reflection->getMethod('execute');
        $params = $method->getParameters();
        $type = $params[0]->getType();

        expect($type instanceof \ReflectionNamedType ? $type->getName() : null)->toBe(SmsData::class);
    });

    it('execute returns array', function () {
        $reflection = new \ReflectionClass(SendAgiletelecomSMSv1Action::class);
        $method = $reflection->getMethod('execute');
        $returnType = $method->getReturnType();

        expect($returnType instanceof \ReflectionNamedType ? $returnType->getName() : null)->toBe('array');
    });

    it('uses strict types', function () {
        $reflection = new \ReflectionClass(SendAgiletelecomSMSv1Action::class);
        $filename = $reflection->getFileName();

        expect($filename)->toBeString();
        if (false === $filename) {
            return;
        }
        $content = file_get_contents($filename);
        expect($content)->toContain('declare(strict_types=1);');
    });

    it('has correct namespace', function () {
        $reflection = new \ReflectionClass(SendAgiletelecomSMSv1Action::class);

        expect($reflection->getNamespaceName())->toBe('Modules\Notify\Actions\SMS');
    });

    it('has required imports', function () {
        $filename = (new \ReflectionClass(SendAgiletelecomSMSv1Action::class))->getFileName();

        expect($filename)->toBeString();
        if (false === $filename) {
            return;
        }
        $content = file_get_contents($filename);

        expect($content)->toContain('use GuzzleHttp\Client;');
        expect($content)->toContain('use Modules\Notify\Datas\SMS\AgiletelecomData;');
        expect($content)->toContain('use Override;');
    });

    it('does not use QueueableAction trait', function () {
        $traits = class_uses(SendAgiletelecomSMSv1Action::class);

        expect($traits)->not->toContain(QueueableAction::class);
    });
});
