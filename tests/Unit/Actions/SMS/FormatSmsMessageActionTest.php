<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Actions\SMS;
<<<<<<< HEAD
use function Safe\file_get_contents;
use Modules\Notify\Actions\SMS\FormatSmsMessageAction;
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;
use Spatie\QueueableAction\QueueableAction;

use function Safe\class_uses;

uses(\Modules\Notify\Tests\TestCase::class);

describe('FormatSmsMessageAction', function () {
        it('can be instantiated', function () {
                $action = new FormatSmsMessageAction;

        Assert::assertInstanceOf(FormatSmsMessageAction::class, $action);
    });

    it('has execute method with correct signature', function () {
                $action = new FormatSmsMessageAction;

        $reflection = new \ReflectionClass($action);
        $method = $reflection->getMethod('execute');

        Assert::assertTrue($method->isPublic());
        Assert::assertSame(1, $method->getNumberOfParameters());
    });

    it('execute accepts string parameter', function () {
                $action = new FormatSmsMessageAction;

        $reflection = new \ReflectionClass($action);
        $method = $reflection->getMethod('execute');
        $params = $method->getParameters();

        \assertReflectionTypeName($params[0]->getType(), 'string');
    });

    it('execute returns array', function () {
                $action = new FormatSmsMessageAction;

        $reflection = new \ReflectionClass($action);
        $method = $reflection->getMethod('execute');
        $returnType = $method->getReturnType();

        \assertReflectionTypeName($returnType, 'array');
    });

    it('uses strict types', function () {
                $action = new FormatSmsMessageAction;

        $reflection = new \ReflectionClass($action);
        $content = \notifyReflectionSource($reflection);
        Assert::assertStringContainsString('declare(strict_types=1)', (string) $content);
    });

    it('has correct namespace', function () {
                $action = new FormatSmsMessageAction;

        $reflection = new \ReflectionClass($action);

        Assert::assertSame('Modules\Notify\Actions\SMS', $reflection->getNamespaceName());
    });

    it('has required imports', function () {
                $action = new FormatSmsMessageAction;

        $reflection = new \ReflectionClass($action);
        $content = \notifyReflectionSource($reflection);
        Assert::assertStringContainsString('declare(strict_types=1)', $content);
    });

    it('is not using QueueableAction trait', function () {
                $action = new FormatSmsMessageAction;

        $traits = class_uses(FormatSmsMessageAction::class);

        Assert::assertArrayNotHasKey(QueueableAction::class, $traits);
=======

use Modules\Notify\Actions\SMS\FormatSmsMessageAction;
use ReflectionClass;

describe('FormatSmsMessageAction', function () {
    beforeEach(function () {
        $this->action = new FormatSmsMessageAction;
    });

    it('can be instantiated', function () {
        expect($this->action)->toBeInstanceOf(FormatSmsMessageAction::class);
    });

    it('has execute method with correct signature', function () {
        $reflection = new ReflectionClass($this->action);
        $method = $reflection->getMethod('execute');

        expect($method->isPublic())->toBeTrue();
        expect($method->getNumberOfParameters())->toBe(1);
    });

    it('execute accepts string parameter', function () {
        $reflection = new ReflectionClass($this->action);
        $method = $reflection->getMethod('execute');
        $params = $method->getParameters();

        expect($params[0]->getType()?->getName())->toBe('string');
    });

    it('execute returns array', function () {
        $reflection = new ReflectionClass($this->action);
        $method = $reflection->getMethod('execute');
        $returnType = $method->getReturnType();

        expect($returnType?->getName())->toBe('array');
    });

    it('uses strict types', function () {
        $reflection = new ReflectionClass($this->action);
        $filename = $reflection->getFileName();

        expect($filename)->not->toBeNull();
        /** @var string $filename */
        $content = file_get_contents($filename);
        expect($content)->toContain('declare(strict_types=1);');
    });

    it('has correct namespace', function () {
        $reflection = new ReflectionClass($this->action);

        expect($reflection->getNamespaceName())->toBe('Modules\Notify\Actions\SMS');
    });

    it('has required imports', function () {
        $reflection = new ReflectionClass($this->action);
        $filename = $reflection->getFileName();

        expect($filename)->not->toBeNull();
        /** @var string $filename */
        $content = file_get_contents($filename);

        expect($content)->toContain('use function Safe\preg_split;');
    });

    it('is not using QueueableAction trait', function () {
        $traits = class_uses($this->action);

        expect($traits)->not->toContain('Spatie\QueueableAction\QueueableAction');
>>>>>>> 929ed821d (.)
    });
});
