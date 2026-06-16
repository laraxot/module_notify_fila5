<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Models;

<<<<<<< HEAD
use function Safe\json_encode;
use PHPUnit\Framework\Assert;
use Modules\Notify\Models\MailTemplate;
use Modules\Notify\Tests\TestCase;
use Modules\Notify\Database\Factories\MailTemplateFactory;
use function Pest\Laravel\get;

uses(\Modules\Notify\Tests\TestCase::class);

beforeEach(function (): void {
    /** @var \Modules\Notify\Tests\TestCase $this */
$this->disableExceptionHandling();
});

describe('Mail Template', function (): void {
    test('_can_create_mail_template', function (): void {
        /** @var \Modules\Notify\Tests\TestCase $this */
$template = MailTemplateFactory::new()->createOne([
=======
use Modules\Notify\Models\MailTemplate;
use Modules\Notify\Tests\TestCase;

class MailTemplateTest extends TestCase
{
    // DatabaseTransactions is already used in the module TestCase

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutExceptionHandling();
    }

    /** @test */
    public function it_can_create_mail_template(): void
    {
        $template = MailTemplate::create([
>>>>>>> 929ed821d (.)
            'mailable' => 'App\Mail\WelcomeMail',
            'name' => 'Welcome Email Template',
            'subject' => 'Benvenuto {{name}}!',
            'html_template' => '<h1>Benvenuto {{name}}!</h1><p>Grazie per esserti registrato.</p>',
            'text_template' => 'Benvenuto {{name}}! Grazie per esserti registrato.',
            'sms_template' => [
                'message' => 'Benvenuto {{name}}! Grazie per esserti registrato.',
                'variables' => ['name'],
            ],
            'params' => ['name', 'email'],
            'counter' => 0,
        ]);
<<<<<<< HEAD
        \assertNotifyTableHas('mail_templates', [
=======

        $this->assertDatabaseHas('mail_templates', [
>>>>>>> 929ed821d (.)
            'id' => $template->id,
            'mailable' => 'App\Mail\WelcomeMail',
            'name' => 'Welcome Email Template',
            'subject' => 'Benvenuto {{name}}!',
            'html_template' => '<h1>Benvenuto {{name}}!</h1><p>Grazie per esserti registrato.</p>',
            'text_template' => 'Benvenuto {{name}}! Grazie per esserti registrato.',
            'params' => json_encode(['name', 'email']),
            'counter' => 0,
        ]);

<<<<<<< HEAD
        Assert::assertInstanceOf(MailTemplate::class, $template);
    });

    test('_has_correct_fillable_fields', function (): void {
$template = new MailTemplate;
=======
        $this->assertInstanceOf(MailTemplate::class, $template);
    }

    /** @test */
    public function it_has_correct_fillable_fields(): void
    {
        $template = new MailTemplate;
>>>>>>> 929ed821d (.)

        $expectedFillable = [
            'mailable',
            'name',
            'slug',
            'subject',
            'html_template',
            'text_template',
            'sms_template',
            'params',
            'counter',
        ];

<<<<<<< HEAD
        Assert::assertEquals($expectedFillable, $template->getFillable());
    });

    test('_has_correct_casts', function (): void {
$template = new MailTemplate;
=======
        $this->assertEquals($expectedFillable, $template->getFillable());
    }

    /** @test */
    public function it_has_correct_casts(): void
    {
        $template = new MailTemplate;
>>>>>>> 929ed821d (.)

        $expectedCasts = [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];

<<<<<<< HEAD
        Assert::assertEquals($expectedCasts, $template->getCasts());
    });

    test('_has_translatable_fields', function (): void {
$template = new MailTemplate;
=======
        $this->assertEquals($expectedCasts, $template->casts());
    }

    /** @test */
    public function it_has_translatable_fields(): void
    {
        $template = new MailTemplate;
>>>>>>> 929ed821d (.)

        $expectedTranslatable = [
            'subject',
            'html_template',
            'text_template',
            'sms_template',
        ];

<<<<<<< HEAD
        Assert::assertEquals($expectedTranslatable, $template->translatable);
    });

    test('_uses_notify_connection', function (): void {
$template = new MailTemplate;

        Assert::assertEquals('notify', $template->getConnectionName());
    });

    test('_generates_slug_from_name', function (): void {
$template = MailTemplateFactory::new()->createOne([
=======
        $this->assertEquals($expectedTranslatable, $template->translatable);
    }

    /** @test */
    public function it_uses_notify_connection(): void
    {
        $template = new MailTemplate;

        $this->assertEquals('notify', $template->getConnectionName());
    }

    /** @test */
    public function it_generates_slug_from_name(): void
    {
        $template = MailTemplate::create([
>>>>>>> 929ed821d (.)
            'mailable' => 'App\Mail\TestMail',
            'name' => 'Test Email Template',
            'subject' => 'Test Subject',
            'html_template' => '<p>Test content</p>',
            'params' => ['test'],
            'counter' => 0,
        ]);

<<<<<<< HEAD
        Assert::assertEquals('test-email-template', $template->slug);
        \assertNotifyTableHas('mail_templates', [
            'id' => $template->id,
            'slug' => 'test-email-template',
        ]);
    });

    test('_can_store_json_params', function (): void {
$params = ['name', 'email', 'company', 'role'];

        $template = MailTemplateFactory::new()->createOne([
=======
        $this->assertEquals('test-email-template', $template->slug);
        $this->assertDatabaseHas('mail_templates', [
            'id' => $template->id,
            'slug' => 'test-email-template',
        ]);
    }

    /** @test */
    public function it_can_store_json_params(): void
    {
        $params = ['name', 'email', 'company', 'role'];

        $template = MailTemplate::create([
>>>>>>> 929ed821d (.)
            'mailable' => 'App\Mail\ComplexMail',
            'name' => 'Complex Email Template',
            'subject' => 'Test Subject',
            'html_template' => '<p>Test content</p>',
            'params' => $params,
            'counter' => 0,
        ]);
<<<<<<< HEAD
        \assertNotifyTableHas('mail_templates', [
            'id' => $template->id,
            'params' => json_encode($params),
        ]);
        $params = \assertNotifyArray($template->params);
        Assert::assertCount(4, $params);
        Assert::assertContains('name', $params);
        Assert::assertContains('email', $params);
        Assert::assertContains('company', $params);
        Assert::assertContains('role', $params);
    });

    test('_can_store_json_sms_template', function (): void {
$smsTemplate = [
=======

        $this->assertDatabaseHas('mail_templates', [
            'id' => $template->id,
            'params' => json_encode($params),
        ]);

        $this->assertIsArray($template->params);
        $this->assertCount(4, $template->params);
        $this->assertContains('name', $template->params);
        $this->assertContains('email', $template->params);
        $this->assertContains('company', $template->params);
        $this->assertContains('role', $template->params);
    }

    /** @test */
    public function it_can_store_json_sms_template(): void
    {
        $smsTemplate = [
>>>>>>> 929ed821d (.)
            'message' => 'Benvenuto {{name}}! La tua email è {{email}}',
            'variables' => ['name', 'email'],
            'max_length' => 160,
            'encoding' => 'GSM7',
        ];

<<<<<<< HEAD
        $template = MailTemplateFactory::new()->createOne([
=======
        $template = MailTemplate::create([
>>>>>>> 929ed821d (.)
            'mailable' => 'App\Mail\SmsMail',
            'name' => 'SMS Email Template',
            'subject' => 'Test Subject',
            'html_template' => '<p>Test content</p>',
            'sms_template' => $smsTemplate,
            'params' => ['test'],
            'counter' => 0,
        ]);
<<<<<<< HEAD
        \assertNotifyTableHas('mail_templates', [
            'id' => $template->id,
            'sms_template' => json_encode($smsTemplate),
        ]);
        $smsTemplateData = \assertNotifyArray($template->sms_template);
        Assert::assertEquals('Benvenuto {{name}}! La tua email è {{email}}', $smsTemplateData['message']);
        Assert::assertEquals(['name', 'email'], $smsTemplateData['variables']);
        Assert::assertEquals(160, $smsTemplateData['max_length']);
        Assert::assertEquals('GSM7', $smsTemplateData['encoding']);
    });

    test('_can_increment_counter', function (): void {
$template = MailTemplateFactory::new()->createOne([
=======

        $this->assertDatabaseHas('mail_templates', [
            'id' => $template->id,
            'sms_template' => json_encode($smsTemplate),
        ]);

        $this->assertIsArray($template->sms_template);
        $this->assertEquals('Benvenuto {{name}}! La tua email è {{email}}', $template->sms_template['message']);
        $this->assertEquals(['name', 'email'], $template->sms_template['variables']);
        $this->assertEquals(160, $template->sms_template['max_length']);
        $this->assertEquals('GSM7', $template->sms_template['encoding']);
    }

    /** @test */
    public function it_can_increment_counter(): void
    {
        $template = MailTemplate::create([
>>>>>>> 929ed821d (.)
            'mailable' => 'App\Mail\CounterMail',
            'name' => 'Counter Email Template',
            'subject' => 'Test Subject',
            'html_template' => '<p>Test content</p>',
            'params' => ['test'],
            'counter' => 0,
        ]);

<<<<<<< HEAD
        Assert::assertEquals(0, $template->counter);

        $template->increment('counter');
        Assert::assertEquals(1, \assertFreshModel($template, \Modules\Notify\Models\MailTemplate::class)->counter);

        $template->increment('counter', 5);
        Assert::assertEquals(6, \assertFreshModel($template, \Modules\Notify\Models\MailTemplate::class)->counter);
    });

    test('_can_update_template', function (): void {
$template = MailTemplateFactory::new()->createOne([
=======
        $this->assertEquals(0, $template->counter);

        $template->increment('counter');
        $this->assertEquals(1, $template->fresh()->counter);

        $template->increment('counter', 5);
        $this->assertEquals(6, $template->fresh()->counter);
    }

    /** @test */
    public function it_can_update_template(): void
    {
        $template = MailTemplate::create([
>>>>>>> 929ed821d (.)
            'mailable' => 'App\Mail\UpdateMail',
            'name' => 'Original Name',
            'subject' => 'Original Subject',
            'html_template' => '<p>Original content</p>',
            'params' => ['original'],
            'counter' => 0,
        ]);

        $template->update([
            'name' => 'Updated Name',
            'subject' => 'Updated Subject',
            'html_template' => '<p>Updated content</p>',
            'params' => ['updated'],
        ]);
<<<<<<< HEAD
        \assertNotifyTableHas('mail_templates', [
=======

        $this->assertDatabaseHas('mail_templates', [
>>>>>>> 929ed821d (.)
            'id' => $template->id,
            'name' => 'Updated Name',
            'subject' => 'Updated Subject',
            'html_template' => '<p>Updated content</p>',
            'params' => json_encode(['updated']),
        ]);

<<<<<<< HEAD
        Assert::assertEquals('updated-name', \assertFreshModel($template, \Modules\Notify\Models\MailTemplate::class)->slug);
    });

    test('_can_find_by_mailable_and_slug', function (): void {
$template = MailTemplateFactory::new()->createOne([
=======
        $this->assertEquals('updated-name', $template->fresh()->slug);
    }

    /** @test */
    public function it_can_find_by_mailable_and_slug(): void
    {
        $template = MailTemplate::create([
>>>>>>> 929ed821d (.)
            'mailable' => 'App\Mail\FindMail',
            'name' => 'Find Test Template',
            'subject' => 'Test Subject',
            'html_template' => '<p>Test content</p>',
            'params' => ['test'],
            'counter' => 0,
        ]);

        $foundTemplate = MailTemplate::where('mailable', 'App\Mail\FindMail')
            ->where('slug', 'find-test-template')
            ->first();

<<<<<<< HEAD
        Assert::assertNotNull($foundTemplate);
        Assert::assertEquals($template->id, $foundTemplate->id);
        Assert::assertEquals('App\Mail\FindMail', $foundTemplate->mailable);
        Assert::assertEquals('find-test-template', $foundTemplate->slug);
    });

    test('_can_find_by_name', function (): void {
$template = MailTemplateFactory::new()->createOne([
=======
        $this->assertNotNull($foundTemplate);
        $this->assertEquals($template->id, $foundTemplate->id);
        $this->assertEquals('App\Mail\FindMail', $foundTemplate->mailable);
        $this->assertEquals('find-test-template', $foundTemplate->slug);
    }

    /** @test */
    public function it_can_find_by_name(): void
    {
        $template = MailTemplate::create([
>>>>>>> 929ed821d (.)
            'mailable' => 'App\Mail\NameMail',
            'name' => 'Name Search Template',
            'subject' => 'Test Subject',
            'html_template' => '<p>Test content</p>',
            'params' => ['test'],
            'counter' => 0,
        ]);

        $foundTemplate = MailTemplate::where('name', 'Name Search Template')->first();

<<<<<<< HEAD
        Assert::assertNotNull($foundTemplate);
        Assert::assertEquals($template->id, $foundTemplate->id);
        Assert::assertEquals('Name Search Template', $foundTemplate->name);
    });

    test('_can_find_by_subject_pattern', function (): void {
$template = MailTemplateFactory::new()->createOne([
=======
        $this->assertNotNull($foundTemplate);
        $this->assertEquals($template->id, $foundTemplate->id);
        $this->assertEquals('Name Search Template', $foundTemplate->name);
    }

    /** @test */
    public function it_can_find_by_subject_pattern(): void
    {
        $template = MailTemplate::create([
>>>>>>> 929ed821d (.)
            'mailable' => 'App\Mail\PatternMail',
            'name' => 'Pattern Template',
            'subject' => 'Welcome to our platform',
            'html_template' => '<p>Test content</p>',
            'params' => ['test'],
            'counter' => 0,
        ]);

        $foundTemplates = MailTemplate::where('subject', 'like', '%Welcome%')->get();

<<<<<<< HEAD
        Assert::assertCount(1, $foundTemplates);
        Assert::assertEquals('Welcome to our platform', \assertFirstModel($foundTemplates, \Modules\Notify\Models\MailTemplate::class)->subject);
    });

    test('_can_find_by_params', function (): void {
$template = MailTemplateFactory::new()->createOne([
=======
        $this->assertCount(1, $foundTemplates);
        $this->assertEquals('Welcome to our platform', $foundTemplates[0]->subject);
    }

    /** @test */
    public function it_can_find_by_params(): void
    {
        $template = MailTemplate::create([
>>>>>>> 929ed821d (.)
            'mailable' => 'App\Mail\ParamsMail',
            'name' => 'Params Template',
            'subject' => 'Test Subject',
            'html_template' => '<p>Test content</p>',
            'params' => ['name', 'email', 'company'],
            'counter' => 0,
        ]);

        $foundTemplates = MailTemplate::whereJsonContains('params', 'name')->get();

<<<<<<< HEAD
        Assert::assertCount(1, $foundTemplates);
        Assert::assertEquals($template->id, \assertFirstModel($foundTemplates, \Modules\Notify\Models\MailTemplate::class)->id);
        Assert::assertContains('name', \assertNotifyArray(\assertFirstModel($foundTemplates, \Modules\Notify\Models\MailTemplate::class)->params));
    });

    test('_can_find_by_counter_range', function (): void {
MailTemplateFactory::new()->createOne([
=======
        $this->assertCount(1, $foundTemplates);
        $this->assertEquals($template->id, $foundTemplates[0]->id);
        $this->assertContains('name', $foundTemplates[0]->params);
    }

    /** @test */
    public function it_can_find_by_counter_range(): void
    {
        MailTemplate::create([
>>>>>>> 929ed821d (.)
            'mailable' => 'App\Mail\LowCounterMail',
            'name' => 'Low Counter Template',
            'subject' => 'Test Subject',
            'html_template' => '<p>Test content</p>',
            'params' => ['test'],
            'counter' => 5,
        ]);

<<<<<<< HEAD
        MailTemplateFactory::new()->createOne([
=======
        MailTemplate::create([
>>>>>>> 929ed821d (.)
            'mailable' => 'App\Mail\HighCounterMail',
            'name' => 'High Counter Template',
            'subject' => 'Test Subject',
            'html_template' => '<p>Test content</p>',
            'params' => ['test'],
            'counter' => 50,
        ]);

        $lowCounterTemplates = MailTemplate::where('counter', '<=', 10)->get();
        $highCounterTemplates = MailTemplate::where('counter', '>=', 25)->get();

<<<<<<< HEAD
        Assert::assertCount(1, $lowCounterTemplates);
        Assert::assertCount(1, $highCounterTemplates);
        Assert::assertEquals(5, \assertFirstModel($lowCounterTemplates, \Modules\Notify\Models\MailTemplate::class)->counter);
        Assert::assertEquals(50, \assertFirstModel($highCounterTemplates, \Modules\Notify\Models\MailTemplate::class)->counter);
    });

    test('_can_handle_empty_params', function (): void {
$template = MailTemplateFactory::new()->createOne([
=======
        $this->assertCount(1, $lowCounterTemplates);
        $this->assertCount(1, $highCounterTemplates);
        $this->assertEquals(5, $lowCounterTemplates[0]->counter);
        $this->assertEquals(50, $highCounterTemplates[0]->counter);
    }

    /** @test */
    public function it_can_handle_empty_params(): void
    {
        $template = MailTemplate::create([
>>>>>>> 929ed821d (.)
            'mailable' => 'App\Mail\EmptyParamsMail',
            'name' => 'Empty Params Template',
            'subject' => 'Test Subject',
            'html_template' => '<p>Test content</p>',
            'params' => [],
            'counter' => 0,
        ]);
<<<<<<< HEAD
        Assert::assertEmpty($template->params);
    });

    test('_can_handle_empty_sms_template', function (): void {
$template = MailTemplateFactory::new()->createOne([
=======

        $this->assertIsArray($template->params);
        $this->assertEmpty($template->params);
    }

    /** @test */
    public function it_can_handle_empty_sms_template(): void
    {
        $template = MailTemplate::create([
>>>>>>> 929ed821d (.)
            'mailable' => 'App\Mail\EmptySmsMail',
            'name' => 'Empty SMS Template',
            'subject' => 'Test Subject',
            'html_template' => '<p>Test content</p>',
            'sms_template' => [],
            'params' => ['test'],
            'counter' => 0,
        ]);
<<<<<<< HEAD
        Assert::assertEmpty($template->sms_template);
    });

    test('_can_store_complex_sms_template', function (): void {
$complexSmsTemplate = [
=======

        $this->assertIsArray($template->sms_template);
        $this->assertEmpty($template->sms_template);
    }

    /** @test */
    public function it_can_store_complex_sms_template(): void
    {
        $complexSmsTemplate = [
>>>>>>> 929ed821d (.)
            'message' => 'Benvenuto {{name}}!',
            'variables' => ['name', 'email'],
            'max_length' => 160,
            'encoding' => 'GSM7',
            'fallback' => [
                'enabled' => true,
                'message' => 'Welcome {{name}}!',
                'language' => 'en',
            ],
            'delivery_options' => [
                'priority' => 'high',
                'retry_count' => 3,
                'timeout' => 30,
            ],
        ];

<<<<<<< HEAD
        $template = MailTemplateFactory::new()->createOne([
=======
        $template = MailTemplate::create([
>>>>>>> 929ed821d (.)
            'mailable' => 'App\Mail\ComplexSmsMail',
            'name' => 'Complex SMS Template',
            'subject' => 'Test Subject',
            'html_template' => '<p>Test content</p>',
            'sms_template' => $complexSmsTemplate,
            'params' => ['test'],
            'counter' => 0,
        ]);
<<<<<<< HEAD
        \assertNotifyTableHas('mail_templates', [
=======

        $this->assertDatabaseHas('mail_templates', [
>>>>>>> 929ed821d (.)
            'id' => $template->id,
            'sms_template' => json_encode($complexSmsTemplate),
        ]);

<<<<<<< HEAD
        $smsData = \assertNotifyArray($template->sms_template);
        Assert::assertEquals('Benvenuto {{name}}!', $smsData['message']);
        Assert::assertEquals(['name', 'email'], $smsData['variables']);
        Assert::assertEquals(160, $smsData['max_length']);
        Assert::assertTrue(\notifyArrayGet($smsData, 'fallback', 'enabled'));
        Assert::assertEquals('high', \notifyArrayGet($smsData, 'delivery_options', 'priority'));
    });

    test('_can_find_templates_by_multiple_criteria', function (): void {
MailTemplateFactory::new()->createOne([
=======
        $this->assertEquals('Benvenuto {{name}}!', $template->sms_template['message']);
        $this->assertEquals(['name', 'email'], $template->sms_template['variables']);
        $this->assertEquals(160, $template->sms_template['max_length']);
        $this->assertTrue($template->sms_template['fallback']['enabled']);
        $this->assertEquals('high', $template->sms_template['delivery_options']['priority']);
    }

    /** @test */
    public function it_can_find_templates_by_multiple_criteria(): void
    {
        MailTemplate::create([
>>>>>>> 929ed821d (.)
            'mailable' => 'App\Mail\MultiCriteriaMail',
            'name' => 'Multi Criteria Template',
            'subject' => 'Welcome to our platform',
            'html_template' => '<p>Test content</p>',
            'params' => ['name', 'email'],
            'counter' => 10,
        ]);

<<<<<<< HEAD
        MailTemplateFactory::new()->createOne([
=======
        MailTemplate::create([
>>>>>>> 929ed821d (.)
            'mailable' => 'App\Mail\AnotherMultiCriteriaMail',
            'name' => 'Another Multi Criteria Template',
            'subject' => 'Welcome to our platform',
            'html_template' => '<p>Test content</p>',
            'params' => ['name', 'email'],
            'counter' => 20,
        ]);

        $foundTemplates = MailTemplate::where('subject', 'like', '%Welcome%')
            ->whereJsonContains('params', 'name')
            ->where('counter', '>=', 15)
            ->get();

<<<<<<< HEAD
        Assert::assertCount(1, $foundTemplates);
        Assert::assertEquals('Another Multi Criteria Template', \assertFirstModel($foundTemplates, \Modules\Notify\Models\MailTemplate::class)->name);
        Assert::assertEquals(20, \assertFirstModel($foundTemplates, \Modules\Notify\Models\MailTemplate::class)->counter);
    });

    test('_can_handle_null_values', function (): void {
$template = MailTemplateFactory::new()->createOne([
=======
        $this->assertCount(1, $foundTemplates);
        $this->assertEquals('Another Multi Criteria Template', $foundTemplates[0]->name);
        $this->assertEquals(20, $foundTemplates[0]->counter);
    }

    /** @test */
    public function it_can_handle_null_values(): void
    {
        $template = MailTemplate::create([
>>>>>>> 929ed821d (.)
            'mailable' => 'App\Mail\NullValuesMail',
            'name' => 'Null Values Template',
            'subject' => null,
            'html_template' => '<p>Test content</p>',
            'text_template' => null,
            'sms_template' => null,
            'params' => null,
            'counter' => 0,
        ]);

<<<<<<< HEAD
        Assert::assertNull($template->subject);
        Assert::assertNull($template->text_template);
        Assert::assertNull($template->sms_template);
        Assert::assertNull($template->params);
    });

    test('_can_generate_unique_slugs', function (): void {
MailTemplateFactory::new()->createOne([
=======
        $this->assertNull($template->subject);
        $this->assertNull($template->text_template);
        $this->assertNull($template->sms_template);
        $this->assertNull($template->params);
    }

    /** @test */
    public function it_can_generate_unique_slugs(): void
    {
        MailTemplate::create([
>>>>>>> 929ed821d (.)
            'mailable' => 'App\Mail\UniqueSlugMail1',
            'name' => 'Test Template',
            'subject' => 'Test Subject',
            'html_template' => '<p>Test content</p>',
            'params' => ['test'],
            'counter' => 0,
        ]);

<<<<<<< HEAD
        MailTemplateFactory::new()->createOne([
=======
        MailTemplate::create([
>>>>>>> 929ed821d (.)
            'mailable' => 'App\Mail\UniqueSlugMail2',
            'name' => 'Test Template',
            'subject' => 'Test Subject',
            'html_template' => '<p>Test content</p>',
            'params' => ['test'],
            'counter' => 0,
        ]);

        $templates = MailTemplate::where('name', 'Test Template')->get();

<<<<<<< HEAD
        Assert::assertCount(2, $templates);
        Assert::assertEquals('test-template', \assertFirstModel($templates, \Modules\Notify\Models\MailTemplate::class)->slug);
        Assert::assertEquals('test-template-1', \assertFirstModel($templates->slice(1), \Modules\Notify\Models\MailTemplate::class)->slug);
    });
});
=======
        $this->assertCount(2, $templates);
        $this->assertEquals('test-template', $templates[0]->slug);
        $this->assertEquals('test-template-1', $templates[1]->slug);
    }
}
>>>>>>> 929ed821d (.)
