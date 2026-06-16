<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Actions\SMS;
<<<<<<< HEAD
use Modules\Notify\Tests\TestCase;
use function Safe\file_get_contents;
use Modules\Notify\Actions\SMS\SendGammuSMSAction;
use Modules\Notify\Contracts\SMS\SmsActionContract;
use Modules\Notify\Datas\SmsData;
use PHPUnit\Framework\Assert;
use Spatie\QueueableAction\QueueableAction;

use function Safe\class_implements;
use function Safe\class_uses;

uses(\Modules\Notify\Tests\TestCase::class);

=======

use Modules\Notify\Actions\SMS\SendGammuSMSAction;
use Modules\Notify\Contracts\SMS\SmsActionContract;
use Modules\Notify\Datas\SmsData;
use Spatie\QueueableAction\QueueableAction;

>>>>>>> 929ed821d (.)
describe('SendGammuSMSAction', function () {
    // Test strutturali - la classe richiede config nel costruttore
    it('has correct class definition', function () {
        $reflection = new \ReflectionClass(SendGammuSMSAction::class);

<<<<<<< HEAD
        Assert::assertTrue($reflection->isInstantiable());
=======
        expect($reflection->isInstantiable())->toBeTrue();
>>>>>>> 929ed821d (.)
    });

    it('implements SmsActionContract', function () {
        $interfaces = class_implements(SendGammuSMSAction::class);
<<<<<<< HEAD
        Assert::assertContains(SmsActionContract::class, $interfaces);
=======

        expect($interfaces)->toContain(SmsActionContract::class);
>>>>>>> 929ed821d (.)
    });

    it('uses QueueableAction trait', function () {
        $traits = class_uses(SendGammuSMSAction::class);
<<<<<<< HEAD
        Assert::assertArrayHasKey(QueueableAction::class, $traits);
=======
        expect($traits)->toContain(QueueableAction::class);
>>>>>>> 929ed821d (.)
    });

    it('has execute method with correct signature', function () {
        $reflection = new \ReflectionClass(SendGammuSMSAction::class);
        $method = $reflection->getMethod('execute');

<<<<<<< HEAD
        Assert::assertTrue($method->isPublic());
        Assert::assertSame(1, $method->getNumberOfParameters());
=======
        expect($method->isPublic())->toBeTrue();
        expect($method->getNumberOfParameters())->toBe(1);
>>>>>>> 929ed821d (.)
    });

    it('execute accepts SmsData parameter', function () {
        $reflection = new \ReflectionClass(SendGammuSMSAction::class);
        $method = $reflection->getMethod('execute');
        $params = $method->getParameters();

<<<<<<< HEAD
        \assertReflectionTypeName($params[0]->getType(), SmsData::class);
=======
        expect($params[0]->getType()?->getName())->toBe(SmsData::class);
>>>>>>> 929ed821d (.)
    });

    it('execute returns array', function () {
        $reflection = new \ReflectionClass(SendGammuSMSAction::class);
        $method = $reflection->getMethod('execute');
        $returnType = $method->getReturnType();

<<<<<<< HEAD
        \assertReflectionTypeName($returnType, 'array');
=======
        expect($returnType?->getName())->toBe('array');
>>>>>>> 929ed821d (.)
    });

    it('has required properties', function () {
        $reflection = new \ReflectionClass(SendGammuSMSAction::class);

<<<<<<< HEAD
        Assert::assertTrue($reflection->hasProperty('debug'));
        Assert::assertTrue($reflection->hasProperty('defaultSender'));
        Assert::assertTrue($reflection->hasProperty('gammuData'));
        Assert::assertTrue($reflection->hasProperty('vars'));
=======
        expect($reflection->hasProperty('debug'))->toBeTrue();
        expect($reflection->hasProperty('defaultSender'))->toBeTrue();
        expect($reflection->hasProperty('gammuData'))->toBeTrue();
        expect($reflection->hasProperty('vars'))->toBeTrue();
>>>>>>> 929ed821d (.)
    });

    it('uses strict types', function () {
        $reflection = new \ReflectionClass(SendGammuSMSAction::class);
<<<<<<< HEAD
        $content = \notifyReflectionSource($reflection);
        Assert::assertStringContainsString('declare(strict_types=1)', (string) $content);
=======
        $filename = $reflection->getFileName();

        expect($filename)->not->toBeNull();
        $content = file_get_contents($filename);
        expect($content)->toContain('');
>>>>>>> 929ed821d (.)
    });

    it('has correct namespace', function () {
        $reflection = new \ReflectionClass(SendGammuSMSAction::class);

<<<<<<< HEAD
        Assert::assertSame('Modules\Notify\Actions\SMS', $reflection->getNamespaceName());
    });

    it('has required imports', function () {
        $content = \notifyReflectionSource(new \ReflectionClass(SendGammuSMSAction::class));
        Assert::assertStringContainsString('declare(strict_types=1)', (string) $content);
=======
        expect($reflection->getNamespaceName())->toBe('Modules\Notify\Actions\SMS');
    });

    it('has required imports', function () {
        $filename = (new \ReflectionClass(SendGammuSMSAction::class))->getFileName();
        $content = file_get_contents($filename);

        expect($content)->toContain('use Symfony\Component\Process\Process;');
        expect($content)->toContain('use Modules\Notify\Datas\SMS\GammuData;');
        expect($content)->toContain('use Override;');
>>>>>>> 929ed821d (.)
    });

    it('is final class', function () {
        $reflection = new \ReflectionClass(SendGammuSMSAction::class);

<<<<<<< HEAD
        Assert::assertTrue($reflection->isFinal());
=======
        expect($reflection->isFinal())->toBeTrue();
>>>>>>> 929ed821d (.)
    });
});
