<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Actions;
<<<<<<< HEAD
use Modules\Notify\Tests\TestCase;
use function Safe\file_get_contents;
use Modules\Notify\Actions\DetermineSeasonalContentViewPathAction;
use PHPUnit\Framework\Assert;
use Spatie\QueueableAction\QueueableAction;

use function Safe\class_uses;

uses(\Modules\Notify\Tests\TestCase::class);

describe('DetermineSeasonalContentViewPathAction', function () {
        it('can be instantiated', function () {
        Assert::assertTrue(class_exists(DetermineSeasonalContentViewPathAction::class));
    });

    it('uses QueueableAction trait', function () {
        $traits = class_uses(DetermineSeasonalContentViewPathAction::class);
        Assert::assertArrayHasKey(QueueableAction::class, $traits);
    });

    it('has execute method with correct signature', function () {
        $reflection = new \ReflectionClass(DetermineSeasonalContentViewPathAction::class);
        $method = $reflection->getMethod('execute');

        Assert::assertTrue($method->isPublic());
        Assert::assertSame(1, $method->getNumberOfParameters());
    });

    it('returns string from execute', function () {
        $reflection = new \ReflectionClass(DetermineSeasonalContentViewPathAction::class);
        $method = $reflection->getMethod('execute');
        $returnType = $method->getReturnType();

        \assertReflectionTypeName($returnType, 'string');
    });

    it('has private determineViewFileName method', function () {
        $reflection = new \ReflectionClass(DetermineSeasonalContentViewPathAction::class);
        $method = $reflection->getMethod('determineViewFileName');

        Assert::assertTrue($method->isPrivate());
    });

    it('has private getEasterDate method', function () {
        $reflection = new \ReflectionClass(DetermineSeasonalContentViewPathAction::class);
        $method = $reflection->getMethod('getEasterDate');

        Assert::assertTrue($method->isPrivate());
    });

    it('returns view path with sixteen namespace', function () {
        $action = new DetermineSeasonalContentViewPathAction;
        $result = $action->execute('base-content');

        Assert::assertStringStartsWith('sixteen::emails.', (string) $result);
    });

    it('uses strict types', function () {
        $reflection = new \ReflectionClass(DetermineSeasonalContentViewPathAction::class);
        $content = \notifyReflectionSource($reflection);
        Assert::assertStringContainsString('declare(strict_types=1)', $content);
    });

    it('has correct namespace', function () {
        $reflection = new \ReflectionClass(DetermineSeasonalContentViewPathAction::class);

        Assert::assertSame('Modules\Notify\Actions', $reflection->getNamespaceName());
    });

    it('has required imports', function () {
        $content = \notifyReflectionSource(new \ReflectionClass(DetermineSeasonalContentViewPathAction::class));

        Assert::assertStringContainsString('use Carbon\Carbon', $content);
        Assert::assertStringContainsString('use Spatie\QueueableAction\QueueableAction', $content);
        Assert::assertStringContainsString('use Webmozart\Assert\Assert', $content);
=======

use Modules\Notify\Actions\DetermineSeasonalContentViewPathAction;
use Spatie\QueueableAction\QueueableAction;

describe('DetermineSeasonalContentViewPathAction', function () {
    beforeEach(function () {
        $action = new DetermineSeasonalContentViewPathAction;
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

    it('returns string from execute', function () {
        $reflection = new \ReflectionClass($action);
        $method = $reflection->getMethod('execute');
        $returnType = $method->getReturnType();

        expect($returnType?->getName())->toBe('string');
    });

    it('has private determineViewFileName method', function () {
        $reflection = new \ReflectionClass($action);
        $method = $reflection->getMethod('determineViewFileName');

        expect($method->isPrivate())->toBeTrue();
    });

    it('has private getEasterDate method', function () {
        $reflection = new \ReflectionClass($action);
        $method = $reflection->getMethod('getEasterDate');

        expect($method->isPrivate())->toBeTrue();
    });

    it('returns view path with sixteen namespace', function () {
        $result = $action->execute('base-content');

        expect($result)->toStartWith('sixteen::emails.');
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

        expect($content)->toContain('use Carbon\Carbon);');
        expect($content)->toContain('use Spatie\QueueableAction\QueueableAction);');
        expect($content)->toContain('use Webmozart\Assert\Assert);');
>>>>>>> 929ed821d (.)
    });
});
