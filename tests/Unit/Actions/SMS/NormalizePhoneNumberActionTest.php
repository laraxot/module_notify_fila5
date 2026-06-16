<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Actions\SMS;
<<<<<<< HEAD
use Modules\Notify\Tests\TestCase;
use function Safe\file_get_contents;
use Modules\Notify\Actions\SMS\NormalizePhoneNumberAction;
use PHPUnit\Framework\Assert;
use Spatie\QueueableAction\QueueableAction;

use function Safe\class_uses;

uses(\Modules\Notify\Tests\TestCase::class);

describe('SMS\NormalizePhoneNumberAction', function () {
        it('can be instantiated', function () {
        Assert::assertTrue(class_exists(NormalizePhoneNumberAction::class));
    });

    it('has execute method with correct signature', function () {
        $reflection = new \ReflectionClass(NormalizePhoneNumberAction::class);
        $method = $reflection->getMethod('execute');

        Assert::assertTrue($method->isPublic());
        Assert::assertSame(1, $method->getNumberOfParameters());
    });

    it('execute accepts string parameter', function () {
        $reflection = new \ReflectionClass(NormalizePhoneNumberAction::class);
        $method = $reflection->getMethod('execute');
        $params = $method->getParameters();

        \assertReflectionTypeName($params[0]->getType(), 'string');
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

        Assert::assertSame('Modules\Notify\Actions\SMS', $reflection->getNamespaceName());
    });

    it('has required imports', function () {
        $content = \notifyReflectionSource(new \ReflectionClass(NormalizePhoneNumberAction::class));

        Assert::assertStringContainsString('use Webmozart\Assert\Assert', $content);
        Assert::assertStringContainsString('use function Safe\preg_replace', $content);
    });

    it('is not using QueueableAction trait', function () {
        $traits = class_uses(NormalizePhoneNumberAction::class);

        Assert::assertArrayNotHasKey(QueueableAction::class, $traits);
=======

use Modules\Notify\Actions\SMS\NormalizePhoneNumberAction;

describe('SMS\NormalizePhoneNumberAction', function () {
    beforeEach(function () {
        $action = new NormalizePhoneNumberAction;
    });

    it('can be instantiated', function () {
        expect($action);
    });

    it('has execute method with correct signature', function () {
        $reflection = new \ReflectionClass($action);
        $method = $reflection->getMethod('execute');

        expect($method->isPublic())->toBeTrue();
        expect($method->getNumberOfParameters())->toBe(1);
    });

    it('execute accepts string parameter', function () {
        $reflection = new \ReflectionClass($action);
        $method = $reflection->getMethod('execute');
        $params = $method->getParameters();

        expect($params[0]->getType()?->getName())->toBe('string');
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

        expect($reflection->getNamespaceName())->toBe('Modules\Notify\Actions\SMS');
    });

    it('has required imports', function () {
        $filename = (new \ReflectionClass($action));
        $content = file_get_contents($filename);

        expect($content)->toContain('use Webmozart\Assert\Assert);');
        expect($content)->toContain('use function Safe\preg_replace);');
    });

    it('is not using QueueableAction trait', function () {
        $traits = class_uses($action);

        expect($traits)->not->toContain('Spatie\QueueableAction\QueueableAction');
>>>>>>> 929ed821d (.)
    });
});
