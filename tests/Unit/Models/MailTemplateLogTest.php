<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Models;

<<<<<<< HEAD
use function Safe\json_encode;
use PHPUnit\Framework\Assert;
use Modules\Notify\Models\MailTemplateLog;
use Modules\Notify\Tests\TestCase;
use function Pest\Laravel\get;

uses(\Modules\Notify\Tests\TestCase::class);

beforeEach(function (): void {
    /** @var \Modules\Notify\Tests\TestCase $this */
$this->disableExceptionHandling();
});

describe('Mail Template Log', function (): void {
    test('_can_create_mail_template_log', function (): void {
        /** @var \Modules\Notify\Tests\TestCase $this */
$log = MailTemplateLog::create([
=======
use Modules\Notify\Models\MailTemplateLog;
use Modules\Notify\Tests\TestCase;

class MailTemplateLogTest extends TestCase
{
    // DatabaseTransactions is already used in the module TestCase

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutExceptionHandling();
    }

    /** @test */
    public function it_can_create_mail_template_log(): void
    {
        $log = MailTemplateLog::create([
>>>>>>> 929ed821d (.)
            'template_id' => 123,
            'mailable_type' => 'App\Mail\WelcomeMail',
            'mailable_id' => 456,
            'status' => 'sent',
            'status_message' => 'Email sent successfully',
            'data' => [
                'to' => 'user@example.com',
                'subject' => 'Welcome to our platform',
                'template' => 'welcome_email',
            ],
            'metadata' => [
                'provider' => 'smtp',
                'queue_id' => 'queue_789',
                'attempts' => 1,
            ],
            'sent_at' => now(),
            'delivered_at' => now()->addMinutes(1),
        ]);
<<<<<<< HEAD
        \assertNotifyTableHas('mail_template_logs', [
=======

        $this->assertDatabaseHas('mail_template_logs', [
>>>>>>> 929ed821d (.)
            'id' => $log->id,
            'template_id' => 123,
            'mailable_type' => 'App\Mail\WelcomeMail',
            'mailable_id' => 456,
            'status' => 'sent',
            'status_message' => 'Email sent successfully',
        ]);

<<<<<<< HEAD
        Assert::assertInstanceOf(MailTemplateLog::class, $log);
    });

    test('_has_correct_fillable_fields', function (): void {
$log = new MailTemplateLog;
=======
        $this->assertInstanceOf(MailTemplateLog::class, $log);
    }

    /** @test */
    public function it_has_correct_fillable_fields(): void
    {
        $log = new MailTemplateLog;
>>>>>>> 929ed821d (.)

        $expectedFillable = [
            'template_id',
            'mailable_type',
            'mailable_id',
            'status',
            'status_message',
            'data',
            'metadata',
            'sent_at',
            'delivered_at',
            'failed_at',
            'opened_at',
            'clicked_at',
        ];

<<<<<<< HEAD
        Assert::assertEquals($expectedFillable, $log->getFillable());
    });

    test('_has_correct_casts', function (): void {
$log = new MailTemplateLog;
=======
        $this->assertEquals($expectedFillable, $log->getFillable());
    }

    /** @test */
    public function it_has_correct_casts(): void
    {
        $log = new MailTemplateLog;
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
            'data' => 'array',
            'metadata' => 'array',
            'sent_at' => 'datetime',
            'delivered_at' => 'datetime',
            'failed_at' => 'datetime',
            'opened_at' => 'datetime',
            'clicked_at' => 'datetime',
        ];

<<<<<<< HEAD
        Assert::assertEquals($expectedCasts, $log->getCasts());
    });

    test('_can_store_json_data', function (): void {
$data = [
=======
        $this->assertEquals($expectedCasts, $log->casts());
    }

    /** @test */
    public function it_can_store_json_data(): void
    {
        $data = [
>>>>>>> 929ed821d (.)
            'to' => 'user@example.com',
            'cc' => ['cc1@example.com', 'cc2@example.com'],
            'bcc' => ['bcc@example.com'],
            'subject' => 'Test Email Subject',
            'body' => 'Test email body content',
            'template' => 'test_template',
            'variables' => [
                'name' => 'John Doe',
                'company' => 'Example Corp',
                'activation_link' => 'https://example.com/activate',
            ],
        ];

        $log = MailTemplateLog::create([
            'template_id' => 123,
            'mailable_type' => 'App\Mail\TestMail',
            'mailable_id' => 456,
            'status' => 'sent',
            'data' => $data,
        ]);
<<<<<<< HEAD
        \assertNotifyTableHas('mail_template_logs', [
            'id' => $log->id,
            'data' => json_encode($data),
        ]);
        Assert::assertEquals('user@example.com', $log->data['to']);
        Assert::assertEquals(['cc1@example.com', 'cc2@example.com'], $log->data['cc']);
        Assert::assertEquals('John Doe', \notifyArrayGet($log->data, 'variables', 'name'));
        Assert::assertEquals('Example Corp', \notifyArrayGet($log->data, 'variables', 'company'));
    });

    test('_can_store_json_metadata', function (): void {
$metadata = [
=======

        $this->assertDatabaseHas('mail_template_logs', [
            'id' => $log->id,
            'data' => json_encode($data),
        ]);

        $this->assertIsArray($log->data);
        $this->assertEquals('user@example.com', $log->data['to']);
        $this->assertEquals(['cc1@example.com', 'cc2@example.com'], $log->data['cc']);
        $this->assertEquals('John Doe', $log->data['variables']['name']);
        $this->assertEquals('Example Corp', $log->data['variables']['company']);
    }

    /** @test */
    public function it_can_store_json_metadata(): void
    {
        $metadata = [
>>>>>>> 929ed821d (.)
            'provider' => 'smtp',
            'queue_id' => 'queue_123',
            'attempts' => 3,
            'max_attempts' => 5,
            'retry_after' => 300,
            'error_details' => [
                'code' => 'SMTP_ERROR',
                'message' => 'Connection timeout',
                'retry_count' => 2,
            ],
            'performance' => [
                'queue_time' => 1500,
                'processing_time' => 2500,
                'total_time' => 4000,
            ],
        ];

        $log = MailTemplateLog::create([
            'template_id' => 123,
            'mailable_type' => 'App\Mail\TestMail',
            'mailable_id' => 456,
            'status' => 'failed',
            'metadata' => $metadata,
        ]);
<<<<<<< HEAD
        \assertNotifyTableHas('mail_template_logs', [
            'id' => $log->id,
            'metadata' => json_encode($metadata),
        ]);
        Assert::assertEquals('smtp', $log->metadata['provider']);
        Assert::assertEquals('queue_123', $log->metadata['queue_id']);
        Assert::assertEquals(3, $log->metadata['attempts']);
        Assert::assertEquals('SMTP_ERROR', \notifyArrayGet($log->metadata, 'error_details', 'code'));
        Assert::assertEquals(4000, \notifyArrayGet($log->metadata, 'performance', 'total_time'));
    });

    test('_can_update_status_and_timestamps', function (): void {
$log = MailTemplateLog::create([
=======

        $this->assertDatabaseHas('mail_template_logs', [
            'id' => $log->id,
            'metadata' => json_encode($metadata),
        ]);

        $this->assertIsArray($log->metadata);
        $this->assertEquals('smtp', $log->metadata['provider']);
        $this->assertEquals('queue_123', $log->metadata['queue_id']);
        $this->assertEquals(3, $log->metadata['attempts']);
        $this->assertEquals('SMTP_ERROR', $log->metadata['error_details']['code']);
        $this->assertEquals(4000, $log->metadata['performance']['total_time']);
    }

    /** @test */
    public function it_can_update_status_and_timestamps(): void
    {
        $log = MailTemplateLog::create([
>>>>>>> 929ed821d (.)
            'template_id' => 123,
            'mailable_type' => 'App\Mail\TestMail',
            'mailable_id' => 456,
            'status' => 'pending',
        ]);

        $log->update([
            'status' => 'sent',
            'sent_at' => now(),
            'status_message' => 'Email sent successfully',
        ]);
<<<<<<< HEAD
        \assertNotifyTableHas('mail_template_logs', [
=======

        $this->assertDatabaseHas('mail_template_logs', [
>>>>>>> 929ed821d (.)
            'id' => $log->id,
            'status' => 'sent',
            'status_message' => 'Email sent successfully',
        ]);

<<<<<<< HEAD
        Assert::assertEquals('sent', \assertFreshModel($log, \Modules\Notify\Models\MailTemplateLog::class)->status);
        Assert::assertNotNull(\assertFreshModel($log, \Modules\Notify\Models\MailTemplateLog::class)->sent_at);
        Assert::assertEquals('Email sent successfully', \assertFreshModel($log, \Modules\Notify\Models\MailTemplateLog::class)->status_message);
    });

    test('_can_mark_as_delivered', function (): void {
$log = MailTemplateLog::create([
=======
        $this->assertEquals('sent', $log->fresh()->status);
        $this->assertNotNull($log->fresh()->sent_at);
        $this->assertEquals('Email sent successfully', $log->fresh()->status_message);
    }

    /** @test */
    public function it_can_mark_as_delivered(): void
    {
        $log = MailTemplateLog::create([
>>>>>>> 929ed821d (.)
            'template_id' => 123,
            'mailable_type' => 'App\Mail\TestMail',
            'mailable_id' => 456,
            'status' => 'sent',
            'sent_at' => now(),
        ]);

        $log->update([
            'status' => 'delivered',
            'delivered_at' => now()->addMinutes(1),
        ]);
<<<<<<< HEAD
        \assertNotifyTableHas('mail_template_logs', [
=======

        $this->assertDatabaseHas('mail_template_logs', [
>>>>>>> 929ed821d (.)
            'id' => $log->id,
            'status' => 'delivered',
        ]);

<<<<<<< HEAD
        Assert::assertEquals('delivered', \assertFreshModel($log, \Modules\Notify\Models\MailTemplateLog::class)->status);
        Assert::assertNotNull(\assertFreshModel($log, \Modules\Notify\Models\MailTemplateLog::class)->delivered_at);
    });

    test('_can_mark_as_failed', function (): void {
$log = MailTemplateLog::create([
=======
        $this->assertEquals('delivered', $log->fresh()->status);
        $this->assertNotNull($log->fresh()->delivered_at);
    }

    /** @test */
    public function it_can_mark_as_failed(): void
    {
        $log = MailTemplateLog::create([
>>>>>>> 929ed821d (.)
            'template_id' => 123,
            'mailable_type' => 'App\Mail\TestMail',
            'mailable_id' => 456,
            'status' => 'pending',
        ]);

        $log->update([
            'status' => 'failed',
            'failed_at' => now(),
            'status_message' => 'SMTP connection failed',
        ]);
<<<<<<< HEAD
        \assertNotifyTableHas('mail_template_logs', [
=======

        $this->assertDatabaseHas('mail_template_logs', [
>>>>>>> 929ed821d (.)
            'id' => $log->id,
            'status' => 'failed',
            'status_message' => 'SMTP connection failed',
        ]);

<<<<<<< HEAD
        Assert::assertEquals('failed', \assertFreshModel($log, \Modules\Notify\Models\MailTemplateLog::class)->status);
        Assert::assertNotNull(\assertFreshModel($log, \Modules\Notify\Models\MailTemplateLog::class)->failed_at);
        Assert::assertEquals('SMTP connection failed', \assertFreshModel($log, \Modules\Notify\Models\MailTemplateLog::class)->status_message);
    });

    test('_can_mark_as_opened', function (): void {
$log = MailTemplateLog::create([
=======
        $this->assertEquals('failed', $log->fresh()->status);
        $this->assertNotNull($log->fresh()->failed_at);
        $this->assertEquals('SMTP connection failed', $log->fresh()->status_message);
    }

    /** @test */
    public function it_can_mark_as_opened(): void
    {
        $log = MailTemplateLog::create([
>>>>>>> 929ed821d (.)
            'template_id' => 123,
            'mailable_type' => 'App\Mail\TestMail',
            'mailable_id' => 456,
            'status' => 'delivered',
            'delivered_at' => now(),
        ]);

        $log->update([
            'opened_at' => now()->addMinutes(5),
        ]);
<<<<<<< HEAD
        \assertNotifyTableHas('mail_template_logs', [
            'id' => $log->id,
            'opened_at' => \assertFreshModel($log, \Modules\Notify\Models\MailTemplateLog::class)->opened_at,
        ]);

        Assert::assertNotNull(\assertFreshModel($log, \Modules\Notify\Models\MailTemplateLog::class)->opened_at);
    });

    test('_can_mark_as_clicked', function (): void {
$log = MailTemplateLog::create([
=======

        $this->assertDatabaseHas('mail_template_logs', [
            'id' => $log->id,
            'opened_at' => $log->fresh()->opened_at,
        ]);

        $this->assertNotNull($log->fresh()->opened_at);
    }

    /** @test */
    public function it_can_mark_as_clicked(): void
    {
        $log = MailTemplateLog::create([
>>>>>>> 929ed821d (.)
            'template_id' => 123,
            'mailable_type' => 'App\Mail\TestMail',
            'mailable_id' => 456,
            'status' => 'delivered',
            'delivered_at' => now(),
            'opened_at' => now()->addMinutes(5),
        ]);

        $log->update([
            'clicked_at' => now()->addMinutes(10),
        ]);
<<<<<<< HEAD
        \assertNotifyTableHas('mail_template_logs', [
            'id' => $log->id,
            'clicked_at' => \assertFreshModel($log, \Modules\Notify\Models\MailTemplateLog::class)->clicked_at,
        ]);

        Assert::assertNotNull(\assertFreshModel($log, \Modules\Notify\Models\MailTemplateLog::class)->clicked_at);
    });

    test('_can_find_by_template_id', function (): void {
MailTemplateLog::create([
=======

        $this->assertDatabaseHas('mail_template_logs', [
            'id' => $log->id,
            'clicked_at' => $log->fresh()->clicked_at,
        ]);

        $this->assertNotNull($log->fresh()->clicked_at);
    }

    /** @test */
    public function it_can_find_by_template_id(): void
    {
        MailTemplateLog::create([
>>>>>>> 929ed821d (.)
            'template_id' => 123,
            'mailable_type' => 'App\Mail\TestMail',
            'mailable_id' => 456,
            'status' => 'sent',
        ]);

        MailTemplateLog::create([
            'template_id' => 123,
            'mailable_type' => 'App\Mail\WelcomeMail',
            'mailable_id' => 789,
            'status' => 'sent',
        ]);

        MailTemplateLog::create([
            'template_id' => 456,
            'mailable_type' => 'App\Mail\TestMail',
            'mailable_id' => 101,
            'status' => 'sent',
        ]);

        $template123Logs = MailTemplateLog::where('template_id', 123)->get();
        $template456Logs = MailTemplateLog::where('template_id', 456)->get();

<<<<<<< HEAD
        Assert::assertCount(2, $template123Logs);
        Assert::assertCount(1, $template456Logs);
        Assert::assertEquals(123, \assertFirstModel($template123Logs, \Modules\Notify\Models\MailTemplateLog::class)->template_id);
        Assert::assertEquals(123, \assertFirstModel($template123Logs->slice(1), \Modules\Notify\Models\MailTemplateLog::class)->template_id);
        Assert::assertEquals(456, \assertFirstModel($template456Logs, \Modules\Notify\Models\MailTemplateLog::class)->template_id);
    });

    test('_can_find_by_status', function (): void {
MailTemplateLog::create([
=======
        $this->assertCount(2, $template123Logs);
        $this->assertCount(1, $template456Logs);
        $this->assertEquals(123, $template123Logs[0]->template_id);
        $this->assertEquals(123, $template123Logs[1]->template_id);
        $this->assertEquals(456, $template456Logs[0]->template_id);
    }

    /** @test */
    public function it_can_find_by_status(): void
    {
        MailTemplateLog::create([
>>>>>>> 929ed821d (.)
            'template_id' => 123,
            'mailable_type' => 'App\Mail\TestMail',
            'mailable_id' => 456,
            'status' => 'sent',
        ]);

        MailTemplateLog::create([
            'template_id' => 124,
            'mailable_type' => 'App\Mail\WelcomeMail',
            'mailable_id' => 789,
            'status' => 'failed',
        ]);

        MailTemplateLog::create([
            'template_id' => 125,
            'mailable_type' => 'App\Mail\NewsletterMail',
            'mailable_id' => 101,
            'status' => 'delivered',
        ]);

        $sentLogs = MailTemplateLog::where('status', 'sent')->get();
        $failedLogs = MailTemplateLog::where('status', 'failed')->get();
        $deliveredLogs = MailTemplateLog::where('status', 'delivered')->get();

<<<<<<< HEAD
        Assert::assertCount(1, $sentLogs);
        Assert::assertCount(1, $failedLogs);
        Assert::assertCount(1, $deliveredLogs);
        Assert::assertEquals('sent', \assertFirstModel($sentLogs, \Modules\Notify\Models\MailTemplateLog::class)->status);
        Assert::assertEquals('failed', \assertFirstModel($failedLogs, \Modules\Notify\Models\MailTemplateLog::class)->status);
        Assert::assertEquals('delivered', \assertFirstModel($deliveredLogs, \Modules\Notify\Models\MailTemplateLog::class)->status);
    });

    test('_can_find_by_mailable_type', function (): void {
MailTemplateLog::create([
=======
        $this->assertCount(1, $sentLogs);
        $this->assertCount(1, $failedLogs);
        $this->assertCount(1, $deliveredLogs);
        $this->assertEquals('sent', $sentLogs[0]->status);
        $this->assertEquals('failed', $failedLogs[0]->status);
        $this->assertEquals('delivered', $deliveredLogs[0]->status);
    }

    /** @test */
    public function it_can_find_by_mailable_type(): void
    {
        MailTemplateLog::create([
>>>>>>> 929ed821d (.)
            'template_id' => 123,
            'mailable_type' => 'App\Mail\TestMail',
            'mailable_id' => 456,
            'status' => 'sent',
        ]);

        MailTemplateLog::create([
            'template_id' => 124,
            'mailable_type' => 'App\Mail\WelcomeMail',
            'mailable_id' => 789,
            'status' => 'sent',
        ]);

        MailTemplateLog::create([
            'template_id' => 125,
            'mailable_type' => 'App\Mail\TestMail',
            'mailable_id' => 101,
            'status' => 'sent',
        ]);

        $testMailLogs = MailTemplateLog::where('mailable_type', 'App\Mail\TestMail')->get();
        $welcomeMailLogs = MailTemplateLog::where('mailable_type', 'App\Mail\WelcomeMail')->get();

<<<<<<< HEAD
        Assert::assertCount(2, $testMailLogs);
        Assert::assertCount(1, $welcomeMailLogs);
        Assert::assertEquals('App\Mail\TestMail', \assertFirstModel($testMailLogs, \Modules\Notify\Models\MailTemplateLog::class)->mailable_type);
        Assert::assertEquals('App\Mail\TestMail', \assertFirstModel($testMailLogs->slice(1), \Modules\Notify\Models\MailTemplateLog::class)->mailable_type);
        Assert::assertEquals('App\Mail\WelcomeMail', \assertFirstModel($welcomeMailLogs, \Modules\Notify\Models\MailTemplateLog::class)->mailable_type);
    });

    test('_can_find_by_date_range', function (): void {
$yesterday = now()->subDay();
=======
        $this->assertCount(2, $testMailLogs);
        $this->assertCount(1, $welcomeMailLogs);
        $this->assertEquals('App\Mail\TestMail', $testMailLogs[0]->mailable_type);
        $this->assertEquals('App\Mail\TestMail', $testMailLogs[1]->mailable_type);
        $this->assertEquals('App\Mail\WelcomeMail', $welcomeMailLogs[0]->mailable_type);
    }

    /** @test */
    public function it_can_find_by_date_range(): void
    {
        $yesterday = now()->subDay();
>>>>>>> 929ed821d (.)
        $today = now();
        $tomorrow = now()->addDay();

        MailTemplateLog::create([
            'template_id' => 123,
            'mailable_type' => 'App\Mail\TestMail',
            'mailable_id' => 456,
            'status' => 'sent',
            'sent_at' => $yesterday,
        ]);

        MailTemplateLog::create([
            'template_id' => 124,
            'mailable_type' => 'App\Mail\WelcomeMail',
            'mailable_id' => 789,
            'status' => 'sent',
            'sent_at' => $today,
        ]);

        MailTemplateLog::create([
            'template_id' => 125,
            'mailable_type' => 'App\Mail\NewsletterMail',
            'mailable_id' => 101,
            'status' => 'sent',
            'sent_at' => $tomorrow,
        ]);

        $todayLogs = MailTemplateLog::whereDate('sent_at', $today->toDateString())->get();
        $recentLogs = MailTemplateLog::where('sent_at', '>=', $yesterday)->get();

<<<<<<< HEAD
        Assert::assertCount(1, $todayLogs);
        Assert::assertCount(2, $recentLogs); // yesterday and today
        Assert::assertEquals('App\Mail\WelcomeMail', \assertFirstModel($todayLogs, \Modules\Notify\Models\MailTemplateLog::class)->mailable_type);
    });

    test('_can_find_by_data_pattern', function (): void {
MailTemplateLog::create([
=======
        $this->assertCount(1, $todayLogs);
        $this->assertCount(2, $recentLogs); // yesterday and today
        $this->assertEquals('App\Mail\WelcomeMail', $todayLogs[0]->mailable_type);
    }

    /** @test */
    public function it_can_find_by_data_pattern(): void
    {
        MailTemplateLog::create([
>>>>>>> 929ed821d (.)
            'template_id' => 123,
            'mailable_type' => 'App\Mail\TestMail',
            'mailable_id' => 456,
            'status' => 'sent',
            'data' => [
                'to' => 'user@example.com',
                'subject' => 'Welcome to our platform',
                'template' => 'welcome_template',
            ],
        ]);

        MailTemplateLog::create([
            'template_id' => 124,
            'mailable_type' => 'App\Mail\WelcomeMail',
            'mailable_id' => 789,
            'status' => 'sent',
            'data' => [
                'to' => 'admin@example.com',
                'subject' => 'System notification',
                'template' => 'system_template',
            ],
        ]);

        $welcomeSubjectLogs = MailTemplateLog::whereJsonPath('data.subject', 'like', '%Welcome%')->get();
        $welcomeTemplateLogs = MailTemplateLog::whereJsonPath('data.template', 'like', '%welcome%')->get();

<<<<<<< HEAD
        Assert::assertCount(1, $welcomeSubjectLogs);
        Assert::assertCount(1, $welcomeTemplateLogs);
        Assert::assertEquals('Welcome to our platform', \assertFirstModel($welcomeSubjectLogs, \Modules\Notify\Models\MailTemplateLog::class)->data['subject']);
        Assert::assertEquals('welcome_template', \notifyArrayGet(\assertFirstModel($welcomeTemplateLogs, \Modules\Notify\Models\MailTemplateLog::class)->data, 'template'));
    });

    test('_can_find_by_metadata_pattern', function (): void {
MailTemplateLog::create([
=======
        $this->assertCount(1, $welcomeSubjectLogs);
        $this->assertCount(1, $welcomeTemplateLogs);
        $this->assertEquals('Welcome to our platform', $welcomeSubjectLogs[0]->data['subject']);
        $this->assertEquals('welcome_template', $welcomeTemplateLogs[0]->data['template']);
    }

    /** @test */
    public function it_can_find_by_metadata_pattern(): void
    {
        MailTemplateLog::create([
>>>>>>> 929ed821d (.)
            'template_id' => 123,
            'mailable_type' => 'App\Mail\TestMail',
            'mailable_id' => 456,
            'status' => 'sent',
            'metadata' => [
                'provider' => 'smtp',
                'queue_id' => 'queue_123',
                'attempts' => 1,
            ],
        ]);

        MailTemplateLog::create([
            'template_id' => 124,
            'mailable_type' => 'App\Mail\WelcomeMail',
            'mailable_id' => 789,
            'status' => 'sent',
            'metadata' => [
                'provider' => 'ses',
                'queue_id' => 'queue_456',
                'attempts' => 1,
            ],
        ]);

        $smtpLogs = MailTemplateLog::whereJsonPath('metadata.provider', 'smtp')->get();
        $sesLogs = MailTemplateLog::whereJsonPath('metadata.provider', 'ses')->get();

<<<<<<< HEAD
        Assert::assertCount(1, $smtpLogs);
        Assert::assertCount(1, $sesLogs);
        Assert::assertEquals('smtp', \assertFirstModel($smtpLogs, \Modules\Notify\Models\MailTemplateLog::class)->metadata['provider']);
        Assert::assertEquals('ses', \assertFirstModel($sesLogs, \Modules\Notify\Models\MailTemplateLog::class)->metadata['provider']);
    });

    test('_can_find_by_multiple_criteria', function (): void {
MailTemplateLog::create([
=======
        $this->assertCount(1, $smtpLogs);
        $this->assertCount(1, $sesLogs);
        $this->assertEquals('smtp', $smtpLogs[0]->metadata['provider']);
        $this->assertEquals('ses', $sesLogs[0]->metadata['provider']);
    }

    /** @test */
    public function it_can_find_by_multiple_criteria(): void
    {
        MailTemplateLog::create([
>>>>>>> 929ed821d (.)
            'template_id' => 123,
            'mailable_type' => 'App\Mail\TestMail',
            'mailable_id' => 456,
            'status' => 'sent',
            'data' => [
                'to' => 'user@example.com',
                'subject' => 'Welcome email',
            ],
            'metadata' => [
                'provider' => 'smtp',
                'attempts' => 1,
            ],
        ]);

        MailTemplateLog::create([
            'template_id' => 124,
            'mailable_type' => 'App\Mail\WelcomeMail',
            'mailable_id' => 789,
            'status' => 'failed',
            'data' => [
                'to' => 'admin@example.com',
                'subject' => 'System notification',
            ],
            'metadata' => [
                'provider' => 'smtp',
                'attempts' => 3,
            ],
        ]);

        $smtpWelcomeLogs = MailTemplateLog::where('status', 'sent')
            ->whereJsonPath('metadata.provider', 'smtp')
            ->whereJsonPath('data.subject', 'like', '%Welcome%')
            ->get();

<<<<<<< HEAD
        Assert::assertCount(1, $smtpWelcomeLogs);
        Assert::assertEquals('sent', \assertFirstModel($smtpWelcomeLogs, \Modules\Notify\Models\MailTemplateLog::class)->status);
        Assert::assertEquals('smtp', \assertFirstModel($smtpWelcomeLogs, \Modules\Notify\Models\MailTemplateLog::class)->metadata['provider']);
        Assert::assertEquals('Welcome email', \assertFirstModel($smtpWelcomeLogs, \Modules\Notify\Models\MailTemplateLog::class)->data['subject']);
    });

    test('_can_handle_null_values', function (): void {
$log = MailTemplateLog::create([
=======
        $this->assertCount(1, $smtpWelcomeLogs);
        $this->assertEquals('sent', $smtpWelcomeLogs[0]->status);
        $this->assertEquals('smtp', $smtpWelcomeLogs[0]->metadata['provider']);
        $this->assertEquals('Welcome email', $smtpWelcomeLogs[0]->data['subject']);
    }

    /** @test */
    public function it_can_handle_null_values(): void
    {
        $log = MailTemplateLog::create([
>>>>>>> 929ed821d (.)
            'template_id' => null,
            'mailable_type' => null,
            'mailable_id' => null,
            'status' => null,
            'status_message' => null,
            'data' => null,
            'metadata' => null,
            'sent_at' => null,
            'delivered_at' => null,
            'failed_at' => null,
            'opened_at' => null,
            'clicked_at' => null,
        ]);

<<<<<<< HEAD
        Assert::assertNull($log->template_id);
        Assert::assertNull($log->mailable_type);
        Assert::assertNull($log->mailable_id);
        Assert::assertNull($log->status);
        Assert::assertNull($log->status_message);
        Assert::assertNull($log->data);
        Assert::assertNull($log->metadata);
        Assert::assertNull($log->sent_at);
        Assert::assertNull($log->delivered_at);
        Assert::assertNull($log->failed_at);
        Assert::assertNull($log->opened_at);
        Assert::assertNull($log->clicked_at);
    });

    test('_can_handle_empty_arrays', function (): void {
$log = MailTemplateLog::create([
=======
        $this->assertNull($log->template_id);
        $this->assertNull($log->mailable_type);
        $this->assertNull($log->mailable_id);
        $this->assertNull($log->status);
        $this->assertNull($log->status_message);
        $this->assertNull($log->data);
        $this->assertNull($log->metadata);
        $this->assertNull($log->sent_at);
        $this->assertNull($log->delivered_at);
        $this->assertNull($log->failed_at);
        $this->assertNull($log->opened_at);
        $this->assertNull($log->clicked_at);
    }

    /** @test */
    public function it_can_handle_empty_arrays(): void
    {
        $log = MailTemplateLog::create([
>>>>>>> 929ed821d (.)
            'template_id' => 123,
            'mailable_type' => 'App\Mail\TestMail',
            'mailable_id' => 456,
            'status' => 'sent',
            'data' => [],
            'metadata' => [],
        ]);
<<<<<<< HEAD
        \assertNotifyTableHas('mail_template_logs', [
=======

        $this->assertDatabaseHas('mail_template_logs', [
>>>>>>> 929ed821d (.)
            'id' => $log->id,
            'data' => json_encode([]),
            'metadata' => json_encode([]),
        ]);
<<<<<<< HEAD
        Assert::assertEmpty($log->data);
        Assert::assertEmpty($log->metadata);
    });
});
=======

        $this->assertIsArray($log->data);
        $this->assertIsArray($log->metadata);
        $this->assertEmpty($log->data);
        $this->assertEmpty($log->metadata);
    }
}
>>>>>>> 929ed821d (.)
