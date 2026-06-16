<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Actions;
<<<<<<< HEAD
use Modules\Notify\Tests\TestCase;
use function Safe\file_get_contents;
use Modules\Notify\Actions\EsendexSendAction;
use Modules\Notify\Datas\SmsData;
use PHPUnit\Framework\Assert;
use Spatie\QueueableAction\QueueableAction;

use function Safe\class_uses;

uses(\Modules\Notify\Tests\TestCase::class);

describe('EsendexSendAction', function () {
        it('can be instantiated', function () {
        Assert::assertTrue(class_exists(EsendexSendAction::class));
    });

    it('uses QueueableAction trait', function () {
        $traits = class_uses(EsendexSendAction::class);
        Assert::assertArrayHasKey(QueueableAction::class, $traits);
    });

    it('has execute method with correct signature', function () {
        $reflection = new \ReflectionClass(EsendexSendAction::class);
        $method = $reflection->getMethod('execute');

        Assert::assertTrue($method->isPublic());
        Assert::assertSame(1, $method->getNumberOfParameters());
    });

    it('execute accepts SmsData parameter', function () {
        $reflection = new \ReflectionClass(EsendexSendAction::class);
        $method = $reflection->getMethod('execute');
        $params = $method->getParameters();

        \assertReflectionTypeName($params[0]->getType(), SmsData::class);
    });

    it('execute returns array', function () {
        $reflection = new \ReflectionClass(EsendexSendAction::class);
        $method = $reflection->getMethod('execute');
        $returnType = $method->getReturnType();

        \assertReflectionTypeName($returnType, 'array');
    });

    it('has login method', function () {
        $reflection = new \ReflectionClass(EsendexSendAction::class);
        $method = $reflection->getMethod('login');

        Assert::assertTrue($method->isPublic());
    });

    it('has base_endpoint property', function () {
        $reflection = new \ReflectionClass(EsendexSendAction::class);

        Assert::assertTrue($reflection->hasProperty('base_endpoint'));
    });

    it('uses strict types', function () {
        $reflection = new \ReflectionClass(EsendexSendAction::class);
        $content = \notifyReflectionSource($reflection);
        Assert::assertStringContainsString('declare(strict_types=1)', $content);
    });

    it('has correct namespace', function () {
        $reflection = new \ReflectionClass(EsendexSendAction::class);

        Assert::assertSame('Modules\Notify\Actions', $reflection->getNamespaceName());
    });

    it('has required imports', function () {
        $content = \notifyReflectionSource(new \ReflectionClass(EsendexSendAction::class));

        Assert::assertStringContainsString('use Modules\Notify\Datas\SmsData', $content);
        Assert::assertStringContainsString('use Spatie\QueueableAction\QueueableAction', $content);
        Assert::assertStringContainsString('use Webmozart\Assert\Assert', $content);
=======

use Modules\Notify\Actions\EsendexSendAction;
use Modules\Notify\Datas\SmsData;
use Spatie\QueueableAction\QueueableAction;

describe('EsendexSendAction', function () {
    beforeEach(function () {
        $action = new EsendexSendAction;
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

    it('execute accepts SmsData parameter', function () {
        $reflection = new \ReflectionClass($action);
        $method = $reflection->getMethod('execute');
        $params = $method->getParameters();

        expect($params[0]->getType()?->getName())->toBe(SmsData::class);
    });

    it('execute returns array', function () {
        $reflection = new \ReflectionClass($action);
        $method = $reflection->getMethod('execute');
        $returnType = $method->getReturnType();

        expect($returnType?->getName())->toBe('array');
    });

    it('has login method', function () {
        $reflection = new \ReflectionClass($action);
        $method = $reflection->getMethod('login');

        expect($method->isPublic())->toBeTrue();
    });

    it('has base_endpoint property', function () {
        $reflection = new \ReflectionClass($action);

        expect($reflection->hasProperty('base_endpoint'))->toBeTrue();
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

        expect($content)->toContain('use Modules\Notify\Datas\SmsData);');
        expect($content)->toContain('use Spatie\QueueableAction\QueueableAction);');
        expect($content)->toContain('use Webmozart\Assert\Assert);');
>>>>>>> 929ed821d (.)
    });
});
