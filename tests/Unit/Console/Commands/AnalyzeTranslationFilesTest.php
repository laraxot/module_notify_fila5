<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Console\Commands;
<<<<<<< HEAD
use Illuminate\Console\Command;
use Modules\Notify\Console\Commands\AnalyzeTranslationFiles;
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(\Modules\Notify\Tests\TestCase::class);
=======

use Illuminate\Console\Command;
use Modules\Notify\Console\Commands\AnalyzeTranslationFiles;
>>>>>>> 929ed821d (.)

describe('AnalyzeTranslationFiles', function () {
    it('has correct signature', function () {
        $command = new AnalyzeTranslationFiles;

<<<<<<< HEAD
        Assert::assertSame('notify:analyze-translations', $command->getName());
=======
        expect($command->getName())->toBe('notify:analyze-translations');
>>>>>>> 929ed821d (.)
    });

    it('has description', function () {
        $command = new AnalyzeTranslationFiles;

<<<<<<< HEAD
        Assert::assertNotEmpty($command->getDescription());
=======
        $description = $command->getDescription();

        expect($description)->not->toBeEmpty();
        expect($description)->toBeString();
>>>>>>> 929ed821d (.)
    });

    it('extends command', function () {
        $command = new AnalyzeTranslationFiles;

<<<<<<< HEAD
        Assert::assertInstanceOf(Command::class, $command);
    });

    it('has handle method', function () {
        $reflection = new \ReflectionClass(AnalyzeTranslationFiles::class);

        Assert::assertTrue($reflection->hasMethod('handle'));
    });

    it('has flatten array method', function () {
        $reflection = new \ReflectionClass(AnalyzeTranslationFiles::class);

        Assert::assertTrue($reflection->hasMethod('flattenArray'));
    });

    it('has analyze structure patterns method', function () {
        $reflection = new \ReflectionClass(AnalyzeTranslationFiles::class);

        Assert::assertTrue($reflection->hasMethod('analyzeStructurePatterns'));
    });

    it('has generate consistency report method', function () {
        $reflection = new \ReflectionClass(AnalyzeTranslationFiles::class);

        Assert::assertTrue($reflection->hasMethod('generateConsistencyReport'));
    });

    it('has generate recommendations method', function () {
        $reflection = new \ReflectionClass(AnalyzeTranslationFiles::class);

        Assert::assertTrue($reflection->hasMethod('generateRecommendations'));
    });

    it('has analyze navigation structure method', function () {
        $reflection = new \ReflectionClass(AnalyzeTranslationFiles::class);

        Assert::assertTrue($reflection->hasMethod('analyzeNavigationStructure'));
=======
        expect($command)->toBeInstanceOf(Command::class);
    });

    it('has handle method', function () {
        $command = new AnalyzeTranslationFiles;

        expect(method_exists($command, 'handle'))->toBeTrue();
    });

    it('has flatten array method', function () {
        $command = new AnalyzeTranslationFiles;

        expect(method_exists($command, 'flattenArray'))->toBeTrue();
    });

    it('has analyze structure patterns method', function () {
        $command = new AnalyzeTranslationFiles;

        expect(method_exists($command, 'analyzeStructurePatterns'))->toBeTrue();
    });

    it('has generate consistency report method', function () {
        $command = new AnalyzeTranslationFiles;

        expect(method_exists($command, 'generateConsistencyReport'))->toBeTrue();
    });

    it('has generate recommendations method', function () {
        $command = new AnalyzeTranslationFiles;

        expect(method_exists($command, 'generateRecommendations'))->toBeTrue();
    });

    it('has analyze navigation structure method', function () {
        $command = new AnalyzeTranslationFiles;

        expect(method_exists($command, 'analyzeNavigationStructure'))->toBeTrue();
>>>>>>> 929ed821d (.)
    });

    it('flatten array handles nested arrays', function () {
        $command = new AnalyzeTranslationFiles;

        $reflection = new \ReflectionClass($command);
        $method = $reflection->getMethod('flattenArray');
        $method->setAccessible(true);

        $input = [
            'parent' => [
                'child1' => 'value1',
                'child2' => 'value2',
            ],
        ];

<<<<<<< HEAD
        $result = \assertNotifyArray($method->invoke($command, $input));

        Assert::assertArrayHasKey('parent.child1', $result);
        Assert::assertArrayHasKey('parent.child2', $result);
        Assert::assertSame('value1', $result['parent.child1']);
=======
        $result = $method->invoke($command, $input);

        expect($result)->toHaveKey('parent.child1');
        expect($result)->toHaveKey('parent.child2');
        expect($result['parent.child1'])->toBe('value1');
>>>>>>> 929ed821d (.)
    });

    it('flatten array handles empty array', function () {
        $command = new AnalyzeTranslationFiles;

        $reflection = new \ReflectionClass($command);
        $method = $reflection->getMethod('flattenArray');
        $method->setAccessible(true);

<<<<<<< HEAD
        $result = \assertNotifyArray($method->invoke($command, []));

        Assert::assertEmpty($result);
=======
        $result = $method->invoke($command, []);

        expect($result)->toBeEmpty();
>>>>>>> 929ed821d (.)
    });

    it('flatten array handles nested levels', function () {
        $command = new AnalyzeTranslationFiles;

        $reflection = new \ReflectionClass($command);
        $method = $reflection->getMethod('flattenArray');
        $method->setAccessible(true);

        $input = [
            'level1' => [
                'level2' => [
                    'level3' => 'deep value',
                ],
            ],
        ];

<<<<<<< HEAD
        $result = \assertNotifyArray($method->invoke($command, $input));

        Assert::assertArrayHasKey('level1.level2.level3', $result);
        Assert::assertSame('deep value', $result['level1.level2.level3']);
=======
        $result = $method->invoke($command, $input);

        expect($result)->toHaveKey('level1.level2.level3');
        expect($result['level1.level2.level3'])->toBe('deep value');
>>>>>>> 929ed821d (.)
    });

    it('flatten array handles prefix parameter', function () {
        $command = new AnalyzeTranslationFiles;

        $reflection = new \ReflectionClass($command);
        $method = $reflection->getMethod('flattenArray');
        $method->setAccessible(true);

        $input = ['key' => 'value'];

<<<<<<< HEAD
        $result = \assertNotifyArray($method->invoke($command, $input, 'prefix'));

        Assert::assertArrayHasKey('prefix.key', $result);
=======
        $result = $method->invoke($command, $input, 'prefix');

        expect($result)->toHaveKey('prefix.key');
>>>>>>> 929ed821d (.)
    });
});
