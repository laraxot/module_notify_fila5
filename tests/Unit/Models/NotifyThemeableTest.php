<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Models;

<<<<<<< HEAD
use PHPUnit\Framework\Assert;
use Modules\Notify\Models\NotifyThemeable;
use Modules\Notify\Tests\TestCase;
use function Pest\Laravel\get;

uses(\Modules\Notify\Tests\TestCase::class);

beforeEach(function (): void {
    /** @var \Modules\Notify\Tests\TestCase $this */
$this->disableExceptionHandling();
});

describe('Notify Themeable', function (): void {
    test('_can_create_notify_themeable', function (): void {
        /** @var \Modules\Notify\Tests\TestCase $this */
$themeable = NotifyThemeable::create([
=======
use Modules\Notify\Models\NotifyThemeable;
use Modules\Notify\Tests\TestCase;

class NotifyThemeableTest extends TestCase
{
    // DatabaseTransactions is already used in the module TestCase

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutExceptionHandling();
    }

    /** @test */
    public function it_can_create_notify_themeable(): void
    {
        $themeable = NotifyThemeable::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => 123,
            'notify_theme_id' => 456,
        ]);
<<<<<<< HEAD
        \assertNotifyTableHas('notify_themeables', [
=======

        $this->assertDatabaseHas('notify_themeables', [
>>>>>>> 929ed821d (.)
            'id' => $themeable->id,
            'model_type' => 'App\Models\User',
            'model_id' => 123,
            'notify_theme_id' => 456,
        ]);

<<<<<<< HEAD
        Assert::assertInstanceOf(NotifyThemeable::class, $themeable);
    });

    test('_can_create_with_created_by_and_updated_by', function (): void {
$themeable = NotifyThemeable::create([
=======
        $this->assertInstanceOf(NotifyThemeable::class, $themeable);
    }

    /** @test */
    public function it_can_create_with_created_by_and_updated_by(): void
    {
        $themeable = NotifyThemeable::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\Company',
            'model_id' => 789,
            'notify_theme_id' => 101,
            'created_by' => 'user_123',
            'updated_by' => 'user_123',
        ]);
<<<<<<< HEAD
        \assertNotifyTableHas('notify_themeables', [
=======

        $this->assertDatabaseHas('notify_themeables', [
>>>>>>> 929ed821d (.)
            'id' => $themeable->id,
            'model_type' => 'App\Models\Company',
            'model_id' => 789,
            'notify_theme_id' => 101,
            'created_by' => 'user_123',
            'updated_by' => 'user_123',
        ]);

<<<<<<< HEAD
        Assert::assertEquals('user_123', $themeable->created_by);
        Assert::assertEquals('user_123', $themeable->updated_by);
    });

    test('_can_update_notify_themeable', function (): void {
$themeable = NotifyThemeable::create([
=======
        $this->assertEquals('user_123', $themeable->created_by);
        $this->assertEquals('user_123', $themeable->updated_by);
    }

    /** @test */
    public function it_can_update_notify_themeable(): void
    {
        $themeable = NotifyThemeable::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => 123,
            'notify_theme_id' => 456,
        ]);

        $themeable->update([
            'notify_theme_id' => 789,
            'updated_by' => 'user_456',
        ]);
<<<<<<< HEAD
        \assertNotifyTableHas('notify_themeables', [
=======

        $this->assertDatabaseHas('notify_themeables', [
>>>>>>> 929ed821d (.)
            'id' => $themeable->id,
            'notify_theme_id' => 789,
            'updated_by' => 'user_456',
        ]);

<<<<<<< HEAD
        Assert::assertEquals(789, \assertFreshModel($themeable, \Modules\Notify\Models\NotifyThemeable::class)->notify_theme_id);
        Assert::assertEquals('user_456', \assertFreshModel($themeable, \Modules\Notify\Models\NotifyThemeable::class)->updated_by);
    });

    test('_can_find_by_model_type_and_id', function (): void {
$themeable = NotifyThemeable::create([
=======
        $this->assertEquals(789, $themeable->fresh()->notify_theme_id);
        $this->assertEquals('user_456', $themeable->fresh()->updated_by);
    }

    /** @test */
    public function it_can_find_by_model_type_and_id(): void
    {
        $themeable = NotifyThemeable::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => 123,
            'notify_theme_id' => 456,
        ]);

        $found = NotifyThemeable::where('model_type', 'App\Models\User')->where('model_id', 123)->first();

<<<<<<< HEAD
        Assert::assertNotNull($found);
        Assert::assertEquals($themeable->id, $found->id);
        Assert::assertEquals('App\Models\User', $found->model_type);
        Assert::assertEquals(123, $found->model_id);
        Assert::assertEquals(456, $found->notify_theme_id);
    });

    test('_can_find_by_notify_theme_id', function (): void {
NotifyThemeable::create([
=======
        $this->assertNotNull($found);
        $this->assertEquals($themeable->id, $found->id);
        $this->assertEquals('App\Models\User', $found->model_type);
        $this->assertEquals(123, $found->model_id);
        $this->assertEquals(456, $found->notify_theme_id);
    }

    /** @test */
    public function it_can_find_by_notify_theme_id(): void
    {
        NotifyThemeable::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => 123,
            'notify_theme_id' => 456,
        ]);

        NotifyThemeable::create([
            'model_type' => 'App\Models\Company',
            'model_id' => 789,
            'notify_theme_id' => 456,
        ]);

        NotifyThemeable::create([
            'model_type' => 'App\Models\Order',
            'model_id' => 101,
            'notify_theme_id' => 789,
        ]);

        $theme456Themeables = NotifyThemeable::where('notify_theme_id', 456)->get();
        $theme789Themeables = NotifyThemeable::where('notify_theme_id', 789)->get();

<<<<<<< HEAD
        Assert::assertCount(2, $theme456Themeables);
        Assert::assertCount(1, $theme789Themeables);
        Assert::assertEquals(456, \assertFirstModel($theme456Themeables, \Modules\Notify\Models\NotifyThemeable::class)->notify_theme_id);
        Assert::assertEquals(456, \assertFirstModel($theme456Themeables->slice(1), \Modules\Notify\Models\NotifyThemeable::class)->notify_theme_id);
        Assert::assertEquals(789, \assertFirstModel($theme789Themeables, \Modules\Notify\Models\NotifyThemeable::class)->notify_theme_id);
    });

    test('_can_find_by_model_type', function (): void {
NotifyThemeable::create([
=======
        $this->assertCount(2, $theme456Themeables);
        $this->assertCount(1, $theme789Themeables);
        $this->assertEquals(456, $theme456Themeables[0]->notify_theme_id);
        $this->assertEquals(456, $theme456Themeables[1]->notify_theme_id);
        $this->assertEquals(789, $theme789Themeables[0]->notify_theme_id);
    }

    /** @test */
    public function it_can_find_by_model_type(): void
    {
        NotifyThemeable::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => 123,
            'notify_theme_id' => 456,
        ]);

        NotifyThemeable::create([
            'model_type' => 'App\Models\User',
            'model_id' => 456,
            'notify_theme_id' => 789,
        ]);

        NotifyThemeable::create([
            'model_type' => 'App\Models\Company',
            'model_id' => 789,
            'notify_theme_id' => 101,
        ]);

        $userThemeables = NotifyThemeable::where('model_type', 'App\Models\User')->get();
        $companyThemeables = NotifyThemeable::where('model_type', 'App\Models\Company')->get();

<<<<<<< HEAD
        Assert::assertCount(2, $userThemeables);
        Assert::assertCount(1, $companyThemeables);
        Assert::assertEquals('App\Models\User', \assertFirstModel($userThemeables, \Modules\Notify\Models\NotifyThemeable::class)->model_type);
        Assert::assertEquals('App\Models\User', \assertFirstModel($userThemeables->slice(1), \Modules\Notify\Models\NotifyThemeable::class)->model_type);
        Assert::assertEquals('App\Models\Company', \assertFirstModel($companyThemeables, \Modules\Notify\Models\NotifyThemeable::class)->model_type);
    });

    test('_can_find_by_created_by', function (): void {
NotifyThemeable::create([
=======
        $this->assertCount(2, $userThemeables);
        $this->assertCount(1, $companyThemeables);
        $this->assertEquals('App\Models\User', $userThemeables[0]->model_type);
        $this->assertEquals('App\Models\User', $userThemeables[1]->model_type);
        $this->assertEquals('App\Models\Company', $companyThemeables[0]->model_type);
    }

    /** @test */
    public function it_can_find_by_created_by(): void
    {
        NotifyThemeable::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => 123,
            'notify_theme_id' => 456,
            'created_by' => 'user_123',
        ]);

        NotifyThemeable::create([
            'model_type' => 'App\Models\Company',
            'model_id' => 789,
            'notify_theme_id' => 101,
            'created_by' => 'user_456',
        ]);

        NotifyThemeable::create([
            'model_type' => 'App\Models\Order',
            'model_id' => 101,
            'notify_theme_id' => 789,
            'created_by' => 'user_123',
        ]);

        $user123Themeables = NotifyThemeable::where('created_by', 'user_123')->get();
        $user456Themeables = NotifyThemeable::where('created_by', 'user_456')->get();

<<<<<<< HEAD
        Assert::assertCount(2, $user123Themeables);
        Assert::assertCount(1, $user456Themeables);
        Assert::assertEquals('user_123', \assertFirstModel($user123Themeables, \Modules\Notify\Models\NotifyThemeable::class)->created_by);
        Assert::assertEquals('user_123', \assertFirstModel($user123Themeables->slice(1), \Modules\Notify\Models\NotifyThemeable::class)->created_by);
        Assert::assertEquals('user_456', \assertFirstModel($user456Themeables, \Modules\Notify\Models\NotifyThemeable::class)->created_by);
    });

    test('_can_find_by_updated_by', function (): void {
NotifyThemeable::create([
=======
        $this->assertCount(2, $user123Themeables);
        $this->assertCount(1, $user456Themeables);
        $this->assertEquals('user_123', $user123Themeables[0]->created_by);
        $this->assertEquals('user_123', $user123Themeables[1]->created_by);
        $this->assertEquals('user_456', $user456Themeables[0]->created_by);
    }

    /** @test */
    public function it_can_find_by_updated_by(): void
    {
        NotifyThemeable::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => 123,
            'notify_theme_id' => 456,
            'updated_by' => 'user_123',
        ]);

        NotifyThemeable::create([
            'model_type' => 'App\Models\Company',
            'model_id' => 789,
            'notify_theme_id' => 101,
            'updated_by' => 'user_456',
        ]);

        NotifyThemeable::create([
            'model_type' => 'App\Models\Order',
            'model_id' => 101,
            'notify_theme_id' => 789,
            'updated_by' => 'user_123',
        ]);

        $user123Themeables = NotifyThemeable::where('updated_by', 'user_123')->get();
        $user456Themeables = NotifyThemeable::where('updated_by', 'user_456')->get();

<<<<<<< HEAD
        Assert::assertCount(2, $user123Themeables);
        Assert::assertCount(1, $user456Themeables);
        Assert::assertEquals('user_123', \assertFirstModel($user123Themeables, \Modules\Notify\Models\NotifyThemeable::class)->updated_by);
        Assert::assertEquals('user_123', \assertFirstModel($user123Themeables->slice(1), \Modules\Notify\Models\NotifyThemeable::class)->updated_by);
        Assert::assertEquals('user_456', \assertFirstModel($user456Themeables, \Modules\Notify\Models\NotifyThemeable::class)->updated_by);
    });

    test('_can_find_by_multiple_criteria', function (): void {
NotifyThemeable::create([
=======
        $this->assertCount(2, $user123Themeables);
        $this->assertCount(1, $user456Themeables);
        $this->assertEquals('user_123', $user123Themeables[0]->updated_by);
        $this->assertEquals('user_123', $user123Themeables[1]->updated_by);
        $this->assertEquals('user_456', $user456Themeables[0]->updated_by);
    }

    /** @test */
    public function it_can_find_by_multiple_criteria(): void
    {
        NotifyThemeable::create([
>>>>>>> 929ed821d (.)
            'model_type' => 'App\Models\User',
            'model_id' => 123,
            'notify_theme_id' => 456,
            'created_by' => 'user_123',
        ]);

        NotifyThemeable::create([
            'model_type' => 'App\Models\User',
            'model_id' => 456,
            'notify_theme_id' => 789,
            'created_by' => 'user_456',
        ]);

        NotifyThemeable::create([
            'model_type' => 'App\Models\Company',
            'model_id' => 789,
            'notify_theme_id' => 101,
            'created_by' => 'user_123',
        ]);

        $user123Themeables = NotifyThemeable::where('model_type', 'App\Models\User')
            ->where('created_by', 'user_123')
            ->get();

<<<<<<< HEAD
        Assert::assertCount(1, $user123Themeables);
        Assert::assertEquals('App\Models\User', \assertFirstModel($user123Themeables, \Modules\Notify\Models\NotifyThemeable::class)->model_type);
        Assert::assertEquals(123, \assertFirstModel($user123Themeables, \Modules\Notify\Models\NotifyThemeable::class)->model_id);
        Assert::assertEquals(456, \assertFirstModel($user123Themeables, \Modules\Notify\Models\NotifyThemeable::class)->notify_theme_id);
        Assert::assertEquals('user_123', \assertFirstModel($user123Themeables, \Modules\Notify\Models\NotifyThemeable::class)->created_by);
    });

    test('_can_handle_null_values', function (): void {
$themeable = NotifyThemeable::create([
=======
        $this->assertCount(1, $user123Themeables);
        $this->assertEquals('App\Models\User', $user123Themeables[0]->model_type);
        $this->assertEquals(123, $user123Themeables[0]->model_id);
        $this->assertEquals(456, $user123Themeables[0]->notify_theme_id);
        $this->assertEquals('user_123', $user123Themeables[0]->created_by);
    }

    /** @test */
    public function it_can_handle_null_values(): void
    {
        $themeable = NotifyThemeable::create([
>>>>>>> 929ed821d (.)
            'model_type' => null,
            'model_id' => null,
            'notify_theme_id' => null,
            'created_by' => null,
            'updated_by' => null,
        ]);

<<<<<<< HEAD
        Assert::assertNull($themeable->model_type);
        Assert::assertNull($themeable->model_id);
        Assert::assertNull($themeable->notify_theme_id);
        Assert::assertNull($themeable->created_by);
        Assert::assertNull($themeable->updated_by);
    });

    test('_can_create_multiple_themeables', function (): void {
$themeables = [
=======
        $this->assertNull($themeable->model_type);
        $this->assertNull($themeable->model_id);
        $this->assertNull($themeable->notify_theme_id);
        $this->assertNull($themeable->created_by);
        $this->assertNull($themeable->updated_by);
    }

    /** @test */
    public function it_can_create_multiple_themeables(): void
    {
        $themeables = [
>>>>>>> 929ed821d (.)
            [
                'model_type' => 'App\Models\User',
                'model_id' => 1,
                'notify_theme_id' => 101,
                'created_by' => 'user_1',
            ],
            [
                'model_type' => 'App\Models\User',
                'model_id' => 2,
                'notify_theme_id' => 102,
                'created_by' => 'user_2',
            ],
            [
                'model_type' => 'App\Models\Company',
                'model_id' => 1,
                'notify_theme_id' => 201,
                'created_by' => 'user_1',
            ],
            [
                'model_type' => 'App\Models\Company',
                'model_id' => 2,
                'notify_theme_id' => 202,
                'created_by' => 'user_2',
            ],
            [
                'model_type' => 'App\Models\Order',
                'model_id' => 1,
                'notify_theme_id' => 301,
                'created_by' => 'user_1',
            ],
        ];

        foreach ($themeables as $themeableData) {
            NotifyThemeable::create($themeableData);
        }

<<<<<<< HEAD
        Assert::assertSame(5, NotifyThemeable::query()->count());
=======
        $this->assertDatabaseCount('notify_themeables', 5);
>>>>>>> 929ed821d (.)

        $userThemeables = NotifyThemeable::where('model_type', 'App\Models\User')->get();
        $companyThemeables = NotifyThemeable::where('model_type', 'App\Models\Company')->get();
        $orderThemeables = NotifyThemeable::where('model_type', 'App\Models\Order')->get();

<<<<<<< HEAD
        Assert::assertCount(2, $userThemeables);
        Assert::assertCount(2, $companyThemeables);
        Assert::assertCount(1, $orderThemeables);

        $user1Themeables = NotifyThemeable::where('created_by', 'user_1')->get();
        Assert::assertCount(3, $user1Themeables);
    });

    test('_can_find_by_date_range', function (): void {
$yesterday = now()->subDay();
=======
        $this->assertCount(2, $userThemeables);
        $this->assertCount(2, $companyThemeables);
        $this->assertCount(1, $orderThemeables);

        $user1Themeables = NotifyThemeable::where('created_by', 'user_1')->get();
        $this->assertCount(3, $user1Themeables);
    }

    /** @test */
    public function it_can_find_by_date_range(): void
    {
        $yesterday = now()->subDay();
>>>>>>> 929ed821d (.)
        $today = now();
        $tomorrow = now()->addDay();

        NotifyThemeable::create([
            'model_type' => 'App\Models\User',
            'model_id' => 1,
            'notify_theme_id' => 101,
            'created_at' => $yesterday,
        ]);

        NotifyThemeable::create([
            'model_type' => 'App\Models\User',
            'model_id' => 2,
            'notify_theme_id' => 102,
            'created_at' => $today,
        ]);

        NotifyThemeable::create([
            'model_type' => 'App\Models\Company',
            'model_id' => 1,
            'notify_theme_id' => 201,
            'created_at' => $tomorrow,
        ]);

        $todayThemeables = NotifyThemeable::whereDate('created_at', $today->toDateString())->get();
        $recentThemeables = NotifyThemeable::where('created_at', '>=', $yesterday)->get();

<<<<<<< HEAD
        Assert::assertCount(1, $todayThemeables);
        Assert::assertCount(2, $recentThemeables); // yesterday and today
        Assert::assertEquals('App\Models\User', \assertFirstModel($todayThemeables, \Modules\Notify\Models\NotifyThemeable::class)->model_type);
        Assert::assertEquals(2, \assertFirstModel($todayThemeables, \Modules\Notify\Models\NotifyThemeable::class)->model_id);
    });
});
=======
        $this->assertCount(1, $todayThemeables);
        $this->assertCount(2, $recentThemeables); // yesterday and today
        $this->assertEquals('App\Models\User', $todayThemeables[0]->model_type);
        $this->assertEquals(2, $todayThemeables[0]->model_id);
    }
}
>>>>>>> 929ed821d (.)
