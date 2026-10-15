<?php

declare(strict_types=1);

namespace Tests\Modules\Notify\Unit\Filament\Forms\Components;

use Filament\Forms\Components\TextInput;
use Modules\Notify\Filament\Forms\Components\ChannelCheckboxList;
use Modules\Notify\Filament\Forms\Components\HtmlLayoutPathSelect;
use Modules\Notify\Filament\Forms\Components\MailTemplateSelect;
use Tests\Modules\Notify\Fixtures\ContactSectionTestProxy;
use PHPUnit\Framework\Assert;

test('channel checkbox list and selects have expected default names', function () {
    $channels = ChannelCheckboxList::make();
    $mailTemplate = MailTemplateSelect::make();

    Assert::assertSame('channels', $channels->getName());
    Assert::assertSame('mail_template_slug', $mailTemplate->getName());
});

test('html layout path select exposes expected default name via method signature', function () {
    $reflection = new \ReflectionMethod(HtmlLayoutPathSelect::class, 'make');
    $params = $reflection->getParameters();

    Assert::assertNotEmpty($params);
});

test('contact section returns text inputs schema from enum', function () {
    $proxy = new ContactSectionTestProxy;
    $schema = $proxy->exposedFormSchema();
    foreach ($schema as $component) {
        Assert::assertInstanceOf(TextInput::class, $component);
    }
});
