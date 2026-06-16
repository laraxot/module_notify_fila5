<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Actions;
<<<<<<< HEAD
use Modules\Notify\Tests\TestCase;
use function Safe\file_get_contents;
use Modules\Notify\Actions\NormalizePhoneNumberAction;
use PHPUnit\Framework\Assert;
use Spatie\QueueableAction\QueueableAction;

use function Safe\class_uses;

uses(\Modules\Notify\Tests\TestCase::class);

describe('NormalizePhoneNumberAction', function () {
        it('can be instantiated', function () {
        Assert::assertTrue(class_exists(NormalizePhoneNumberAction::class));
    });

    it('uses QueueableAction trait', function () {
        $traits = class_uses(NormalizePhoneNumberAction::class);
        Assert::assertArrayHasKey(QueueableAction::class, $traits);
    });

    it('has execute method with correct signature', function () {
        $reflection = new \ReflectionClass(NormalizePhoneNumberAction::class);
        $method = $reflection->getMethod('execute');

        Assert::assertTrue($method->isPublic());
        Assert::assertSame(1, $method->getNumberOfParameters());
    });

    it('execute accepts nullable string parameter', function () {
        $reflection = new \ReflectionClass(NormalizePhoneNumberAction::class);
        $method = $reflection->getMethod('execute');
        $params = $method->getParameters();

        Assert::assertStringContainsString((string) 'string', (string) $params[0]->getType());
    });

    it('execute returns string', function () {
        $reflection = new \ReflectionClass(NormalizePhoneNumberAction::class);
        $method = $reflection->getMethod('execute');
        $returnType = $method->getReturnType();

        \assertReflectionTypeName($returnType, 'string');
    });

    it('uses strict types', function () {
        $reflection = new \ReflectionClass(NormalizePhoneNumberAction::class);
        $content = \notifyReflectionSource($reflection);
        Assert::assertStringContainsString('declare(strict_types=1)', $content);
    });

    it('has correct namespace', function () {
        $reflection = new \ReflectionClass(NormalizePhoneNumberAction::class);

        Assert::assertSame('Modules\Notify\Actions', $reflection->getNamespaceName());
    });

    it('has required imports', function () {
        $content = \notifyReflectionSource(new \ReflectionClass(NormalizePhoneNumberAction::class));

        Assert::assertStringContainsString('use Modules\Xot\Actions\Cast\SafeStringCastAction', $content);
        Assert::assertStringContainsString('use Spatie\QueueableAction\QueueableAction', $content);
    });

    it('implements queueable functionality', function () {
        $reflection = new \ReflectionClass(NormalizePhoneNumberAction::class);
        Assert::assertTrue($reflection->hasMethod('onQueue'));
=======

use Modules\Notify\Actions\NormalizePhoneNumberAction;
use Spatie\QueueableAction\QueueableAction;

describe('NormalizePhoneNumberAction', function () {
    beforeEach(function () {
        $action = new NormalizePhoneNumberAction;
    });

    it('can be instantiated', function () {
        expect($action);
    });

    it('uses QueueableAction trait', function () {
        $traits = class_uses($action);
        expect($traits)->toContain(QueueableAction::class);
    });

    it('has execute method with correct signature', function () {
        $reflection = new \ReflectionClass($action);
        $method = $reflection->getMethod('execute');

        expect($method->isPublic())->toBeTrue();
        expect($method->getNumberOfParameters())->toBe(1);
    });

    it('execute accepts nullable string parameter', function () {
        $reflection = new \ReflectionClass($action);
        $method = $reflection->getMethod('execute');
        $params = $method->getParameters();

        expect((string) $params[0]->getType())->toContain('string');
    });

    it('execute returns string', function () {
        $reflection = new \ReflectionClass($action);
        $method = $reflection->getMethod('execute');
        $returnType = $method->getReturnType();

        expect($returnType?->getName())->toBe('string');
    });

    it('uses strict types', function () {
        $reflection = new \ReflectionClass($action);
        $filename = $reflection->getFileName();

        expect($filename)->not->toBeNull();
        $content = file_get_contents($filename);
        expect($content)->toContain('declare(strict_types=1));');
    });

    it('has correct namespace', function () {
        $reflection = new \ReflectionClass($action);

        expect($reflection->getNamespaceName())->toBe('Modules\Notify\Actions');
    });

    it('has required imports', function () {
        $filename = (new \ReflectionClass($action));
        $content = file_get_contents($filename);

        expect($content)->toContain('use Modules\Xot\Actions\Cast\SafeStringCastAction);');
        expect($content)->toContain('use Spatie\QueueableAction\QueueableAction);');
    });

    it('implements queueable functionality', function () {
        expect(method_exists($action, 'onQueue'));
>>>>>>> 929ed821d (.)
    });
});
