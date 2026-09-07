<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Feature;

use Modules\Notify\Database\Factories\ContactFactory;
use Modules\Notify\Database\Factories\MailTemplateFactory;
use Modules\Notify\Database\Factories\MailTemplateLogFactory;
use Modules\Notify\Database\Factories\MailTemplateVersionFactory;
use Modules\Notify\Database\Factories\NotificationFactory;
use Modules\Notify\Database\Factories\NotificationTemplateFactory;
use Modules\Notify\Database\Factories\NotificationTypeFactory;
use Modules\Notify\Models\Contact;
use Modules\Notify\Models\MailTemplate;
use Modules\Notify\Models\MailTemplateLog;
use Modules\Notify\Models\MailTemplateVersion;
use Modules\Notify\Models\Notification;
use Modules\Notify\Models\NotificationTemplate;
use Modules\Notify\Models\NotificationType;
<<<<<<< HEAD
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;

use function Safe\json_encode;
use Modules\User\Models\User;
=======
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;
use Modules\Xot\Tests\XotBasePest;

use function Safe\json_encode;

uses(TestCase::class)->group('notify-db');
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

describe('Notification Management Business Logic', function () {
    it('can create notification with core fields', function () {
        $notification = NotificationFactory::new()->createOne([
            'type' => 'email',
            'status' => 'pending',
            'data' => [
                'subject' => 'Test subject',
<<<<<<< HEAD
                'message' => 'Test body'],
            'channels' => ['mail']]);
=======
                'message' => 'Test body',
            ],
            'channels' => ['mail'],
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

        Assert::assertInstanceOf(Notification::class, $notification);
        Assert::assertSame('email', $notification->type);
        Assert::assertSame('pending', $notification->status);

        XotBasePest::assertTableHas('notify', 'notifications', [
            'id' => $notification->id,
            'type' => 'email',
<<<<<<< HEAD
            'status' => 'pending']);
=======
            'status' => 'pending',
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    });

    it('can create notification template with valid schema', function () {
        $template = NotificationTemplateFactory::new()->createOne([
            'name' => 'Welcome Email Template',
            'code' => 'welcome-email',
            'subject' => 'Benvenuto {{user_name}}',
            'body_html' => '<p>Benvenuto {{user_name}}</p>',
            'channels' => ['mail'],
            'variables' => ['user_name'],
<<<<<<< HEAD
            'is_active' => true]);
=======
            'is_active' => true,
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

        Assert::assertInstanceOf(NotificationTemplate::class, $template);
        Assert::assertSame('Welcome Email Template', $template->name);
        Assert::assertTrue($template->is_active);

        XotBasePest::assertTableHas('notify', 'notification_templates', [
            'id' => $template->id,
            'name' => 'Welcome Email Template',
            'code' => 'welcome-email',
<<<<<<< HEAD
            'is_active' => true]);
=======
            'is_active' => true,
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    });

    it('can create notification type with valid schema', function () {
        $type = NotificationTypeFactory::new()->createOne([
            'name' => 'welcome_email',
            'slug' => 'welcome-email',
            'description' => 'Email inviata ai nuovi utenti registrati',
            'category' => 'onboarding',
<<<<<<< HEAD
            'is_active' => true]);
=======
            'is_active' => true,
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

        Assert::assertInstanceOf(NotificationType::class, $type);
        Assert::assertSame('welcome_email', $type->name);
        Assert::assertTrue($type->is_active);

        XotBasePest::assertTableHas('notify', 'notification_types', [
            'id' => $type->id,
            'name' => 'welcome_email',
            'slug' => 'welcome-email',
<<<<<<< HEAD
            'is_active' => true]);
=======
            'is_active' => true,
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    });

    it('can create contact for notification delivery', function () {
        $contact = ContactFactory::new()->createOne([
            'model_type' => 'App\Models\User',
            'model_id' => '100',
            'contact_type' => 'email',
            'value' => 'mario.rossi@example.com',
            'first_name' => 'Mario',
            'last_name' => 'Rossi',
<<<<<<< HEAD
            'email' => 'mario.rossi@example.com']);
=======
            'email' => 'mario.rossi@example.com',
        ]);

>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        Assert::assertInstanceOf(Contact::class, $contact);
        Assert::assertSame('mario.rossi@example.com', $contact->value);

        XotBasePest::assertTableHas('notify', 'contacts', [
            'id' => $contact->id,
            'contact_type' => 'email',
<<<<<<< HEAD
            'value' => 'mario.rossi@example.com']);
=======
            'value' => 'mario.rossi@example.com',
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    });

    it('can track mail template log lifecycle', function () {
        $template = MailTemplateFactory::new()->createOne();
        $log = MailTemplateLogFactory::new()->createOne([
            'template_id' => $template->id,
            'status' => 'sent',
            'data' => ['recipient' => 'patient@example.com'],
            'metadata' => ['campaign_id' => 'welcome_001'],
<<<<<<< HEAD
            'sent_at' => now()]);
=======
            'sent_at' => now(),
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

        Assert::assertInstanceOf(MailTemplateLog::class, $log);
        Assert::assertSame('sent', $log->status);
        Assert::assertSame('patient@example.com', XotBasePest::assertArray($log->data)['recipient']);
        Assert::assertSame('welcome_001', XotBasePest::assertArray($log->metadata)['campaign_id']);
    });

    it('can create mail template version snapshot', function () {
        $template = MailTemplateFactory::new()->createOne();
        $version = MailTemplateVersionFactory::new()->createOne([
            'template_id' => $template->id,
            'subject' => 'Versione precedente',
            'html_template' => '<p>Snapshot</p>',
            'text_template' => 'Snapshot',
            'version' => 2,
<<<<<<< HEAD
            'change_notes' => 'Aggiornamento copy']);
=======
            'change_notes' => 'Aggiornamento copy',
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

        Assert::assertInstanceOf(MailTemplateVersion::class, $version);
        Assert::assertSame('Versione precedente', $version->subject);
        Assert::assertInstanceOf(MailTemplate::class, $version->template);
        Assert::assertSame($template->id, $version->template->id);
    });

    it('can update notification data payload', function () {
        $notification = NotificationFactory::new()->createOne([
            'type' => 'sms',
            'status' => 'pending',
<<<<<<< HEAD
            'data' => ['message' => 'Old message']]);
=======
            'data' => ['message' => 'Old message'],
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

        $payload = ['message' => 'Updated message', 'locale' => 'it'];
        $notification->update(['data' => $payload, 'status' => 'sent', 'sent_at' => now()]);

        $fresh = XotBasePest::assertFreshModel($notification, Notification::class);
        $data = XotBasePest::assertArray(is_array($fresh->data) ? $fresh->data : null);

        Assert::assertSame('Updated message', $data['message']);
        Assert::assertSame('sent', $fresh->status);
        Assert::assertNotNull($fresh->sent_at);

        XotBasePest::assertTableHas('notify', 'notifications', [
            'id' => $notification->id,
<<<<<<< HEAD
            'status' => 'sent']);
=======
            'status' => 'sent',
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    });

    it('can store notification type channel configuration', function () {
        $channels = [
            'email' => ['enabled' => true],
<<<<<<< HEAD
            'sms' => ['enabled' => false]];
=======
            'sms' => ['enabled' => false],
        ];
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

        $type = NotificationTypeFactory::new()->createOne(['channels' => $channels]);

        XotBasePest::assertTableHas('notify', 'notification_types', [
            'id' => $type->id,
<<<<<<< HEAD
            'channels' => json_encode($channels)]);
=======
            'channels' => json_encode($channels),
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

        $stored = XotBasePest::assertArray(XotBasePest::assertFreshModel($type, NotificationType::class)->channels);
        Assert::assertTrue(XotBasePest::assertArray($stored['email'] ?? null)['enabled']);
        Assert::assertFalse(XotBasePest::assertArray($stored['sms'] ?? null)['enabled']);
    });
});
