<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Modules\Notify\Models\BaseModel;
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(\Modules\Notify\Tests\TestCase::class);

test('base model extends eloquent model', function () {
        $baseModel = new class extends BaseModel
    {
        protected $table = 'test_notify_table';
    };

    Assert::assertInstanceOf(Model::class, $baseModel);
});

test('base model has correct table name', function () {
        $baseModel = new class extends BaseModel
    {
        protected $table = 'test_notify_table';
    };

    Assert::assertSame('test_notify_table', $baseModel->getTable());
});

test('base model can be instantiated', function () {
        $baseModel = new class extends BaseModel
    {
        protected $table = 'test_notify_table';
    };

    Assert::assertInstanceOf(BaseModel::class, $baseModel);
});

test('base model has proper inheritance chain', function () {
        $baseModel = new class extends BaseModel
    {
        protected $table = 'test_notify_table';
    };

    Assert::assertInstanceOf(BaseModel::class, $baseModel);
    Assert::assertInstanceOf(Model::class, $baseModel);
});

test('base model has timestamps enabled', function () {
        $baseModel = new class extends BaseModel
    {
        protected $table = 'test_notify_table';
    };

    Assert::assertTrue($baseModel->usesTimestamps());
=======
uses(TestCase::class);

use Illuminate\Database\Eloquent\Model;
use Modules\Notify\Models\BaseModel;
use Modules\Notify\Tests\TestCase;

beforeEach(function () {
    $this->baseModel = new class extends BaseModel
    {
        protected $table = 'test_notify_table';
    };
});

test('base model extends eloquent model', function () {
    expect($this->baseModel)->toBeInstanceOf(Model::class);
});

test('base model has correct table name', function () {
    expect($this->baseModel->getTable())->toBe('test_notify_table');
});

test('base model can be instantiated', function () {
    expect($this->baseModel)->toBeInstanceOf(BaseModel::class);
});

test('base model has proper inheritance chain', function () {
    expect($this->baseModel)->toBeInstanceOf(BaseModel::class);
    expect($this->baseModel)->toBeInstanceOf(Model::class);
});

test('base model has timestamps enabled', function () {
    expect($this->baseModel->usesTimestamps())->toBeTrue();
>>>>>>> 929ed821d (.)
});
