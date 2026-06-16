<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Relations\MorphTo;
<<<<<<< HEAD
use Modules\Notify\Models\Contact;
use Modules\Notify\Models\MailTemplate;
use Modules\Notify\Models\Notification;
use Modules\Notify\Models\NotifyTheme;
use Modules\Notify\Tests\Fixtures\NotifyBaseMorphPivotProxy;
use Modules\Notify\Tests\Fixtures\NotifyBasePivotProxy;
use Modules\Notify\Tests\Fixtures\NotifyNotificationTemplateProxy;
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(\Modules\Notify\Tests\TestCase::class);

function makeNotifyBaseMorphPivotProxy(): NotifyBaseMorphPivotProxy
{
    return new NotifyBaseMorphPivotProxy;
}

function makeNotifyBasePivotProxy(): NotifyBasePivotProxy
{
    return new NotifyBasePivotProxy;
}

function makeNotifyNotificationTemplateProxy(): NotifyNotificationTemplateProxy
{
    return new NotifyNotificationTemplateProxy;
=======
use Modules\Notify\Models\BaseMorphPivot;
use Modules\Notify\Models\BasePivot;
use Modules\Notify\Models\Contact;
use Modules\Notify\Models\MailTemplate;
use Modules\Notify\Models\Notification;
use Modules\Notify\Models\NotificationTemplate;
use Modules\Notify\Models\NotifyTheme;
use Modules\Notify\Tests\TestCase;

uses(TestCase::class);

function makeNotifyBaseMorphPivotProxy(): BaseMorphPivot
{
    return new class extends BaseMorphPivot
    {
        protected $table = 'notify_base_morph_pivot_proxy';

        public function exposedCasts(): array
        {
            return $this->casts();
        }
    };
}

function makeNotifyBasePivotProxy(): BasePivot
{
    return new class extends BasePivot
    {
        protected $table = 'notify_base_pivot_proxy';

        public function exposedCasts(): array
        {
            return $this->casts();
        }
    };
}

function makeNotifyNotificationTemplateProxy(): NotificationTemplate
{
    return new class extends NotificationTemplate
    {
        public function exposedCompileString(?string $template, array $data): ?string
        {
            return $this->compileString($template, $data);
        }

        public function exposedCasts(): array
        {
            return $this->casts();
        }
    };
>>>>>>> 929ed821d (.)
}

test('base morph pivot and base pivot use notify connection and default casts', function () {
    $morphPivot = makeNotifyBaseMorphPivotProxy();
    $pivot = makeNotifyBasePivotProxy();

<<<<<<< HEAD
    Assert::assertSame('notify', $morphPivot->getConnectionName());
    Assert::assertSame('notify', $pivot->getConnectionName());
    Assert::assertArrayHasKey('created_at', $morphPivot->exposedCasts());
    Assert::assertArrayHasKey('updated_at', $pivot->exposedCasts());
=======
    expect($morphPivot->getConnectionName())->toBe('notify')
        ->and($pivot->getConnectionName())->toBe('notify')
        ->and($morphPivot->exposedCasts())->toHaveKey('created_at')
        ->and($pivot->exposedCasts())->toHaveKey('updated_at');
>>>>>>> 929ed821d (.)
});

test('contact model has expected fillable and casts', function () {
    $contact = new Contact;

<<<<<<< HEAD
    Assert::assertSame('notify', $contact->getConnectionName());
    Assert::assertContains('model_id', $contact->getFillable());
    Assert::assertContains('contact_type', $contact->getFillable());
    Assert::assertArrayHasKey('model_id', $contact->getCasts());
    Assert::assertArrayHasKey('user_id', $contact->getCasts());
=======
    expect($contact->getConnectionName())->toBe('notify')
        ->and($contact->getFillable())->toContain('model_id')
        ->and($contact->getFillable())->toContain('contact_type')
        ->and($contact->getCasts())->toHaveKey('model_id')
        ->and($contact->getCasts())->toHaveKey('user_id');
>>>>>>> 929ed821d (.)
});

test('mail template has slug options and expected casts', function () {
    $mailTemplate = new MailTemplate;

<<<<<<< HEAD
    Assert::assertSame('notify', $mailTemplate->getConnectionName());
    Assert::assertContains('slug', $mailTemplate->getFillable());
    Assert::assertContains('html_layout_path', $mailTemplate->getFillable());
    Assert::assertArrayHasKey('created_at', $mailTemplate->getCasts());
    Assert::assertSame('slug', $mailTemplate->getSlugOptions()->generateSlugFrom);
=======
    expect($mailTemplate->getConnectionName())->toBe('notify')
        ->and($mailTemplate->getFillable())->toContain('slug')
        ->and($mailTemplate->getFillable())->toContain('html_layout_path')
        ->and($mailTemplate->getCasts())->toHaveKey('created_at');

    $slugOptions = $mailTemplate->getSlugOptions();
    expect($slugOptions)->not->toBeNull();
>>>>>>> 929ed821d (.)
});

test('notification model has array and datetime casts', function () {
    $notification = new Notification;

<<<<<<< HEAD
    Assert::assertContains('message', $notification->getFillable());
    Assert::assertContains('channels', $notification->getFillable());
    Assert::assertArrayHasKey('data', $notification->getCasts());
    Assert::assertArrayHasKey('read_at', $notification->getCasts());
=======
    expect($notification->getFillable())->toContain('message')
        ->and($notification->getFillable())->toContain('channels')
        ->and($notification->getCasts())->toHaveKey('data')
        ->and($notification->getCasts())->toHaveKey('read_at');
>>>>>>> 929ed821d (.)
});

test('notification template compile and helper methods return expected structures', function () {
    $template = makeNotifyNotificationTemplateProxy();

    $template->subject = 'Hello {{ $name }}';
    $template->body_html = '<p>Body {{ $name }}</p>';
    $template->body_text = 'Body {{ $name }}';
    $template->preview_data = ['name' => 'Mario'];
    $template->channels = ['mail', 'sms'];

    $compiled = $template->compile(['name' => 'Luigi']);
    $preview = $template->preview();

<<<<<<< HEAD
    Assert::assertContains('grapesjs_data', $template->getFillable());
    Assert::assertArrayHasKey('channels', $template->exposedCasts());
    Assert::assertArrayHasKey('subject', $compiled);
    Assert::assertArrayHasKey('body_html', $compiled);
    Assert::assertArrayHasKey('body_text', $compiled);
    Assert::assertArrayHasKey('subject', $preview);
    Assert::assertArrayHasKey('body_html', $preview);
    Assert::assertArrayHasKey('body_text', $preview);
    Assert::assertTrue($template->shouldSend(['foo' => 'bar']));

    $template->conditions = ['foo' => 'bar'];
    Assert::assertTrue($template->shouldSend(['foo' => 'bar']));
    Assert::assertFalse($template->shouldSend(['foo' => 'baz']));
=======
    expect($template->getFillable())->toContain('grapesjs_data')
        ->and($template->exposedCasts())->toHaveKey('channels')
        ->and($compiled)->toHaveKeys(['subject', 'body_html', 'body_text'])
        ->and($preview)->toHaveKeys(['subject', 'body_html', 'body_text'])
        ->and($template->shouldSend(['foo' => 'bar']))->toBeTrue();

    $template->conditions = ['foo' => 'bar'];
    expect($template->shouldSend(['foo' => 'bar']))->toBeTrue()
        ->and($template->shouldSend(['foo' => 'baz']))->toBeFalse();
>>>>>>> 929ed821d (.)
});

test('notify theme exposes logo accessor and morph relation', function () {
    $theme = new NotifyTheme;
    $theme->logo_width = 300;
    $theme->logo_height = 120;

    $logo = $theme->getLogoAttribute(null);
    $relation = $theme->linkable();

<<<<<<< HEAD
    Assert::assertSame('notify', $theme->getConnectionName());
    Assert::assertContains('logo_src', $theme->getFillable());
    Assert::assertContains('view_params', $theme->getFillable());
    Assert::assertArrayHasKey('view_params', $theme->getCasts());
    Assert::assertSame(300, $logo['width']);
    Assert::assertSame(120, $logo['height']);
    Assert::assertInstanceOf(MorphTo::class, $relation);
=======
    expect($theme->getConnectionName())->toBe('notify')
        ->and($theme->getFillable())->toContain('logo_src')
        ->and($theme->getFillable())->toContain('view_params')
        ->and($theme->getCasts())->toHaveKey('view_params')
        ->and($logo['width'])->toBe(300)
        ->and($logo['height'])->toBe(120)
        ->and($relation)->toBeInstanceOf(MorphTo::class);
>>>>>>> 929ed821d (.)
});
