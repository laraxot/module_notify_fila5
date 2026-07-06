<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Actions\SMS;

use Modules\Notify\Actions\SMS\SendAgiletelecomSMSAction;
use Modules\Notify\Contracts\SMS\SmsActionContract;
use Modules\Notify\Datas\SmsData;
use Spatie\QueueableAction\QueueableAction;

use function Safe\class_implements;
use function Safe\class_uses;
use function Safe\file_get_contents;

describe('SendAgiletelecomSMSAction', function () {
    // Test strutturali senza istanziazione - la classe richiede config() nel costruttore
    it('has correct class definition', function () {
        $reflection = new \ReflectionClass(SendAgiletelecomSMSAction::class);

        expect($reflection->isInstantiable())->toBeTrue();
    });

    it('implements SmsActionContract', function () {
        $interfaces = class_implements(SendAgiletelecomSMSAction::class);

        expect($interfaces)->toContain(SmsActionContract::class);
    });

    it('has execute method with correct signature', function () {
        $reflection = new \ReflectionClass(SendAgiletelecomSMSAction::class);
        $method = $reflection->getMethod('execute');

        expect($method->isPublic())->toBeTrue();
        expect($method->getNumberOfParameters())->toBe(1);
    });

    it('execute accepts SmsData parameter', function () {
        $reflection = new \ReflectionClass(SendAgiletelecomSMSAction::class);
        $method = $reflection->getMethod('execute');
        $params = $method->getParameters();
        $type = $params[0]->getType();

        expect($type instanceof \ReflectionNamedType ? $type->getName() : null)->toBe(SmsData::class);
    });

    it('execute returns array', function () {
        $reflection = new \ReflectionClass(SendAgiletelecomSMSAction::class);
        $method = $reflection->getMethod('execute');
        $returnType = $method->getReturnType();

        expect($returnType instanceof \ReflectionNamedType ? $returnType->getName() : null)->toBe('array');
    });

    it('uses strict types', function () {
        $reflection = new \ReflectionClass(SendAgiletelecomSMSAction::class);
        $filename = $reflection->getFileName();

        expect($filename)->toBeString();
        if (false === $filename) {
            return;
        }
        $content = file_get_contents($filename);
        expect($content)->toContain('declare(strict_types=1);');
    });

    it('has correct namespace', function () {
        $reflection = new \ReflectionClass(SendAgiletelecomSMSAction::class);

        expect($reflection->getNamespaceName())->toBe('Modules\Notify\Actions\SMS');
    });

    it('has required imports', function () {
        $filename = (new \ReflectionClass(SendAgiletelecomSMSAction::class))->getFileName();

        expect($filename)->toBeString();
        if (false === $filename) {
            return;
        }
        $content = file_get_contents($filename);

        expect($content)->toContain('use Modules\Notify\Contracts\SMS\SmsActionContract;');
        expect($content)->toContain('use Modules\Notify\Datas\SmsData;');
        expect($content)->toContain('use Override;');
    });

    it('does not use QueueableAction trait', function () {
        $traits = class_uses(SendAgiletelecomSMSAction::class);

        expect($traits)->not->toContain(QueueableAction::class);
    });
});
