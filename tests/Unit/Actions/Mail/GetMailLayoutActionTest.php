<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Actions\Mail;
<<<<<<< HEAD
use function Safe\file_get_contents;
use function Safe\class_uses;
use Modules\Notify\Actions\Mail\GetMailLayoutAction;
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;
use Spatie\QueueableAction\QueueableAction;

uses(\Modules\Notify\Tests\TestCase::class);

describe('GetMailLayoutAction', function () {
    it('can be instantiated', function () {
        $action = new GetMailLayoutAction;

        Assert::assertInstanceOf(GetMailLayoutAction::class, $action);
    });

    it('uses QueueableAction trait', function () {
        $traits = class_uses(GetMailLayoutAction::class);

        Assert::assertArrayHasKey(QueueableAction::class, $traits);
    });

    it('has execute method with correct signature', function () {
        $reflection = new \ReflectionClass(GetMailLayoutAction::class);
        $method = $reflection->getMethod('execute');

        Assert::assertTrue($method->isPublic());
        Assert::assertSame(1, $method->getNumberOfParameters());
    });

    it('execute accepts string parameter', function () {
        $reflection = new \ReflectionClass(GetMailLayoutAction::class);
        $method = $reflection->getMethod('execute');
        $params = $method->getParameters();

        \assertReflectionTypeName($params[0]->getType(), 'string');
    });

    it('execute returns string', function () {
        $reflection = new \ReflectionClass(GetMailLayoutAction::class);
        $method = $reflection->getMethod('execute');
        $returnType = $method->getReturnType();

        \assertReflectionTypeName($returnType, 'string');
    });

    it('uses strict types', function () {
        $reflection = new \ReflectionClass(GetMailLayoutAction::class);
        $content = \notifyReflectionSource($reflection);
        Assert::assertStringContainsString('declare(strict_types=1)', $content);
    });

    it('has correct namespace', function () {
        $reflection = new \ReflectionClass(GetMailLayoutAction::class);

        Assert::assertSame('Modules\Notify\Actions\Mail', $reflection->getNamespaceName());
    });

    it('has required imports', function () {
        $content = \notifyReflectionSource(new \ReflectionClass(GetMailLayoutAction::class));
        Assert::assertStringContainsString('use Modules\Xot\Actions\Cast\SafeStringCastAction;', $content);
        Assert::assertStringContainsString('use Modules\Xot\Actions\Theme\GetThemeContextAction;', $content);
        Assert::assertStringContainsString('use Modules\Xot\Datas\XotData;', $content);
    });

    it('implements queueable functionality', function () {
            });
=======

use Modules\Notify\Actions\Mail\GetMailLayoutAction;
use Spatie\QueueableAction\QueueableAction;

describe('GetMailLayoutAction', function () {
    beforeEach(function () {
        $action = new GetMailLayoutAction;
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

        expect($reflection->getNamespaceName())->toBe('Modules\Notify\Actions\Mail');
    });

    it('has required imports', function () {
        $filename = (new \ReflectionClass($action));
        $content = file_get_contents($filename);

        expect($content)->toContain('use Modules\Xot\Actions\Cast\SafeStringCastAction);');
        expect($content)->toContain('use Modules\Xot\Actions\Theme\GetThemeContextAction);');
        expect($content)->toContain('use Modules\Xot\Datas\XotData);');
    });

    it('implements queueable functionality', function () {
        expect(method_exists($action, 'onQueue'));
    });
>>>>>>> 929ed821d (.)
});
