<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Filament\Resources;
<<<<<<< HEAD
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
=======

use Filament\Actions\Action;
>>>>>>> 929ed821d (.)
use Filament\Actions\DeleteAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
<<<<<<< HEAD
=======
use Filament\Schemas\Components\View;
>>>>>>> 929ed821d (.)
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Modules\Notify\Filament\Resources\ContactResource;
<<<<<<< HEAD
use Modules\Notify\Filament\Resources\ContactResource\Pages\ListContacts;
use Modules\Notify\Filament\Resources\MailTemplateResource;
use Modules\Notify\Filament\Resources\MailTemplateResource\Pages\ListMailTemplates;
use Modules\Notify\Filament\Resources\NotificationResource;
use Modules\Notify\Filament\Resources\NotificationResource\Pages\ListNotifications;
use Modules\Notify\Filament\Resources\NotificationTemplateResource;
use Modules\Notify\Filament\Resources\NotificationTemplateResource\Pages\PreviewNotificationTemplate;
use Modules\Notify\Tests\Fixtures\EditContactTestProxy;
use Modules\Notify\Tests\Fixtures\PreviewMailTemplateTestProxy;
use Modules\Notify\Tests\Fixtures\ViewNotificationTestProxy;
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;

use function Safe\file_put_contents;
use function Safe\mkdir;

uses(\Modules\Notify\Tests\TestCase::class);

function makeEditContactTestProxy(): EditContactTestProxy
{
    return new EditContactTestProxy();
}

function makePreviewMailTemplateTestProxy(): PreviewMailTemplateTestProxy
{
    return new PreviewMailTemplateTestProxy();
}

function makeViewNotificationTestProxy(): ViewNotificationTestProxy
{
    return new ViewNotificationTestProxy();
=======
use Modules\Notify\Filament\Resources\ContactResource\Pages\EditContact;
use Modules\Notify\Filament\Resources\ContactResource\Pages\ListContacts;
use Modules\Notify\Filament\Resources\MailTemplateResource;
use Modules\Notify\Filament\Resources\MailTemplateResource\Pages\ListMailTemplates;
use Modules\Notify\Filament\Resources\MailTemplateResource\Pages\PreviewMailTemplate;
use Modules\Notify\Filament\Resources\NotificationResource;
use Modules\Notify\Filament\Resources\NotificationResource\Pages\ListNotifications;
use Modules\Notify\Filament\Resources\NotificationResource\Pages\ViewNotification;
use Modules\Notify\Filament\Resources\NotificationTemplateResource;
use Modules\Notify\Filament\Resources\NotificationTemplateResource\Pages\PreviewNotificationTemplate;
use Modules\Notify\Tests\TestCase;

uses(TestCase::class);

function makeEditContactTestProxy(): EditContact
{
    return new class extends EditContact
    {
        public function exposedHeaderActions(): array
        {
            return $this->getHeaderActions();
        }
    };
}

function makePreviewMailTemplateTestProxy(): PreviewMailTemplate
{
    return new class extends PreviewMailTemplate
    {
        public function exposedHeaderActions(): array
        {
            return $this->getHeaderActions();
        }
    };
}

function makeViewNotificationTestProxy(): ViewNotification
{
    return new class extends ViewNotification
    {
        public function exposedInfolistSchema(): array
        {
            return $this->getInfolistSchema();
        }
    };
>>>>>>> 929ed821d (.)
}

function makePreviewNotificationTemplateTestProxy(): PreviewNotificationTemplate
{
    return new class extends PreviewNotificationTemplate {};
}

test('contact resource form schema exposes expected fields', function (): void {
<<<<<<< HEAD
    $schema = \assertNotifyArray(ContactResource::getFormSchema());

    Assert::assertArrayHasKey('name', $schema);
    Assert::assertArrayHasKey('email', $schema);
    Assert::assertArrayHasKey('phone', $schema);
=======
    $schema = ContactResource::getFormSchema();

    expect($schema)->toBeArray()
        ->and($schema)->toHaveKey('name')
        ->and($schema)->toHaveKey('email')
        ->and($schema)->toHaveKey('phone');
>>>>>>> 929ed821d (.)
});

test('edit contact page exposes delete header action', function (): void {
    $page = makeEditContactTestProxy();
<<<<<<< HEAD
    $actions = \assertNotifyArray($page->exposedHeaderActions());

    Assert::assertArrayHasKey('delete', $actions);
    Assert::assertInstanceOf(DeleteAction::class, $actions['delete']);
=======
    $actions = $page->exposedHeaderActions();

    expect($actions)->toBeArray()
        ->and($actions)->toHaveKey('delete')
        ->and($actions['delete'])->toBeInstanceOf(DeleteAction::class);
>>>>>>> 929ed821d (.)
});

test('list contacts page exposes expected table columns and filters', function (): void {
    $page = new ListContacts;

<<<<<<< HEAD
    $columns = \assertNotifyArray($page->getTableColumns());
    $filters = \assertNotifyArray($page->getTableFilters());

    Assert::assertArrayHasKey('id', $columns);
    Assert::assertInstanceOf(TextColumn::class, $columns['id']);
    Assert::assertArrayHasKey('is_read', $columns);
    Assert::assertInstanceOf(IconColumn::class, $columns['is_read']);
    Assert::assertArrayHasKey('active', $filters);
    Assert::assertInstanceOf(Filter::class, $filters['active']);
    Assert::assertArrayHasKey('inactive', $filters);
    Assert::assertInstanceOf(Filter::class, $filters['inactive']);
=======
    $columns = $page->getTableColumns();
    $filters = $page->getTableFilters();

    expect($columns)->toBeArray()
        ->and($columns)->toHaveKey('id')
        ->and($columns['id'])->toBeInstanceOf(TextColumn::class)
        ->and($columns)->toHaveKey('is_read')
        ->and($columns['is_read'])->toBeInstanceOf(IconColumn::class)
        ->and($filters)->toBeArray()
        ->and($filters)->toHaveKey('active')
        ->and($filters['active'])->toBeInstanceOf(Filter::class)
        ->and($filters)->toHaveKey('inactive')
        ->and($filters['inactive'])->toBeInstanceOf(Filter::class);
>>>>>>> 929ed821d (.)
});

test('list mail templates page exposes expected table columns', function (): void {
    $page = new ListMailTemplates;
<<<<<<< HEAD
    $columns = \assertNotifyArray($page->getTableColumns());

    Assert::assertArrayHasKey('slug', $columns);
    Assert::assertInstanceOf(TextColumn::class, $columns['slug']);
    Assert::assertArrayHasKey('subject', $columns);
    Assert::assertInstanceOf(TextColumn::class, $columns['subject']);
    Assert::assertArrayHasKey('counter', $columns);
    Assert::assertInstanceOf(TextColumn::class, $columns['counter']);
=======
    $columns = $page->getTableColumns();

    expect($columns)->toBeArray()
        ->and($columns)->toHaveKey('slug')
        ->and($columns['slug'])->toBeInstanceOf(TextColumn::class)
        ->and($columns)->toHaveKey('subject')
        ->and($columns['subject'])->toBeInstanceOf(TextColumn::class)
        ->and($columns)->toHaveKey('counter')
        ->and($columns['counter'])->toBeInstanceOf(TextColumn::class);
>>>>>>> 929ed821d (.)
});

test('preview mail template page title and header actions are configured', function (): void {
    $page = makePreviewMailTemplateTestProxy();
    $actions = $page->exposedHeaderActions();

<<<<<<< HEAD
    $actions = array_values(\assertNotifyArray($actions));
    Assert::assertCount(1, $actions);
    Assert::assertInstanceOf(Action::class, $actions[0]);
=======
    expect($page->getTitle())->toBeString()
        ->and($actions)->toBeArray()
        ->and($actions)->toHaveCount(1)
        ->and($actions[0])->toBeInstanceOf(Action::class);
>>>>>>> 929ed821d (.)
});

test('list notifications page exposes expected columns and filters', function (): void {
    $page = new ListNotifications;

<<<<<<< HEAD
    $columns = \assertNotifyArray($page->getTableColumns());
    $filters = \assertNotifyArray($page->getTableFilters());

    Assert::assertArrayHasKey('id', $columns);
    Assert::assertInstanceOf(TextColumn::class, $columns['id']);
    Assert::assertArrayHasKey('type', $columns);
    Assert::assertInstanceOf(TextColumn::class, $columns['type']);
    Assert::assertArrayHasKey('read', $filters);
    Assert::assertInstanceOf(Filter::class, $filters['read']);
    Assert::assertArrayHasKey('unread', $filters);
    Assert::assertInstanceOf(Filter::class, $filters['unread']);
    Assert::assertArrayHasKey('type', $filters);
    Assert::assertInstanceOf(SelectFilter::class, $filters['type']);
=======
    $columns = $page->getTableColumns();
    $filters = $page->getTableFilters();

    expect($columns)->toBeArray()
        ->and($columns)->toHaveKey('id')
        ->and($columns['id'])->toBeInstanceOf(TextColumn::class)
        ->and($columns)->toHaveKey('type')
        ->and($columns['type'])->toBeInstanceOf(TextColumn::class)
        ->and($filters)->toBeArray()
        ->and($filters)->toHaveKey('read')
        ->and($filters['read'])->toBeInstanceOf(Filter::class)
        ->and($filters)->toHaveKey('unread')
        ->and($filters['unread'])->toBeInstanceOf(Filter::class)
        ->and($filters)->toHaveKey('type')
        ->and($filters['type'])->toBeInstanceOf(SelectFilter::class);
>>>>>>> 929ed821d (.)
});

test('view notification page infolist schema contains section with text entries', function (): void {
    $page = makeViewNotificationTestProxy();
    $schema = $page->exposedInfolistSchema();

<<<<<<< HEAD
    Assert::assertCount(1, $schema);
    Assert::assertInstanceOf(Section::class, $schema[0]);
=======
    expect($schema)->toBeArray()
        ->and($schema[0])->toBeInstanceOf(Section::class);
>>>>>>> 929ed821d (.)

    $reflection = new \ReflectionClass($schema[0]);
    $prop = $reflection->getProperty('childComponents');
    $prop->setAccessible(true);
<<<<<<< HEAD
    $components = \assertNotifyArray($prop->getValue($schema[0]));

    Assert::assertNotEmpty($components);
=======
    $components = $prop->getValue($schema[0]);
    expect($components)->toBeArray()
        ->and($components)->not->toBeEmpty();
>>>>>>> 929ed821d (.)
});

test('mail template resource form schema exposes expected components', function (): void {
    $mailLayoutsPath = base_path('Themes/Meetup/resources/mail-layouts');
    if (! is_dir($mailLayoutsPath)) {
        mkdir($mailLayoutsPath, 0777, true);
    }
    $fixture = $mailLayoutsPath.'/test-layout.html';
    if (! file_exists($fixture)) {
        file_put_contents($fixture, '<html><body>layout</body></html>');
    }

<<<<<<< HEAD
    $schema = \assertNotifyArray(MailTemplateResource::getFormSchema());

    Assert::assertArrayHasKey('mailable_slug_group', $schema);
    Assert::assertInstanceOf(Group::class, $schema['mailable_slug_group']);
    Assert::assertArrayHasKey('subject', $schema);
    Assert::assertInstanceOf(TextInput::class, $schema['subject']);
    Assert::assertArrayHasKey('html_layout_path', $schema);
    Assert::assertArrayHasKey('html_template', $schema);
    Assert::assertInstanceOf(RichEditor::class, $schema['html_template']);
    Assert::assertArrayHasKey('params_display', $schema);
    Assert::assertArrayHasKey('text_template', $schema);
    Assert::assertInstanceOf(Textarea::class, $schema['text_template']);
});

test('notification resource form schema exposes expected components', function (): void {
    $schema = \assertNotifyArray(NotificationResource::getFormSchema());

    Assert::assertArrayHasKey('type', $schema);
    Assert::assertInstanceOf(TextInput::class, $schema['type']);
    Assert::assertArrayHasKey('data', $schema);
    Assert::assertInstanceOf(Textarea::class, $schema['data']);
    Assert::assertArrayHasKey('read_at', $schema);
    Assert::assertInstanceOf(DateTimePicker::class, $schema['read_at']);
});

test('notification template resource form schema and pages are configured', function (): void {
    $schema = \assertNotifyArray(NotificationTemplateResource::getFormSchema());
    $pages = \assertNotifyArray(NotificationTemplateResource::getPages());

    Assert::assertArrayHasKey('name', $schema);
    Assert::assertInstanceOf(TextInput::class, $schema['name']);
    Assert::assertArrayHasKey('type', $schema);
    Assert::assertInstanceOf(Select::class, $schema['type']);
    Assert::assertArrayHasKey('attachments', $schema);
    Assert::assertInstanceOf(SpatieMediaLibraryFileUpload::class, $schema['attachments']);
    Assert::assertArrayHasKey('preview', $pages);
=======
    $schema = MailTemplateResource::getFormSchema();

    expect($schema)->toBeArray()
        ->and($schema)->toHaveKey('mailable_slug_group')
        ->and($schema['mailable_slug_group'])->toBeInstanceOf(Group::class)
        ->and($schema)->toHaveKey('subject')
        ->and($schema['subject'])->toBeInstanceOf(TextInput::class)
        ->and($schema)->toHaveKey('html_layout_path')
        ->and($schema)->toHaveKey('html_template')
        ->and($schema['html_template'])->toBeInstanceOf(RichEditor::class)
        ->and($schema)->toHaveKey('params_display')
        ->and($schema['params_display'])->toBeInstanceOf(View::class)
        ->and($schema)->toHaveKey('text_template')
        ->and($schema['text_template'])->toBeInstanceOf(Textarea::class);
});

test('notification resource form schema exposes expected components', function (): void {
    $schema = NotificationResource::getFormSchema();

    expect($schema)->toBeArray()
        ->and($schema)->toHaveKey('type')
        ->and($schema['type'])->toBeInstanceOf(TextInput::class)
        ->and($schema)->toHaveKey('data')
        ->and($schema['data'])->toBeInstanceOf(Textarea::class)
        ->and($schema)->toHaveKey('read_at')
        ->and($schema['read_at'])->toBeInstanceOf(DateTimePicker::class);
});

test('notification template resource form schema and pages are configured', function (): void {
    $schema = NotificationTemplateResource::getFormSchema();
    $pages = NotificationTemplateResource::getPages();

    expect($schema)->toBeArray()
        ->and($schema)->toHaveKey('name')
        ->and($schema['name'])->toBeInstanceOf(TextInput::class)
        ->and($schema)->toHaveKey('type')
        ->and($schema['type'])->toBeInstanceOf(Select::class)
        ->and($schema)->toHaveKey('attachments')
        ->and($schema['attachments'])->toBeInstanceOf(SpatieMediaLibraryFileUpload::class)
        ->and($pages)->toBeArray()
        ->and($pages)->toHaveKey('preview');
>>>>>>> 929ed821d (.)
});

test('preview notification template page exposes title and subheading', function (): void {
    $page = makePreviewNotificationTemplateTestProxy();

<<<<<<< HEAD
    Assert::assertNotSame('', $page->getTitle());
    Assert::assertNotSame('', $page->getSubheading());
});

=======
    expect($page->getTitle())->toBeString()
        ->and($page->getSubheading())->toBeString();
});
>>>>>>> 929ed821d (.)
