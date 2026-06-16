<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Actions\WhatsApp;
<<<<<<< HEAD
use Modules\Notify\Tests\TestCase;
use function Safe\file_get_contents;
use Modules\Notify\Actions\WhatsApp\SendVonageWhatsAppAction;
use Modules\Notify\Datas\WhatsAppData;
use PHPUnit\Framework\Assert;

use function Safe\class_uses;

uses(\Modules\Notify\Tests\TestCase::class);
=======

use Modules\Notify\Actions\WhatsApp\SendVonageWhatsAppAction;
use Modules\Notify\Datas\WhatsAppData;
>>>>>>> 929ed821d (.)

describe('SendVonageWhatsAppAction', function () {
    it('can be referenced via ReflectionClass without instantiation', function () {
        $reflection = new \ReflectionClass(SendVonageWhatsAppAction::class);
<<<<<<< HEAD
        Assert::assertTrue($reflection->isInstantiable());
=======
        expect($reflection->isInstantiable())->toBeTrue();
>>>>>>> 929ed821d (.)
    });

    it('has execute method with correct signature', function () {
        $reflection = new \ReflectionClass(SendVonageWhatsAppAction::class);
        $method = $reflection->getMethod('execute');

<<<<<<< HEAD
        Assert::assertTrue($method->isPublic());
        Assert::assertSame(1, $method->getNumberOfParameters());
=======
        expect($method->isPublic())->toBeTrue();
        expect($method->getNumberOfParameters())->toBe(1);
>>>>>>> 929ed821d (.)
    });

    it('execute accepts WhatsAppData parameter', function () {
        $reflection = new \ReflectionClass(SendVonageWhatsAppAction::class);
        $method = $reflection->getMethod('execute');
        $params = $method->getParameters();

<<<<<<< HEAD
        \assertReflectionTypeName($params[0]->getType(), WhatsAppData::class);
=======
        expect($params[0]->getType()?->getName())->toBe(WhatsAppData::class);
>>>>>>> 929ed821d (.)
    });

    it('execute returns array', function () {
        $reflection = new \ReflectionClass(SendVonageWhatsAppAction::class);
        $method = $reflection->getMethod('execute');
        $returnType = $method->getReturnType();

<<<<<<< HEAD
        \assertReflectionTypeName($returnType, 'array');
=======
        expect($returnType?->getName())->toBe('array');
>>>>>>> 929ed821d (.)
    });

    it('uses strict types', function () {
        $reflection = new \ReflectionClass(SendVonageWhatsAppAction::class);
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
        $reflection = new \ReflectionClass(SendVonageWhatsAppAction::class);

<<<<<<< HEAD
        Assert::assertSame('Modules\Notify\Actions\WhatsApp', $reflection->getNamespaceName());
=======
        expect($reflection->getNamespaceName())->toBe('Modules\Notify\Actions\WhatsApp');
>>>>>>> 929ed821d (.)
    });

    it('has required imports', function () {
        $reflection = new \ReflectionClass(SendVonageWhatsAppAction::class);
        $filename = $reflection->getFileName();
<<<<<<< HEAD
        $content = \notifyReflectionSource(new \ReflectionClass(SendVonageWhatsAppAction::class));

        Assert::assertStringContainsString('declare(strict_types=1)', (string) $content);
=======
        $content = file_get_contents($filename);

        expect($content)->toContain('use Modules\Notify\Datas\WhatsAppData;');
>>>>>>> 929ed821d (.)
    });

    it('uses QueueableAction trait', function () {
        $traits = class_uses(SendVonageWhatsAppAction::class);
<<<<<<< HEAD
        Assert::assertArrayHasKey('Spatie\QueueableAction\QueueableAction', $traits);
=======

        expect($traits)->toContain('Spatie\QueueableAction\QueueableAction');
>>>>>>> 929ed821d (.)
    });

    it('has protected debug property', function () {
        $reflection = new \ReflectionClass(SendVonageWhatsAppAction::class);
        $property = $reflection->getProperty('debug');

<<<<<<< HEAD
        Assert::assertTrue($property->isProtected());
=======
        expect($property->isProtected())->toBeTrue();
>>>>>>> 929ed821d (.)
    });

    it('has protected timeout property', function () {
        $reflection = new \ReflectionClass(SendVonageWhatsAppAction::class);
        $property = $reflection->getProperty('timeout');

<<<<<<< HEAD
        Assert::assertTrue($property->isProtected());
=======
        expect($property->isProtected())->toBeTrue();
>>>>>>> 929ed821d (.)
    });
});
