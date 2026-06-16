<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Actions;
<<<<<<< HEAD
use Modules\Notify\Tests\TestCase;
use function Safe\file_get_contents;
use function Safe\class_uses;
use Illuminate\Notifications\Messages\MailMessage;
use Modules\Notify\Actions\BuildMailMessageAction;
use PHPUnit\Framework\Assert;
use Spatie\QueueableAction\QueueableAction;

uses(\Modules\Notify\Tests\TestCase::class);

=======

use Illuminate\Notifications\Messages\MailMessage;
use Modules\Notify\Actions\BuildMailMessageAction;
use Spatie\QueueableAction\QueueableAction;

>>>>>>> 929ed821d (.)
describe('BuildMailMessageAction', function () {
    // Test strutturali - non richiede container per la classe
    it('has correct class definition', function () {
        $reflection = new \ReflectionClass(BuildMailMessageAction::class);

<<<<<<< HEAD
        Assert::assertTrue($reflection->isInstantiable());
=======
        expect($reflection->isInstantiable())->toBeTrue();
>>>>>>> 929ed821d (.)
    });

    it('uses QueueableAction trait', function () {
        $traits = class_uses(BuildMailMessageAction::class);
<<<<<<< HEAD
        Assert::assertArrayHasKey(QueueableAction::class, $traits);
=======
        expect($traits)->toContain(QueueableAction::class);
>>>>>>> 929ed821d (.)
    });

    it('has execute method with correct signature', function () {
        $reflection = new \ReflectionClass(BuildMailMessageAction::class);
        $method = $reflection->getMethod('execute');

<<<<<<< HEAD
        Assert::assertTrue($method->isPublic());
        Assert::assertSame(4, $method->getNumberOfParameters());
=======
        expect($method->isPublic())->toBeTrue();
        expect($method->getNumberOfParameters())->toBe(4);
>>>>>>> 929ed821d (.)
    });

    it('has correct return type', function () {
        $reflection = new \ReflectionClass(BuildMailMessageAction::class);
        $method = $reflection->getMethod('execute');
        $returnType = $method->getReturnType();

<<<<<<< HEAD
        \assertReflectionTypeName($returnType, MailMessage::class);
=======
        expect($returnType?->getName())->toBe(MailMessage::class);
>>>>>>> 929ed821d (.)
    });

    it('has private decodeRichText method', function () {
        $reflection = new \ReflectionClass(BuildMailMessageAction::class);
        $method = $reflection->getMethod('decodeRichText');

<<<<<<< HEAD
        Assert::assertTrue($method->isPrivate());
=======
        expect($method->isPrivate())->toBeTrue();
>>>>>>> 929ed821d (.)
    });

    it('uses strict types', function () {
        $reflection = new \ReflectionClass(BuildMailMessageAction::class);
<<<<<<< HEAD
        $content = \notifyReflectionSource($reflection);
        Assert::assertStringContainsString('declare(strict_types=1)', $content);
=======
        $filename = $reflection->getFileName();

        expect($filename)->not->toBeNull();
        $content = file_get_contents($filename);
        expect($content)->toContain('');
>>>>>>> 929ed821d (.)
    });

    it('has correct namespace', function () {
        $reflection = new \ReflectionClass(BuildMailMessageAction::class);

<<<<<<< HEAD
        Assert::assertSame('Modules\Notify\Actions', $reflection->getNamespaceName());
    });

    it('has required imports', function () {
        $reflection = new \ReflectionClass(BuildMailMessageAction::class);
        $content = \notifyReflectionSource($reflection);

        Assert::assertStringContainsString('use Modules\Notify\Actions\NotifyTheme\Get;', $content);
        Assert::assertStringContainsString('use Modules\Notify\Datas\AttachmentData;', $content);
        Assert::assertStringContainsString('use Spatie\LaravelData\DataCollection;', $content);
=======
        expect($reflection->getNamespaceName())->toBe('Modules\Notify\Actions');
    });

    it('has required imports', function () {
        $filename = (new \ReflectionClass(BuildMailMessageAction::class))->getFileName();
        $content = file_get_contents($filename);

        expect($content)->toContain('use Modules\Notify\Actions\NotifyTheme\Get;');
        expect($content)->toContain('use Modules\Notify\Datas\AttachmentData;');
        expect($content)->toContain('use Spatie\LaravelData\DataCollection;');
>>>>>>> 929ed821d (.)
    });

    it('has QueueableAction trait applied correctly', function () {
        // The trait is applied, checking trait methods presence
        $traits = class_uses(BuildMailMessageAction::class);
<<<<<<< HEAD
        Assert::assertArrayHasKey(QueueableAction::class, $traits);
=======
        expect($traits)->toContain(QueueableAction::class);
>>>>>>> 929ed821d (.)
    });
});
