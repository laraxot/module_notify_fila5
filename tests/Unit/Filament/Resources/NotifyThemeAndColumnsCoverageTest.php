<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Filament\Resources;

use Filament\Actions\DeleteAction;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Filters\SelectFilter;
use Modules\Notify\Filament\Resources\NotificationTemplateResource\Pages\ListNotificationTemplates;
use Modules\Notify\Filament\Resources\NotifyThemeResource;
<<<<<<< HEAD
use Modules\Notify\Filament\Resources\NotifyThemeResource\Pages\ListNotifyThemes;
use Modules\Notify\Tests\Fixtures\EditNotifyThemeTestProxy;
use Modules\Notify\Filament\Resources\NotifyThemeResource\RelationManagers\LinkableRelationManager;
use Modules\Notify\Filament\Tables\Columns\ContactColumn;
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(\Modules\Notify\Tests\TestCase::class);

function makeEditNotifyThemeTestProxy(): EditNotifyThemeTestProxy
{
    return new EditNotifyThemeTestProxy();
=======
use Modules\Notify\Filament\Resources\NotifyThemeResource\Pages\EditNotifyTheme;
use Modules\Notify\Filament\Resources\NotifyThemeResource\Pages\ListNotifyThemes;
use Modules\Notify\Filament\Resources\NotifyThemeResource\RelationManagers\LinkableRelationManager;
use Modules\Notify\Filament\Tables\Columns\ContactColumn;
use Modules\Notify\Tests\TestCase;

uses(TestCase::class);

function makeEditNotifyThemeTestProxy(): EditNotifyTheme
{
    return new class extends EditNotifyTheme
    {
        public function exposedHeaderActions(): array
        {
            return $this->getHeaderActions();
        }
    };
>>>>>>> 929ed821d (.)
}

test('list notification templates page returns empty table columns array', function (): void {
    $page = new ListNotificationTemplates;
<<<<<<< HEAD
    $columns = $page->getTableColumns();
    Assert::assertSame([], $columns);
});

test('notify theme resource field options are configured', function (): void {
    Assert::assertArrayHasKey('it', NotifyThemeResource::fieldOptions('lang'));
    Assert::assertArrayHasKey('email', NotifyThemeResource::fieldOptions('type'));
    Assert::assertArrayHasKey('page', NotifyThemeResource::fieldOptions('post_type'));
=======

    expect($page->getTableColumns())->toBeArray()
        ->and($page->getTableColumns())->toBe([]);
});

test('notify theme resource field options are configured', function (): void {
    expect(NotifyThemeResource::fieldOptions('lang'))->toBe([
        'it' => 'Italiano',
        'en' => 'English',
    ])->and(NotifyThemeResource::fieldOptions('type'))->toBe([
        'email' => 'Email',
        'sms' => 'SMS',
        'push' => 'Push Notification',
    ])->and(NotifyThemeResource::fieldOptions('post_type'))->toBe([
        'page' => 'Page',
        'post' => 'Post',
        'product' => 'Product',
    ])->and(NotifyThemeResource::fieldOptions('unknown'))->toBe([]);
>>>>>>> 929ed821d (.)
});

test('notify theme resource form schema exposes expected components', function (): void {
    $schema = NotifyThemeResource::getFormSchema();
<<<<<<< HEAD
    Assert::assertArrayHasKey('post_id', $schema);
    Assert::assertInstanceOf(TextInput::class, $schema['post_id']);
    Assert::assertArrayHasKey('logo', $schema);
    Assert::assertInstanceOf(SpatieMediaLibraryFileUpload::class, $schema['logo']);
    Assert::assertArrayHasKey('body', $schema);
    Assert::assertInstanceOf(Textarea::class, $schema['body']);
    Assert::assertArrayHasKey('body_html', $schema);
    Assert::assertInstanceOf(RichEditor::class, $schema['body_html']);
    Assert::assertArrayHasKey('lang', $schema);
    Assert::assertInstanceOf(Select::class, $schema['lang']);
=======

    expect($schema)->toBeArray()
        ->and($schema)->toHaveKey('lang')
        ->and($schema['lang'])->toBeInstanceOf(Select::class)
        ->and($schema)->toHaveKey('post_id')
        ->and($schema['post_id'])->toBeInstanceOf(TextInput::class)
        ->and($schema)->toHaveKey('logo')
        ->and($schema['logo'])->toBeInstanceOf(SpatieMediaLibraryFileUpload::class)
        ->and($schema)->toHaveKey('body')
        ->and($schema['body'])->toBeInstanceOf(Textarea::class)
        ->and($schema)->toHaveKey('body_html')
        ->and($schema['body_html'])->toBeInstanceOf(RichEditor::class);
>>>>>>> 929ed821d (.)
});

test('edit notify theme page exposes delete header action', function (): void {
    $page = makeEditNotifyThemeTestProxy();
    $actions = $page->exposedHeaderActions();

<<<<<<< HEAD
    Assert::assertArrayHasKey('delete', $actions);
    Assert::assertInstanceOf(DeleteAction::class, $actions['delete']);
=======
    expect($actions)->toBeArray()
        ->and($actions)->toHaveKey('delete')
        ->and($actions['delete'])->toBeInstanceOf(DeleteAction::class);
>>>>>>> 929ed821d (.)
});

test('list notify themes columns and filters are configured', function (): void {
    $columns = ListNotifyThemes::getNotifyThemeTableColumns();
    $page = new ListNotifyThemes;
    $filters = $page->getTableFilters();
<<<<<<< HEAD
    Assert::assertArrayHasKey('id', $columns);
    Assert::assertInstanceOf(TextColumn::class, $columns['id']);
    Assert::assertArrayHasKey('lang', $columns);
    Assert::assertArrayHasKey('type', $columns);
    Assert::assertArrayHasKey('post_type', $columns);
    Assert::assertArrayHasKey('lang', $filters);
    Assert::assertInstanceOf(SelectFilter::class, $filters['lang']);
    Assert::assertArrayHasKey('post_type', $filters);
    Assert::assertInstanceOf(SelectFilter::class, $filters['post_type']);
    Assert::assertArrayHasKey('type', $filters);
    Assert::assertInstanceOf(SelectFilter::class, $filters['type']);
=======

    expect($columns)->toBeArray()
        ->and($columns)->toHaveKey('id')
        ->and($columns['id'])->toBeInstanceOf(TextColumn::class)
        ->and($columns)->toHaveKey('lang')
        ->and($columns)->toHaveKey('type')
        ->and($columns)->toHaveKey('post_type')
        ->and($filters)->toBeArray()
        ->and($filters)->toHaveKey('lang')
        ->and($filters['lang'])->toBeInstanceOf(SelectFilter::class)
        ->and($filters)->toHaveKey('post_type')
        ->and($filters['post_type'])->toBeInstanceOf(SelectFilter::class)
        ->and($filters)->toHaveKey('type')
        ->and($filters['type'])->toBeInstanceOf(SelectFilter::class);
>>>>>>> 929ed821d (.)
});

test('linkable relation manager exposes text input form schema', function (): void {
    $manager = new LinkableRelationManager;
    $schema = $manager->getFormSchema();
<<<<<<< HEAD
    Assert::assertNotEmpty($schema);
    Assert::assertInstanceOf(TextInput::class, $schema[0]);
=======

    expect($schema)->toBeArray()
        ->and($schema[0])->toBeInstanceOf(TextInput::class);
>>>>>>> 929ed821d (.)
});

test('contact column is a view column with expected name', function (): void {
    $column = ContactColumn::make('contact');

<<<<<<< HEAD
    Assert::assertInstanceOf(ViewColumn::class, $column);
    Assert::assertSame('contact', $column->getName());
=======
    expect($column)->toBeInstanceOf(ViewColumn::class)
        ->and($column->getName())->toBe('contact');
>>>>>>> 929ed821d (.)
});
