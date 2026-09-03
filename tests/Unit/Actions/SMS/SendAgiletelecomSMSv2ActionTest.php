<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Actions\SMS;

use Modules\Notify\Actions\SMS\SendAgiletelecomSMSv2Action;
use Modules\Notify\Contracts\SMS\SmsActionContract;
use Modules\Notify\Datas\SmsData;
use ReflectionClass;
use ReflectionNamedType;

describe('SendAgiletelecomSMSv2Action', function () {
    it('can be instantiated', function () {
        // `new SendAgiletelecomSMSv2Action()` restituisce per costruzione quel tipo: il fatto verificabile
        // e' che il costruttore non chieda parametri obbligatori.
        expect((new ReflectionClass(SendAgiletelecomSMSv2Action::class))->getConstructor()?->getNumberOfRequiredParameters() ?? 0)
            ->toBe(0);
    });

    it('implements SmsActionContract', function () {
        // `toBeObject()` su un oggetto e' vero per costruzione e non nomina il contratto.
        expect(\Safe\class_implements(SendAgiletelecomSMSv2Action::class))
            ->toHaveKey(SmsActionContract::class);
    });

    it('has execute method with correct signature', function () {
        $reflection = new ReflectionClass(new SendAgiletelecomSMSv2Action);
        $method = $reflection->getMethod('execute');

        expect($method->isPublic())->toBeTrue();
        expect($method->getNumberOfParameters())->toBe(1);
    });

    it('execute accepts SmsData parameter', function () {
        $reflection = new ReflectionClass(new SendAgiletelecomSMSv2Action);
        $method = $reflection->getMethod('execute');
        $params = $method->getParameters();
        $type = $params[0]->getType();

        expect($type)->toBeInstanceOf(ReflectionNamedType::class);
        expect($type instanceof ReflectionNamedType ? $type->getName() : '')->toBe(SmsData::class);
    });

    it('execute returns array', function () {
        $reflection = new ReflectionClass(new SendAgiletelecomSMSv2Action);
        $method = $reflection->getMethod('execute');
        $returnType = $method->getReturnType();

        expect($returnType)->toBeInstanceOf(ReflectionNamedType::class);
        expect($returnType instanceof ReflectionNamedType ? $returnType->getName() : '')->toBe('array');
    });

    it('uses strict types', function () {
        $reflection = new ReflectionClass(new SendAgiletelecomSMSv2Action);
        $filename = $reflection->getFileName();

        expect($filename)->not->toBeNull();
        /** @var string $filename */
        $content = \Safe\file_get_contents($filename);
        expect($content)->toContain('declare(strict_types=1)');
    });

    it('has correct namespace', function () {
        $reflection = new ReflectionClass(new SendAgiletelecomSMSv2Action);

        expect($reflection->getNamespaceName())->toBe('Modules\\Notify\\Actions\\SMS');
    });

    it('has required imports', function () {
        $reflection = new ReflectionClass(new SendAgiletelecomSMSv2Action);
        $filename = $reflection->getFileName();
        /** @var string $filename */
        $content = \Safe\file_get_contents($filename);

        expect($content)->toContain('use Illuminate\\Support\\Facades\\Http;');
        expect($content)->toContain('use Modules\\Notify\\Datas\\SMS\\AgiletelecomData;');
    });

    it('does not use QueueableAction trait', function () {
        $traits = \Safe\class_uses(new SendAgiletelecomSMSv2Action);

        expect($traits)->not->toContain('Spatie\\QueueableAction\\QueueableAction');
    });
});
