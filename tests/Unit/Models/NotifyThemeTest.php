<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Models;

<<<<<<< HEAD
use function Safe\json_encode;
use PHPUnit\Framework\Assert;
use Modules\Notify\Models\NotifyTheme;
use Modules\Notify\Tests\TestCase;
use function Pest\Laravel\get;

uses(\Modules\Notify\Tests\TestCase::class);

beforeEach(function (): void {
    /** @var \Modules\Notify\Tests\TestCase $this */
$this->disableExceptionHandling();
});

describe('Notify Theme', function (): void {
    test('_can_create_notify_theme', function (): void {
        /** @var \Modules\Notify\Tests\TestCase $this */
$theme = NotifyTheme::create([
=======
use Modules\Notify\Models\NotifyTheme;
use Modules\Notify\Tests\TestCase;

class NotifyThemeTest extends TestCase
{
    // DatabaseTransactions is already used in the module TestCase

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutExceptionHandling();
    }

    /** @test */
    public function it_can_create_notify_theme(): void
    {
        $theme = NotifyTheme::create([
>>>>>>> 929ed821d (.)
            'lang' => 'it',
            'type' => 'email',
            'subject' => 'Benvenuto nella nostra piattaforma',
            'body' => 'Testo semplice del messaggio di benvenuto',
            'body_html' => '<h1>Benvenuto!</h1><p>Testo HTML del messaggio di benvenuto</p>',
            'from' => 'Sistema',
            'from_email' => 'noreply@example.com',
            'post_type' => 'App\Models\User',
            'post_id' => 123,
            'theme' => 'default',
            'logo_src' => '/images/logo.png',
            'logo_width' => 200,
            'logo_height' => 80,
            'view_params' => [
                'company_name' => 'Example Corp',
                'primary_color' => '#3b82f6',
                'secondary_color' => '#64748b',
            ],
        ]);
<<<<<<< HEAD
        \assertNotifyTableHas('notify_themes', [
=======

        $this->assertDatabaseHas('notify_themes', [
>>>>>>> 929ed821d (.)
            'id' => $theme->id,
            'lang' => 'it',
            'type' => 'email',
            'subject' => 'Benvenuto nella nostra piattaforma',
            'body' => 'Testo semplice del messaggio di benvenuto',
            'body_html' => '<h1>Benvenuto!</h1><p>Testo HTML del messaggio di benvenuto</p>',
            'from' => 'Sistema',
            'from_email' => 'noreply@example.com',
            'post_type' => 'App\Models\User',
            'post_id' => 123,
            'theme' => 'default',
            'logo_src' => '/images/logo.png',
            'logo_width' => 200,
            'logo_height' => 80,
            'view_params' => json_encode([
                'company_name' => 'Example Corp',
                'primary_color' => '#3b82f6',
                'secondary_color' => '#64748b',
            ]),
        ]);

<<<<<<< HEAD
        Assert::assertInstanceOf(NotifyTheme::class, $theme);
    });

    test('_has_correct_fillable_fields', function (): void {
$theme = new NotifyTheme;
=======
        $this->assertInstanceOf(NotifyTheme::class, $theme);
    }

    /** @test */
    public function it_has_correct_fillable_fields(): void
    {
        $theme = new NotifyTheme;
>>>>>>> 929ed821d (.)

        $expectedFillable = [
            'id',
            'lang',
            'type',
            'subject',
            'body',
            'body_html',
            'from',
            'from_email',
            'post_type',
            'post_id',
            'theme',
            'logo_src',
            'logo_width',
            'logo_height',
            'view_params',
        ];

<<<<<<< HEAD
        Assert::assertEquals($expectedFillable, $theme->getFillable());
    });

    test('_has_correct_casts', function (): void {
$theme = new NotifyTheme;
=======
        $this->assertEquals($expectedFillable, $theme->getFillable());
    }

    /** @test */
    public function it_has_correct_casts(): void
    {
        $theme = new NotifyTheme;
>>>>>>> 929ed821d (.)

        $expectedCasts = [
            'id' => 'string',
            'uuid' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
            'updated_by' => 'string',
            'created_by' => 'string',
            'deleted_by' => 'string',
            'view_params' => 'array',
        ];

<<<<<<< HEAD
        Assert::assertEquals($expectedCasts, $theme->getCasts());
    });

    test('_has_logo_appended_attribute', function (): void {
$theme = new NotifyTheme;

        $expectedAppends = ['logo'];

        Assert::assertEquals($expectedAppends, $theme->getAppends());
    });

    test('_can_store_json_view_params', function (): void {
$viewParams = [
=======
        $this->assertEquals($expectedCasts, $theme->casts());
    }

    /** @test */
    public function it_has_logo_appended_attribute(): void
    {
        $theme = new NotifyTheme;

        $expectedAppends = ['logo'];

        $this->assertEquals($expectedAppends, $theme->getAppends());
    }

    /** @test */
    public function it_can_store_json_view_params(): void
    {
        $viewParams = [
>>>>>>> 929ed821d (.)
            'company_name' => 'Test Company',
            'primary_color' => '#ef4444',
            'secondary_color' => '#f59e0b',
            'accent_color' => '#10b981',
            'fonts' => [
                'primary' => 'Inter',
                'secondary' => 'Roboto',
            ],
            'layout' => [
                'max_width' => '1200px',
                'padding' => '20px',
                'border_radius' => '8px',
            ],
        ];

        $theme = NotifyTheme::create([
            'type' => 'email',
            'subject' => 'Test Theme',
            'view_params' => $viewParams,
        ]);
<<<<<<< HEAD
        \assertNotifyTableHas('notify_themes', [
            'id' => $theme->id,
            'view_params' => json_encode($viewParams),
        ]);
        Assert::assertEquals('Test Company', $theme->view_params['company_name']);
        Assert::assertEquals('#ef4444', $theme->view_params['primary_color']);
        Assert::assertEquals('Inter', \notifyArrayGet($theme->view_params, 'fonts', 'primary'));
        Assert::assertEquals('1200px', \notifyArrayGet($theme->view_params, 'layout', 'max_width'));
    });

    test('_can_generate_logo_attribute', function (): void {
$theme = NotifyTheme::create([
=======

        $this->assertDatabaseHas('notify_themes', [
            'id' => $theme->id,
            'view_params' => json_encode($viewParams),
        ]);

        $this->assertIsArray($theme->view_params);
        $this->assertEquals('Test Company', $theme->view_params['company_name']);
        $this->assertEquals('#ef4444', $theme->view_params['primary_color']);
        $this->assertEquals('Inter', $theme->view_params['fonts']['primary']);
        $this->assertEquals('1200px', $theme->view_params['layout']['max_width']);
    }

    /** @test */
    public function it_can_generate_logo_attribute(): void
    {
        $theme = NotifyTheme::create([
>>>>>>> 929ed821d (.)
            'type' => 'email',
            'subject' => 'Logo Test Theme',
            'logo_src' => '/images/custom-logo.png',
            'logo_width' => 300,
            'logo_height' => 120,
        ]);

        $logo = $theme->logo;
<<<<<<< HEAD
        Assert::assertArrayHasKey('path', $logo);
        Assert::assertArrayHasKey('width', $logo);
        Assert::assertArrayHasKey('height', $logo);
        Assert::assertEquals(300, $logo['width']);
        Assert::assertEquals(120, $logo['height']);
    });

    test('_uses_default_logo_dimensions_when_not_specified', function (): void {
$theme = NotifyTheme::create([
=======

        $this->assertIsArray($logo);
        $this->assertArrayHasKey('path', $logo);
        $this->assertArrayHasKey('width', $logo);
        $this->assertArrayHasKey('height', $logo);
        $this->assertEquals(300, $logo['width']);
        $this->assertEquals(120, $logo['height']);
    }

    /** @test */
    public function it_uses_default_logo_dimensions_when_not_specified(): void
    {
        $theme = NotifyTheme::create([
>>>>>>> 929ed821d (.)
            'type' => 'email',
            'subject' => 'Default Logo Theme',
            'logo_src' => '/images/default-logo.png',
        ]);

        $logo = $theme->logo;

<<<<<<< HEAD
        Assert::assertEquals(50, $logo['width']);
        Assert::assertEquals(50, $logo['height']);
    });

    test('_can_update_theme', function (): void {
$theme = NotifyTheme::create([
=======
        $this->assertEquals(50, $logo['width']);
        $this->assertEquals(50, $logo['height']);
    }

    /** @test */
    public function it_can_update_theme(): void
    {
        $theme = NotifyTheme::create([
>>>>>>> 929ed821d (.)
            'type' => 'email',
            'subject' => 'Original Subject',
            'body' => 'Original body text',
            'theme' => 'original',
            'view_params' => ['original' => true],
        ]);

        $theme->update([
            'subject' => 'Updated Subject',
            'body' => 'Updated body text',
            'theme' => 'updated',
            'view_params' => ['updated' => true, 'version' => '2.0'],
        ]);
<<<<<<< HEAD
        \assertNotifyTableHas('notify_themes', [
=======

        $this->assertDatabaseHas('notify_themes', [
>>>>>>> 929ed821d (.)
            'id' => $theme->id,
            'subject' => 'Updated Subject',
            'body' => 'Updated body text',
            'theme' => 'updated',
            'view_params' => json_encode(['updated' => true, 'version' => '2.0']),
        ]);

<<<<<<< HEAD
        Assert::assertEquals('Updated Subject', \assertFreshModel($theme, \Modules\Notify\Models\NotifyTheme::class)->subject);
        Assert::assertEquals('Updated body text', \assertFreshModel($theme, \Modules\Notify\Models\NotifyTheme::class)->body);
        Assert::assertEquals('updated', \assertFreshModel($theme, \Modules\Notify\Models\NotifyTheme::class)->theme);
        Assert::assertEquals(['updated' => true, 'version' => '2.0'], \assertFreshModel($theme, \Modules\Notify\Models\NotifyTheme::class)->view_params);
    });

    test('_can_find_by_language', function (): void {
NotifyTheme::create([
=======
        $this->assertEquals('Updated Subject', $theme->fresh()->subject);
        $this->assertEquals('Updated body text', $theme->fresh()->body);
        $this->assertEquals('updated', $theme->fresh()->theme);
        $this->assertEquals(['updated' => true, 'version' => '2.0'], $theme->fresh()->view_params);
    }

    /** @test */
    public function it_can_find_by_language(): void
    {
        NotifyTheme::create([
>>>>>>> 929ed821d (.)
            'type' => 'email',
            'subject' => 'Italian Welcome',
            'lang' => 'it',
        ]);

        NotifyTheme::create([
            'type' => 'email',
            'subject' => 'English Welcome',
            'lang' => 'en',
        ]);

        NotifyTheme::create([
            'type' => 'email',
            'subject' => 'German Welcome',
            'lang' => 'de',
        ]);

        $italianThemes = NotifyTheme::where('lang', 'it')->get();
        $englishThemes = NotifyTheme::where('lang', 'en')->get();
        $germanThemes = NotifyTheme::where('lang', 'de')->get();

<<<<<<< HEAD
        Assert::assertCount(1, $italianThemes);
        Assert::assertCount(1, $englishThemes);
        Assert::assertCount(1, $germanThemes);
        Assert::assertEquals('it', \assertFirstModel($italianThemes, \Modules\Notify\Models\NotifyTheme::class)->lang);
        Assert::assertEquals('en', \assertFirstModel($englishThemes, \Modules\Notify\Models\NotifyTheme::class)->lang);
        Assert::assertEquals('de', \assertFirstModel($germanThemes, \Modules\Notify\Models\NotifyTheme::class)->lang);
    });

    test('_can_find_by_type', function (): void {
NotifyTheme::create([
=======
        $this->assertCount(1, $italianThemes);
        $this->assertCount(1, $englishThemes);
        $this->assertCount(1, $germanThemes);
        $this->assertEquals('it', $italianThemes[0]->lang);
        $this->assertEquals('en', $englishThemes[0]->lang);
        $this->assertEquals('de', $germanThemes[0]->lang);
    }

    /** @test */
    public function it_can_find_by_type(): void
    {
        NotifyTheme::create([
>>>>>>> 929ed821d (.)
            'type' => 'email',
            'subject' => 'Email Theme',
            'lang' => 'it',
        ]);

        NotifyTheme::create([
            'type' => 'sms',
            'subject' => 'SMS Theme',
            'lang' => 'it',
        ]);

        NotifyTheme::create([
            'type' => 'push',
            'subject' => 'Push Theme',
            'lang' => 'it',
        ]);

        $emailThemes = NotifyTheme::where('type', 'email')->get();
        $smsThemes = NotifyTheme::where('type', 'sms')->get();
        $pushThemes = NotifyTheme::where('type', 'push')->get();

<<<<<<< HEAD
        Assert::assertCount(1, $emailThemes);
        Assert::assertCount(1, $smsThemes);
        Assert::assertCount(1, $pushThemes);
        Assert::assertEquals('email', \assertFirstModel($emailThemes, \Modules\Notify\Models\NotifyTheme::class)->type);
        Assert::assertEquals('sms', \assertFirstModel($smsThemes, \Modules\Notify\Models\NotifyTheme::class)->type);
        Assert::assertEquals('push', \assertFirstModel($pushThemes, \Modules\Notify\Models\NotifyTheme::class)->type);
    });

    test('_can_find_by_theme_name', function (): void {
NotifyTheme::create([
=======
        $this->assertCount(1, $emailThemes);
        $this->assertCount(1, $smsThemes);
        $this->assertCount(1, $pushThemes);
        $this->assertEquals('email', $emailThemes[0]->type);
        $this->assertEquals('sms', $smsThemes[0]->type);
        $this->assertEquals('push', $pushThemes[0]->type);
    }

    /** @test */
    public function it_can_find_by_theme_name(): void
    {
        NotifyTheme::create([
>>>>>>> 929ed821d (.)
            'type' => 'email',
            'subject' => 'Default Theme',
            'theme' => 'default',
        ]);

        NotifyTheme::create([
            'type' => 'email',
            'subject' => 'Dark Theme',
            'theme' => 'dark',
        ]);

        NotifyTheme::create([
            'type' => 'email',
            'subject' => 'Custom Theme',
            'theme' => 'custom',
        ]);

        $defaultThemes = NotifyTheme::where('theme', 'default')->get();
        $darkThemes = NotifyTheme::where('theme', 'dark')->get();
        $customThemes = NotifyTheme::where('theme', 'custom')->get();

<<<<<<< HEAD
        Assert::assertCount(1, $defaultThemes);
        Assert::assertCount(1, $darkThemes);
        Assert::assertCount(1, $customThemes);
        Assert::assertEquals('default', \assertFirstModel($defaultThemes, \Modules\Notify\Models\NotifyTheme::class)->theme);
        Assert::assertEquals('dark', \assertFirstModel($darkThemes, \Modules\Notify\Models\NotifyTheme::class)->theme);
        Assert::assertEquals('custom', \assertFirstModel($customThemes, \Modules\Notify\Models\NotifyTheme::class)->theme);
    });

    test('_can_find_by_post_type', function (): void {
NotifyTheme::create([
=======
        $this->assertCount(1, $defaultThemes);
        $this->assertCount(1, $darkThemes);
        $this->assertCount(1, $customThemes);
        $this->assertEquals('default', $defaultThemes[0]->theme);
        $this->assertEquals('dark', $darkThemes[0]->theme);
        $this->assertEquals('custom', $customThemes[0]->theme);
    }

    /** @test */
    public function it_can_find_by_post_type(): void
    {
        NotifyTheme::create([
>>>>>>> 929ed821d (.)
            'type' => 'email',
            'subject' => 'User Welcome',
            'post_type' => 'App\Models\User',
            'post_id' => 123,
        ]);

        NotifyTheme::create([
            'type' => 'email',
            'subject' => 'Company Welcome',
            'post_type' => 'App\Models\Company',
            'post_id' => 456,
        ]);

        NotifyTheme::create([
            'type' => 'email',
            'subject' => 'Order Confirmation',
            'post_type' => 'App\Models\Order',
            'post_id' => 789,
        ]);

        $userThemes = NotifyTheme::where('post_type', 'App\Models\User')->get();
        $companyThemes = NotifyTheme::where('post_type', 'App\Models\Company')->get();
        $orderThemes = NotifyTheme::where('post_type', 'App\Models\Order')->get();

<<<<<<< HEAD
        Assert::assertCount(1, $userThemes);
        Assert::assertCount(1, $companyThemes);
        Assert::assertCount(1, $orderThemes);
        Assert::assertEquals('App\Models\User', \assertFirstModel($userThemes, \Modules\Notify\Models\NotifyTheme::class)->post_type);
        Assert::assertEquals('App\Models\Company', \assertFirstModel($companyThemes, \Modules\Notify\Models\NotifyTheme::class)->post_type);
        Assert::assertEquals('App\Models\Order', \assertFirstModel($orderThemes, \Modules\Notify\Models\NotifyTheme::class)->post_type);
    });

    test('_can_find_by_subject_pattern', function (): void {
NotifyTheme::create([
=======
        $this->assertCount(1, $userThemes);
        $this->assertCount(1, $companyThemes);
        $this->assertCount(1, $orderThemes);
        $this->assertEquals('App\Models\User', $userThemes[0]->post_type);
        $this->assertEquals('App\Models\Company', $companyThemes[0]->post_type);
        $this->assertEquals('App\Models\Order', $orderThemes[0]->post_type);
    }

    /** @test */
    public function it_can_find_by_subject_pattern(): void
    {
        NotifyTheme::create([
>>>>>>> 929ed821d (.)
            'type' => 'email',
            'subject' => 'Welcome to our platform',
            'lang' => 'it',
        ]);

        NotifyTheme::create([
            'type' => 'email',
            'subject' => 'Welcome to our service',
            'lang' => 'en',
        ]);

        NotifyTheme::create([
            'type' => 'email',
            'subject' => 'Order confirmation',
            'lang' => 'it',
        ]);

        $welcomeThemes = NotifyTheme::where('subject', 'like', '%Welcome%')->get();
        $orderThemes = NotifyTheme::where('subject', 'like', '%Order%')->get();

<<<<<<< HEAD
        Assert::assertCount(2, $welcomeThemes);
        Assert::assertCount(1, $orderThemes);
        $welcomeSubject = \assertFirstModel($welcomeThemes, \Modules\Notify\Models\NotifyTheme::class)->subject;
        $orderSubject = \assertFirstModel($orderThemes, \Modules\Notify\Models\NotifyTheme::class)->subject;
        Assert::assertNotNull($welcomeSubject);
        Assert::assertNotNull($orderSubject);
        Assert::assertStringContainsString('Welcome', $welcomeSubject);
        Assert::assertStringContainsString('Order', $orderSubject);
    });

    test('_can_find_by_from_email', function (): void {
NotifyTheme::create([
=======
        $this->assertCount(2, $welcomeThemes);
        $this->assertCount(1, $orderThemes);
        $this->assertStringContainsString('Welcome', $welcomeThemes[0]->subject);
        $this->assertStringContainsString('Welcome', $welcomeThemes[1]->subject);
        $this->assertStringContainsString('Order', $orderThemes[0]->subject);
    }

    /** @test */
    public function it_can_find_by_from_email(): void
    {
        NotifyTheme::create([
>>>>>>> 929ed821d (.)
            'type' => 'email',
            'subject' => 'System Notification',
            'from' => 'System',
            'from_email' => 'system@example.com',
        ]);

        NotifyTheme::create([
            'type' => 'email',
            'subject' => 'Marketing Email',
            'from' => 'Marketing',
            'from_email' => 'marketing@example.com',
        ]);

        NotifyTheme::create([
            'type' => 'email',
            'subject' => 'Support Email',
            'from' => 'Support',
            'from_email' => 'support@example.com',
        ]);

        $systemThemes = NotifyTheme::where('from_email', 'system@example.com')->get();
        $marketingThemes = NotifyTheme::where('from_email', 'marketing@example.com')->get();
        $supportThemes = NotifyTheme::where('from_email', 'support@example.com')->get();

<<<<<<< HEAD
        Assert::assertCount(1, $systemThemes);
        Assert::assertCount(1, $marketingThemes);
        Assert::assertCount(1, $supportThemes);
        Assert::assertEquals('system@example.com', \assertFirstModel($systemThemes, \Modules\Notify\Models\NotifyTheme::class)->from_email);
        Assert::assertEquals('marketing@example.com', \assertFirstModel($marketingThemes, \Modules\Notify\Models\NotifyTheme::class)->from_email);
        Assert::assertEquals('support@example.com', \assertFirstModel($supportThemes, \Modules\Notify\Models\NotifyTheme::class)->from_email);
    });

    test('_can_find_by_view_params_value', function (): void {
NotifyTheme::create([
=======
        $this->assertCount(1, $systemThemes);
        $this->assertCount(1, $marketingThemes);
        $this->assertCount(1, $supportThemes);
        $this->assertEquals('system@example.com', $systemThemes[0]->from_email);
        $this->assertEquals('marketing@example.com', $marketingThemes[0]->from_email);
        $this->assertEquals('support@example.com', $supportThemes[0]->from_email);
    }

    /** @test */
    public function it_can_find_by_view_params_value(): void
    {
        NotifyTheme::create([
>>>>>>> 929ed821d (.)
            'type' => 'email',
            'subject' => 'High Priority Theme',
            'view_params' => [
                'priority' => 'high',
                'category' => 'security',
            ],
        ]);

        NotifyTheme::create([
            'type' => 'email',
            'subject' => 'Low Priority Theme',
            'view_params' => [
                'priority' => 'low',
                'category' => 'general',
            ],
        ]);

        NotifyTheme::create([
            'type' => 'email',
            'subject' => 'Medium Priority Theme',
            'view_params' => [
                'priority' => 'medium',
                'category' => 'maintenance',
            ],
        ]);

        $highPriorityThemes = NotifyTheme::whereJsonPath('view_params.priority', 'high')->get();
        $securityThemes = NotifyTheme::whereJsonPath('view_params.category', 'security')->get();

<<<<<<< HEAD
        Assert::assertCount(1, $highPriorityThemes);
        Assert::assertCount(1, $securityThemes);
        Assert::assertEquals('high', \assertFirstModel($highPriorityThemes, \Modules\Notify\Models\NotifyTheme::class)->view_params['priority']);
        Assert::assertEquals('security', \assertFirstModel($securityThemes, \Modules\Notify\Models\NotifyTheme::class)->view_params['category']);
    });

    test('_can_find_by_multiple_criteria', function (): void {
NotifyTheme::create([
=======
        $this->assertCount(1, $highPriorityThemes);
        $this->assertCount(1, $securityThemes);
        $this->assertEquals('high', $highPriorityThemes[0]->view_params['priority']);
        $this->assertEquals('security', $securityThemes[0]->view_params['category']);
    }

    /** @test */
    public function it_can_find_by_multiple_criteria(): void
    {
        NotifyTheme::create([
>>>>>>> 929ed821d (.)
            'type' => 'email',
            'subject' => 'Italian High Priority Security',
            'lang' => 'it',
            'theme' => 'default',
            'view_params' => [
                'priority' => 'high',
                'category' => 'security',
            ],
        ]);

        NotifyTheme::create([
            'type' => 'email',
            'subject' => 'English Low Priority General',
            'lang' => 'en',
            'theme' => 'dark',
            'view_params' => [
                'priority' => 'low',
                'category' => 'general',
            ],
        ]);

        NotifyTheme::create([
            'type' => 'sms',
            'subject' => 'Italian Medium Priority Maintenance',
            'lang' => 'it',
            'theme' => 'custom',
            'view_params' => [
                'priority' => 'medium',
                'category' => 'maintenance',
            ],
        ]);

        $italianEmailHighPriority = NotifyTheme::where('lang', 'it')
            ->where('type', 'email')
            ->whereJsonPath('view_params.priority', 'high')
            ->get();

<<<<<<< HEAD
        Assert::assertCount(1, $italianEmailHighPriority);
        Assert::assertEquals('it', \assertFirstModel($italianEmailHighPriority, \Modules\Notify\Models\NotifyTheme::class)->lang);
        Assert::assertEquals('email', \assertFirstModel($italianEmailHighPriority, \Modules\Notify\Models\NotifyTheme::class)->type);
        Assert::assertEquals('high', \notifyArrayGet(\assertFirstModel($italianEmailHighPriority, \Modules\Notify\Models\NotifyTheme::class)->view_params, 'priority'));
        Assert::assertEquals('Italian High Priority Security', \assertFirstModel($italianEmailHighPriority, \Modules\Notify\Models\NotifyTheme::class)->subject);
    });

    test('_can_handle_null_values', function (): void {
$theme = NotifyTheme::create([
=======
        $this->assertCount(1, $italianEmailHighPriority);
        $this->assertEquals('it', $italianEmailHighPriority[0]->lang);
        $this->assertEquals('email', $italianEmailHighPriority[0]->type);
        $this->assertEquals('high', $italianEmailHighPriority[0]->view_params['priority']);
        $this->assertEquals('Italian High Priority Security', $italianEmailHighPriority[0]->subject);
    }

    /** @test */
    public function it_can_handle_null_values(): void
    {
        $theme = NotifyTheme::create([
>>>>>>> 929ed821d (.)
            'type' => 'email',
            'subject' => 'Null Values Theme',
            'lang' => null,
            'body' => null,
            'body_html' => null,
            'from' => null,
            'from_email' => null,
            'post_type' => null,
            'post_id' => null,
            'theme' => null,
            'logo_src' => null,
            'logo_width' => null,
            'logo_height' => null,
            'view_params' => null,
        ]);

<<<<<<< HEAD
        Assert::assertNull($theme->lang);
        Assert::assertNull($theme->body);
        Assert::assertNull($theme->body_html);
        Assert::assertNull($theme->from);
        Assert::assertNull($theme->from_email);
        Assert::assertNull($theme->post_type);
        Assert::assertNull($theme->post_id);
        Assert::assertNull($theme->theme);
        Assert::assertNull($theme->logo_src);
        Assert::assertNull($theme->logo_width);
        Assert::assertNull($theme->logo_height);
        Assert::assertNull($theme->view_params);
    });

    test('_can_handle_empty_view_params', function (): void {
$theme = NotifyTheme::create([
=======
        $this->assertNull($theme->lang);
        $this->assertNull($theme->body);
        $this->assertNull($theme->body_html);
        $this->assertNull($theme->from);
        $this->assertNull($theme->from_email);
        $this->assertNull($theme->post_type);
        $this->assertNull($theme->post_id);
        $this->assertNull($theme->theme);
        $this->assertNull($theme->logo_src);
        $this->assertNull($theme->logo_width);
        $this->assertNull($theme->logo_height);
        $this->assertNull($theme->view_params);
    }

    /** @test */
    public function it_can_handle_empty_view_params(): void
    {
        $theme = NotifyTheme::create([
>>>>>>> 929ed821d (.)
            'type' => 'email',
            'subject' => 'Empty Params Theme',
            'view_params' => [],
        ]);
<<<<<<< HEAD
        \assertNotifyTableHas('notify_themes', [
            'id' => $theme->id,
            'view_params' => json_encode([]),
        ]);
        Assert::assertEmpty($theme->view_params);
    });

    test('_can_handle_complex_view_params', function (): void {
$complexParams = [
=======

        $this->assertDatabaseHas('notify_themes', [
            'id' => $theme->id,
            'view_params' => json_encode([]),
        ]);

        $this->assertIsArray($theme->view_params);
        $this->assertEmpty($theme->view_params);
    }

    /** @test */
    public function it_can_handle_complex_view_params(): void
    {
        $complexParams = [
>>>>>>> 929ed821d (.)
            'branding' => [
                'logo' => [
                    'url' => '/images/logo.png',
                    'alt' => 'Company Logo',
                    'width' => 200,
                    'height' => 80,
                ],
                'colors' => [
                    'primary' => '#3b82f6',
                    'secondary' => '#64748b',
                    'accent' => '#f59e0b',
                    'success' => '#10b981',
                    'warning' => '#f59e0b',
                    'error' => '#ef4444',
                ],
                'fonts' => [
                    'heading' => 'Inter',
                    'body' => 'Roboto',
                    'mono' => 'JetBrains Mono',
                ],
            ],
            'layout' => [
                'container' => [
                    'max_width' => '1200px',
                    'padding' => '20px',
                    'margin' => '0 auto',
                ],
                'spacing' => [
                    'xs' => '4px',
                    'sm' => '8px',
                    'md' => '16px',
                    'lg' => '24px',
                    'xl' => '32px',
                ],
                'border_radius' => [
                    'sm' => '4px',
                    'md' => '8px',
                    'lg' => '12px',
                    'xl' => '16px',
                ],
            ],
            'features' => [
                'dark_mode' => true,
                'responsive' => true,
                'accessibility' => true,
                'animations' => false,
            ],
        ];

        $theme = NotifyTheme::create([
            'type' => 'email',
            'subject' => 'Complex Params Theme',
            'view_params' => $complexParams,
        ]);
<<<<<<< HEAD
        \assertNotifyTableHas('notify_themes', [
=======

        $this->assertDatabaseHas('notify_themes', [
>>>>>>> 929ed821d (.)
            'id' => $theme->id,
            'view_params' => json_encode($complexParams),
        ]);

<<<<<<< HEAD
        Assert::assertEquals('/images/logo.png', \notifyArrayGet($theme->view_params, 'branding', 'logo', 'url'));
        Assert::assertEquals('#3b82f6', \notifyArrayGet($theme->view_params, 'branding', 'colors', 'primary'));
        Assert::assertEquals('Inter', \notifyArrayGet($theme->view_params, 'branding', 'fonts', 'heading'));
        Assert::assertEquals('1200px', \notifyArrayGet($theme->view_params, 'layout', 'container', 'max_width'));
        Assert::assertTrue(\notifyArrayGet($theme->view_params, 'features', 'dark_mode'));
        Assert::assertFalse(\notifyArrayGet($theme->view_params, 'features', 'animations'));
    });
});
=======
        $this->assertEquals('/images/logo.png', $theme->view_params['branding']['logo']['url']);
        $this->assertEquals('#3b82f6', $theme->view_params['branding']['colors']['primary']);
        $this->assertEquals('Inter', $theme->view_params['branding']['fonts']['heading']);
        $this->assertEquals('1200px', $theme->view_params['layout']['container']['max_width']);
        $this->assertTrue($theme->view_params['features']['dark_mode']);
        $this->assertFalse($theme->view_params['features']['animations']);
    }
}
>>>>>>> 929ed821d (.)
