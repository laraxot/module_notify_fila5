<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Feature;

use Modules\Notify\Database\Factories\MailTemplateFactory;
use Modules\Notify\Models\MailTemplate;
<<<<<<< HEAD
use Modules\Xot\Tests\XotBasePest;
use PHPUnit\Framework\Assert;
=======
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;
use Modules\Xot\Tests\XotBasePest;

uses(TestCase::class)->group('notify-db');
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

describe('MailTemplate Model Tests', function () {
    it('can create a mail template', function () {
        $template = MailTemplateFactory::new()->createOne([
            'name' => 'Test Template',
            'mailable' => 'App\Mail\TestMail',
            'slug' => 'test-template',
            'subject' => ['en' => 'Test Subject'],
            'html_template' => ['en' => '<h1>Test HTML</h1>'],
<<<<<<< HEAD
            'text_template' => ['en' => 'Test Text']]);
=======
            'text_template' => ['en' => 'Test Text'],
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

        Assert::assertInstanceOf(MailTemplate::class, $template);

        Assert::assertSame('Test Template', $template->name);

        XotBasePest::assertTableHas('notify', 'mail_templates', [
            'id' => $template->id,
            'name' => 'Test Template',
<<<<<<< HEAD
            'slug' => $template->slug]);
=======
            'slug' => $template->slug,
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    });

    it('can update a mail template', function () {
        $template = MailTemplateFactory::new()->createOne([
            'name' => 'Test Template 2',
            'mailable' => 'App\Mail\TestMail2',
            'slug' => 'test-template-2',
            'subject' => ['en' => 'Test Subject 2'],
<<<<<<< HEAD
            'html_template' => ['en' => '<h1>Test HTML 2</h1>']]);
=======
            'html_template' => ['en' => '<h1>Test HTML 2</h1>'],
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

        $template->update(['name' => 'Updated Template']);

        Assert::assertSame('Updated Template', XotBasePest::assertFreshModel($template, MailTemplate::class)->name);
    });

    it('can delete a mail template', function () {
        $template = MailTemplateFactory::new()->createOne([
            'name' => 'Delete Me',
            'mailable' => 'App\Mail\DeleteMail',
            'slug' => 'delete-me',
            'subject' => ['en' => 'Delete Subject'],
<<<<<<< HEAD
            'html_template' => ['en' => '<h1>Delete HTML</h1>']]);
=======
            'html_template' => ['en' => '<h1>Delete HTML</h1>'],
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

        $templateId = $template->id;
        $template->delete();

        XotBasePest::assertTableMissing('notify', 'mail_templates', [
<<<<<<< HEAD
            'id' => $templateId]);
=======
            'id' => $templateId,
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    });
});
