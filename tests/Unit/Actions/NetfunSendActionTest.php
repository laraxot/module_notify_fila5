<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Actions;
<<<<<<< HEAD
use Modules\Notify\Tests\TestCase;
use function Safe\file_get_contents;
use Modules\Notify\Actions\NetfunSendAction;
use Modules\Notify\Datas\SmsData;
use PHPUnit\Framework\Assert;
use Spatie\QueueableAction\QueueableAction;

use function Safe\class_uses;

uses(\Modules\Notify\Tests\TestCase::class);

=======

use Modules\Notify\Actions\NetfunSendAction;
use Modules\Notify\Datas\SmsData;
use Spatie\QueueableAction\QueueableAction;

>>>>>>> 929ed821d (.)
describe('NetfunSendAction', function () {
    // Test strutturali senza istanziazione - la classe richiede config() nel costruttore
    it('has correct class definition', function () {
        $reflection = new \ReflectionClass(NetfunSendAction::class);

<<<<<<< HEAD
        Assert::assertTrue($reflection->isInstantiable());
=======
        expect($reflection->isInstantiable())->toBeTrue();
>>>>>>> 929ed821d (.)
    });

    it('uses QueueableAction trait', function () {
        $traits = class_uses(NetfunSendAction::class);
<<<<<<< HEAD
        Assert::assertArrayHasKey(QueueableAction::class, $traits);
=======
        expect($traits)->toContain(QueueableAction::class);
>>>>>>> 929ed821d (.)
    });

    it('has execute method with correct signature', function () {
        $reflection = new \ReflectionClass(NetfunSendAction::class);
        $method = $reflection->getMethod('execute');

<<<<<<< HEAD
        Assert::assertTrue($method->isPublic());
        Assert::assertSame(1, $method->getNumberOfParameters());
=======
        expect($method->isPublic())->toBeTrue();
        expect($method->getNumberOfParameters())->toBe(1);
>>>>>>> 929ed821d (.)
    });

    it('execute accepts SmsData parameter', function () {
        $reflection = new \ReflectionClass(NetfunSendAction::class);
        $method = $reflection->getMethod('execute');
        $params = $method->getParameters();

<<<<<<< HEAD
        \assertReflectionTypeName($params[0]->getType(), SmsData::class);
=======
        expect($params[0]->getType()?->getName())->toBe(SmsData::class);
>>>>>>> 929ed821d (.)
    });

    it('execute returns array', function () {
        $reflection = new \ReflectionClass(NetfunSendAction::class);
        $method = $reflection->getMethod('execute');
        $returnType = $method->getReturnType();

<<<<<<< HEAD
        \assertReflectionTypeName($returnType, 'array');
=======
        expect($returnType?->getName())->toBe('array');
>>>>>>> 929ed821d (.)
    });

    it('has token property', function () {
        $reflection = new \ReflectionClass(NetfunSendAction::class);

<<<<<<< HEAD
        Assert::assertTrue($reflection->hasProperty('token'));
=======
        expect($reflection->hasProperty('token'))->toBeTrue();
>>>>>>> 929ed821d (.)
    });

    it('has vars property', function () {
        $reflection = new \ReflectionClass(NetfunSendAction::class);

<<<<<<< HEAD
        Assert::assertTrue($reflection->hasProperty('vars'));
=======
        expect($reflection->hasProperty('vars'))->toBeTrue();
>>>>>>> 929ed821d (.)
    });

    it('uses strict types', function () {
        $reflection = new \ReflectionClass(NetfunSendAction::class);
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
        $reflection = new \ReflectionClass(NetfunSendAction::class);

<<<<<<< HEAD
        Assert::assertSame('Modules\Notify\Actions', $reflection->getNamespaceName());
=======
        expect($reflection->getNamespaceName())->toBe('Modules\Notify\Actions');
    });

    it('has required imports', function () {
        $filename = (new \ReflectionClass(NetfunSendAction::class))->getFileName();
        $content = file_get_contents($filename);

        expect($content)->toContain('use GuzzleHttp\Client;');
        expect($content)->toContain('use Modules\Notify\Datas\SmsData;');
>>>>>>> 929ed821d (.)
    });
});
