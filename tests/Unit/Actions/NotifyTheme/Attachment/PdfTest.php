<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Actions\NotifyTheme\Attachment;
<<<<<<< HEAD
use Modules\Notify\Tests\TestCase;
use function Safe\file_get_contents;
use Modules\Notify\Actions\NotifyTheme\Attachment\Pdf;
use Modules\Notify\Datas\AttachmentData;
use PHPUnit\Framework\Assert;
use Spatie\QueueableAction\QueueableAction;

use function Safe\class_uses;

uses(\Modules\Notify\Tests\TestCase::class);

describe('NotifyTheme\Attachment\Pdf', function () {
        it('can be instantiated', function () {
        Assert::assertTrue(class_exists(Pdf::class));
    });

    it('uses QueueableAction trait', function () {
        $traits = class_uses(AttachmentData::class);
        Assert::assertArrayHasKey(QueueableAction::class, $traits);
    });

    it('has execute method with correct signature', function () {
        $reflection = new \ReflectionClass(Pdf::class);
        $method = $reflection->getMethod('execute');

        Assert::assertTrue($method->isPublic());
        Assert::assertSame(2, $method->getNumberOfParameters());
    });

    it('execute accepts string and array parameters', function () {
        $reflection = new \ReflectionClass(Pdf::class);
        $method = $reflection->getMethod('execute');
        $params = $method->getParameters();

        \assertReflectionTypeName($params[0]->getType(), 'string');
        \assertReflectionTypeName($params[1]->getType(), 'array');
    });

    it('execute returns AttachmentData', function () {
        $reflection = new \ReflectionClass(Pdf::class);
        $method = $reflection->getMethod('execute');
        $returnType = $method->getReturnType();

        \assertReflectionTypeName($returnType, AttachmentData::class);
    });

    it('uses strict types', function () {
        $reflection = new \ReflectionClass(Pdf::class);
        $content = \notifyReflectionSource($reflection);
        Assert::assertStringContainsString('declare(strict_types=1)', $content);
    });

    it('has correct namespace', function () {
        $reflection = new \ReflectionClass(Pdf::class);

        Assert::assertSame('Modules\Notify\Actions\NotifyTheme\Attachment', $reflection->getNamespaceName());
    });

    it('has required imports', function () {
        $content = \notifyReflectionSource(new \ReflectionClass(Pdf::class));

        Assert::assertStringContainsString('use Modules\Notify\Actions\NotifyTheme\Get', $content);
        Assert::assertStringContainsString('use Modules\Notify\Datas\AttachmentData', $content);
        Assert::assertStringContainsString('use Modules\Xot\Services\HtmlService', $content);
=======

use Modules\Notify\Actions\NotifyTheme\Attachment\Pdf;
use Modules\Notify\Datas\AttachmentData;
use Spatie\QueueableAction\QueueableAction;

describe('NotifyTheme\Attachment\Pdf', function () {
    beforeEach(function () {
        $action = new Pdf;
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
        expect($method->getNumberOfParameters())->toBe(2);
    });

    it('execute accepts string and array parameters', function () {
        $reflection = new \ReflectionClass($action);
        $method = $reflection->getMethod('execute');
        $params = $method->getParameters();

        expect($params[0]->getType()?->getName())->toBe('string');
        expect($params[1]->getType()?->getName())->toBe('array');
    });

    it('execute returns AttachmentData', function () {
        $reflection = new \ReflectionClass($action);
        $method = $reflection->getMethod('execute');
        $returnType = $method->getReturnType();

        expect($returnType?->getName())->toBe(AttachmentData::class);
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

        expect($reflection->getNamespaceName())->toBe('Modules\Notify\Actions\NotifyTheme\Attachment');
    });

    it('has required imports', function () {
        $filename = (new \ReflectionClass($action));
        $content = file_get_contents($filename);

        expect($content)->toContain('use Modules\Notify\Actions\NotifyTheme\Get);');
        expect($content)->toContain('use Modules\Notify\Datas\AttachmentData);');
        expect($content)->toContain('use Modules\Xot\Services\HtmlService);');
>>>>>>> 929ed821d (.)
    });
});
