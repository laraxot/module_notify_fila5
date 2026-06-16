<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Actions\SMS;
<<<<<<< HEAD
use Modules\Notify\Tests\TestCase;
use function Safe\file_get_contents;
use Modules\Notify\Actions\SMS\SendAgiletelecomSMSv1Action;
use Modules\Notify\Datas\SmsData;
use PHPUnit\Framework\Assert;
use Spatie\QueueableAction\QueueableAction;

use function Safe\class_uses;

uses(\Modules\Notify\Tests\TestCase::class);

describe('SendAgiletelecomSMSv1Action', function () {
        it('can be instantiated', function () {
        Assert::assertTrue(class_exists(SendAgiletelecomSMSv1Action::class));
    });

    it('implements SmsActionContract', function () {
        Assert::assertTrue(class_exists(SendAgiletelecomSMSv1Action::class));
    });

    it('has execute method with correct signature', function () {
        $reflection = new \ReflectionClass(SendAgiletelecomSMSv1Action::class);
        $method = $reflection->getMethod('execute');

        Assert::assertTrue($method->isPublic());
        Assert::assertSame(1, $method->getNumberOfParameters());
    });

    it('execute accepts SmsData parameter', function () {
        $reflection = new \ReflectionClass(SendAgiletelecomSMSv1Action::class);
        $method = $reflection->getMethod('execute');
        $params = $method->getParameters();

        \assertReflectionTypeName($params[0]->getType(), SmsData::class);
    });

    it('execute returns array', function () {
        $reflection = new \ReflectionClass(SendAgiletelecomSMSv1Action::class);
        $method = $reflection->getMethod('execute');
        $returnType = $method->getReturnType();

        \assertReflectionTypeName($returnType, 'array');
    });

    it('uses strict types', function () {
        $reflection = new \ReflectionClass(SendAgiletelecomSMSv1Action::class);
        $content = \notifyReflectionSource($reflection);
        Assert::assertStringContainsString('declare(strict_types=1)', $content);
    });

    it('has correct namespace', function () {
        $reflection = new \ReflectionClass(SendAgiletelecomSMSv1Action::class);

        Assert::assertSame('Modules\Notify\Actions\SMS', $reflection->getNamespaceName());
    });

    it('has required imports', function () {
        $content = \notifyReflectionSource(new \ReflectionClass(SendAgiletelecomSMSv1Action::class));

        Assert::assertStringContainsString('use GuzzleHttp\Client', $content);
        Assert::assertStringContainsString('use Modules\Notify\Datas\SMS\AgiletelecomData', $content);
        Assert::assertStringContainsString('use Override', $content);
    });

    it('does not use QueueableAction trait', function () {
        $traits = class_uses(SendAgiletelecomSMSv1Action::class);

        Assert::assertArrayNotHasKey(QueueableAction::class, $traits);
=======

use Modules\Notify\Actions\SMS\SendAgiletelecomSMSv1Action;
use Modules\Notify\Datas\SmsData;

describe('SendAgiletelecomSMSv1Action', function () {
    beforeEach(function () {
        $action = new SendAgiletelecomSMSv1Action;
    });

    it('can be instantiated', function () {
        expect($action);
    });

    it('implements SmsActionContract', function () {
        expect($action);
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

        expect($content)->toContain('use GuzzleHttp\Client);');
        expect($content)->toContain('use Modules\Notify\Datas\SMS\AgiletelecomData);');
        expect($content)->toContain('use Override);');
    });

    it('does not use QueueableAction trait', function () {
        $traits = class_uses($action);

        expect($traits)->not->toContain('Spatie\QueueableAction\QueueableAction');
>>>>>>> 929ed821d (.)
    });
});
