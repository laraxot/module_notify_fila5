<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Filament\Forms\Components;

use Filament\Forms\Components\TextInput;
use Modules\Notify\Filament\Forms\Components\ChannelCheckboxList;
<<<<<<< HEAD
use Modules\Notify\Filament\Forms\Components\HtmlLayoutPathSelect;
use Modules\Notify\Tests\Fixtures\ContactSectionTestProxy;
use Modules\Notify\Filament\Forms\Components\MailTemplateSelect;
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(\Modules\Notify\Tests\TestCase::class);
=======
use Modules\Notify\Filament\Forms\Components\ContactSection;
use Modules\Notify\Filament\Forms\Components\HtmlLayoutPathSelect;
use Modules\Notify\Filament\Forms\Components\MailTemplateSelect;
use Modules\Notify\Tests\TestCase;

uses(TestCase::class);

function makeContactSectionTestProxy(): ContactSection
{
    return new class extends ContactSection
    {
        public function exposedFormSchema(): array
        {
            return $this->getFormSchema();
        }
    };
}
>>>>>>> 929ed821d (.)

test('channel checkbox list and selects have expected default names', function () {
    $channels = ChannelCheckboxList::make();
    $mailTemplate = MailTemplateSelect::make();

<<<<<<< HEAD
    Assert::assertSame('channels', $channels->getName());
    Assert::assertSame('mail_template_slug', $mailTemplate->getName());
=======
    expect($channels->getName())->toBe('channels')
        ->and($mailTemplate->getName())->toBe('mail_template_slug');
>>>>>>> 929ed821d (.)
});

test('html layout path select exposes expected default name via method signature', function () {
    $reflection = new \ReflectionMethod(HtmlLayoutPathSelect::class, 'make');
    $params = $reflection->getParameters();

<<<<<<< HEAD
    Assert::assertNotEmpty($params);
});

test('contact section returns text inputs schema from enum', function () {
    $proxy = new ContactSectionTestProxy;
    $schema = $proxy->exposedFormSchema();
    foreach ($schema as $component) {
        Assert::assertInstanceOf(TextInput::class, $component);
=======
    expect($params)->toHaveCount(1)
        ->and($params[0]->getName())->toBe('name');
});

test('contact section returns text inputs schema from enum', function () {
    $proxy = makeContactSectionTestProxy();
    $schema = $proxy->exposedFormSchema();

    expect($schema)->toBeArray();

    foreach ($schema as $component) {
        expect($component)->toBeInstanceOf(TextInput::class);
>>>>>>> 929ed821d (.)
    }
});
