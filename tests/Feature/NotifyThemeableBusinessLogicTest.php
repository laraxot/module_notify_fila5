<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Feature;

use Illuminate\Database\Eloquent\Relations\MorphTo;
use Modules\Notify\Database\Factories\NotifyThemeableFactory;
use Modules\Notify\Database\Factories\NotifyThemeFactory;
use Modules\Notify\Models\NotifyThemeable;
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
=======
uses(TestCase::class)->group('notify-db');

>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
function notifyThemeableTestDomain(): string
{
    $domain = config('app.domain', 'example.com');

    return is_string($domain) ? $domain : 'example.com';
}

function notifyThemeableTestAppName(): string
{
    $name = config('app.name', 'Platform');

    return is_string($name) ? $name : 'Platform';
}

describe('Notify Themeable Business Logic', function () {
    it('can create notify themeable with basic information', function () {
        $theme = NotifyThemeFactory::new()->createOne();

        $themeableData = [
            'model_type' => 'App\Models\NotificationTemplate',
            'model_id' => 123,
            'notify_theme_id' => $theme->id,
            'created_by' => 'admin@'.notifyThemeableTestDomain(),
<<<<<<< HEAD
            'updated_by' => 'admin@'.notifyThemeableTestDomain()];
=======
            'updated_by' => 'admin@'.notifyThemeableTestDomain(),
        ];
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

        $themeable = NotifyThemeable::create($themeableData);

        Assert::assertSame('App\Models\NotificationTemplate', $themeable->model_type);
        Assert::assertSame(123, $themeable->model_id);
        Assert::assertSame($theme->id, $themeable->notify_theme_id);
    });

    it('can manage polymorphic relationships', function () {
        $theme = NotifyThemeFactory::new()->createOne();

        $themeable = NotifyThemeableFactory::new()->createOne([
            'model_type' => 'App\Models\EmailTemplate',
            'model_id' => 456,
<<<<<<< HEAD
            'notify_theme_id' => $theme->id]);
=======
            'notify_theme_id' => $theme->id,
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

        Assert::assertSame('App\Models\EmailTemplate', $themeable->model_type);
        Assert::assertSame(456, $themeable->model_id);
        Assert::assertInstanceOf(MorphTo::class, $themeable->morphTo());
    });

    it('can handle different model types', function () {
        $theme = NotifyThemeFactory::new()->createOne();

        $modelTypes = [
            'App\Models\NotificationTemplate',
            'App\Models\EmailTemplate',
            'App\Models\SmsTemplate',
            'App\Models\PushTemplate',
<<<<<<< HEAD
            'App\Models\WhatsappTemplate'];
=======
            'App\Models\WhatsappTemplate',
        ];
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

        foreach ($modelTypes as $index => $modelType) {
            $themeable = NotifyThemeableFactory::new()->createOne([
                'model_type' => $modelType,
                'model_id' => $index + 1,
<<<<<<< HEAD
                'notify_theme_id' => $theme->id]);
=======
                'notify_theme_id' => $theme->id,
            ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

            Assert::assertSame($modelType, $themeable->model_type);
            Assert::assertSame($index + 1, $themeable->model_id);
        }
    });

    it('can manage theme relationships', function () {
        $appName = notifyThemeableTestAppName();
        $themeLabel = $appName.' Professional';
        $theme = NotifyThemeFactory::new()->createOne([
            'subject' => $themeLabel,
<<<<<<< HEAD
            'body' => 'Tema professionale per '.$appName]);

        $themeable = NotifyThemeableFactory::new()->createOne([
            'notify_theme_id' => $theme->id]);
=======
            'body' => 'Tema professionale per '.$appName,
        ]);

        $themeable = NotifyThemeableFactory::new()->createOne([
            'notify_theme_id' => $theme->id,
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

        $linkedTheme = TestCase::notifyThemeForThemeable($themeable);
        Assert::assertSame($theme->id, $linkedTheme->id);
        Assert::assertSame($themeLabel, $linkedTheme->subject);
    });

    it('can handle user tracking', function () {
        $theme = NotifyThemeFactory::new()->createOne();

        $themeable = NotifyThemeableFactory::new()->createOne([
            'notify_theme_id' => $theme->id,
            'created_by' => 'developer@'.notifyThemeableTestDomain(),
<<<<<<< HEAD
            'updated_by' => 'admin@'.notifyThemeableTestDomain()]);
=======
            'updated_by' => 'admin@'.notifyThemeableTestDomain(),
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

        Assert::assertSame('developer@'.notifyThemeableTestDomain(), $themeable->created_by);
        Assert::assertSame('admin@'.notifyThemeableTestDomain(), $themeable->updated_by);
        Assert::assertNotNull($themeable->created_at);
        Assert::assertNotNull($themeable->updated_at);
    });

    it('can manage multiple theme assignments', function () {
        $theme1 = NotifyThemeFactory::new()->createOne(['subject' => 'Tema 1']);
        $theme2 = NotifyThemeFactory::new()->createOne(['subject' => 'Tema 2']);
        $theme3 = NotifyThemeFactory::new()->createOne(['subject' => 'Tema 3']);

<<<<<<< HEAD
        $themeable1 = NotifyThemeableFactory::new()->createOne([
            'model_type' => 'App\Models\NotificationTemplate',
            'model_id' => 123,
            'notify_theme_id' => $theme1->id]);

        $themeable2 = NotifyThemeableFactory::new()->createOne([
            'model_type' => 'App\Models\NotificationTemplate',
            'model_id' => 123,
            'notify_theme_id' => $theme2->id]);

        $themeable3 = NotifyThemeableFactory::new()->createOne([
            'model_type' => 'App\Models\NotificationTemplate',
            'model_id' => 123,
            'notify_theme_id' => $theme3->id]);
=======
        NotifyThemeableFactory::new()->createOne([
            'model_type' => 'App\Models\NotificationTemplate',
            'model_id' => 123,
            'notify_theme_id' => $theme1->id,
        ]);

        NotifyThemeableFactory::new()->createOne([
            'model_type' => 'App\Models\NotificationTemplate',
            'model_id' => 123,
            'notify_theme_id' => $theme2->id,
        ]);

        NotifyThemeableFactory::new()->createOne([
            'model_type' => 'App\Models\NotificationTemplate',
            'model_id' => 123,
            'notify_theme_id' => $theme3->id,
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

        Assert::assertCount(3, NotifyThemeable::where('model_type', 'App\Models\NotificationTemplate')->where('model_id', 123)->get());
    });

    it('can handle theme switching', function () {
        $oldTheme = NotifyThemeFactory::new()->createOne(['subject' => 'Tema Vecchio']);
        $newTheme = NotifyThemeFactory::new()->createOne(['subject' => 'Tema Nuovo']);

        $themeable = NotifyThemeableFactory::new()->createOne([
<<<<<<< HEAD
            'notify_theme_id' => $oldTheme->id]);
=======
            'notify_theme_id' => $oldTheme->id,
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

        Assert::assertSame($oldTheme->id, $themeable->notify_theme_id);
        Assert::assertSame('Tema Vecchio', TestCase::notifyThemeForThemeable($themeable)->subject);
        $themeable->update([
            'notify_theme_id' => $newTheme->id,
<<<<<<< HEAD
            'updated_by' => 'admin@'.notifyThemeableTestDomain()]);
=======
            'updated_by' => 'admin@'.notifyThemeableTestDomain(),
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

        Assert::assertSame($newTheme->id, $themeable->notify_theme_id);
        Assert::assertSame('Tema Nuovo', TestCase::notifyThemeForThemeable($themeable)->subject);
        Assert::assertSame('admin@'.notifyThemeableTestDomain(), $themeable->updated_by);
    });

    it('can handle empty or null values gracefully', function () {
        $theme = NotifyThemeFactory::new()->createOne();

        $themeable = NotifyThemeableFactory::new()->createOne([
            'notify_theme_id' => $theme->id,
            'model_type' => null,
            'model_id' => null,
            'created_by' => null,
<<<<<<< HEAD
            'updated_by' => null]);
=======
            'updated_by' => null,
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

        Assert::assertNull($themeable->model_type);
        Assert::assertNull($themeable->model_id);
        Assert::assertNull($themeable->created_by);
        Assert::assertNull($themeable->updated_by);
        Assert::assertNotNull($themeable->notify_theme_id);
    });

    it('can validate model type consistency', function () {
        $theme = NotifyThemeFactory::new()->createOne();

        $validModelTypes = [
            'App\Models\NotificationTemplate',
            'App\Models\EmailTemplate',
            'App\Models\SmsTemplate',
            'App\Models\PushNotification',
            'App\Models\WhatsappMessage',
<<<<<<< HEAD
            'App\Models\InAppNotification'];
=======
            'App\Models\InAppNotification',
        ];
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

        foreach ($validModelTypes as $modelType) {
            $themeable = NotifyThemeableFactory::new()->createOne([
                'model_type' => $modelType,
                'model_id' => rand(1, 1000),
<<<<<<< HEAD
                'notify_theme_id' => $theme->id]);
=======
                'notify_theme_id' => $theme->id,
            ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

            Assert::assertSame($modelType, $themeable->model_type);
            Assert::assertContains($modelType, $validModelTypes);
        }
    });

    it('can manage theme inheritance', function () {
        $parentTheme = NotifyThemeFactory::new()->createOne([
            'subject' => 'Tema Base',
<<<<<<< HEAD
            'body' => 'Tema base per tutte le notifiche']);

        $childTheme = NotifyThemeFactory::new()->createOne([
            'subject' => 'Tema Specializzato',
            'body' => 'Tema specializzato per appuntamenti']);
=======
            'body' => 'Tema base per tutte le notifiche',
        ]);

        $childTheme = NotifyThemeFactory::new()->createOne([
            'subject' => 'Tema Specializzato',
            'body' => 'Tema specializzato per appuntamenti',
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

        $baseThemeable = NotifyThemeableFactory::new()->createOne([
            'model_type' => 'App\Models\NotificationTemplate',
            'model_id' => 123,
<<<<<<< HEAD
            'notify_theme_id' => $parentTheme->id]);
=======
            'notify_theme_id' => $parentTheme->id,
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

        $specializedThemeable = NotifyThemeableFactory::new()->createOne([
            'model_type' => 'App\Models\NotificationTemplate',
            'model_id' => 123,
<<<<<<< HEAD
            'notify_theme_id' => $childTheme->id]);
=======
            'notify_theme_id' => $childTheme->id,
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

        Assert::assertSame('Tema Base', TestCase::notifyThemeForThemeable($baseThemeable)->subject);
        Assert::assertSame('Tema Specializzato', TestCase::notifyThemeForThemeable($specializedThemeable)->subject);
        Assert::assertSame($specializedThemeable->model_type, $baseThemeable->model_type);
        Assert::assertSame($specializedThemeable->model_id, $baseThemeable->model_id);
    });

    it('can handle theme removal', function () {
        $theme = NotifyThemeFactory::new()->createOne();

        $themeable = NotifyThemeableFactory::new()->createOne([
<<<<<<< HEAD
            'notify_theme_id' => $theme->id]);
=======
            'notify_theme_id' => $theme->id,
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

        Assert::assertNotNull($themeable->notify_theme_id);
        Assert::assertSame($theme->id, $themeable->notify_theme_id);
        $themeable->update([
            'notify_theme_id' => null,
<<<<<<< HEAD
            'updated_by' => 'admin@'.notifyThemeableTestDomain()]);
=======
            'updated_by' => 'admin@'.notifyThemeableTestDomain(),
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

        Assert::assertNull($themeable->notify_theme_id);
        Assert::assertSame('admin@'.notifyThemeableTestDomain(), $themeable->updated_by);
    });

    it('can manage audit trail', function () {
        $theme = NotifyThemeFactory::new()->createOne();

        $themeable = NotifyThemeableFactory::new()->createOne([
            'notify_theme_id' => $theme->id,
<<<<<<< HEAD
            'created_by' => 'developer@'.notifyThemeableTestDomain()]);
=======
            'created_by' => 'developer@'.notifyThemeableTestDomain(),
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

        Assert::assertSame('developer@'.notifyThemeableTestDomain(), $themeable->created_by);
        Assert::assertNotNull($themeable->created_at);
        $themeable->update([
<<<<<<< HEAD
            'updated_by' => 'admin@'.notifyThemeableTestDomain()]);
=======
            'updated_by' => 'admin@'.notifyThemeableTestDomain(),
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

        Assert::assertSame('admin@'.notifyThemeableTestDomain(), $themeable->updated_by);
        Assert::assertNotNull($themeable->updated_at);
        Assert::assertTrue($themeable->created_at->lte($themeable->updated_at));
    });

    it('can handle bulk theme operations', function () {
        $theme1 = NotifyThemeFactory::new()->createOne(['subject' => 'Tema 1']);
        $theme2 = NotifyThemeFactory::new()->createOne(['subject' => 'Tema 2']);
<<<<<<< HEAD
        $theme3 = NotifyThemeFactory::new()->createOne(['subject' => 'Tema 3']);
=======
        NotifyThemeFactory::new()->createOne(['subject' => 'Tema 3']);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

        $modelIds = [101, 102, 103, 104, 105];

        foreach ($modelIds as $modelId) {
            NotifyThemeableFactory::new()->createOne([
                'model_type' => 'App\Models\NotificationTemplate',
                'model_id' => $modelId,
<<<<<<< HEAD
                'notify_theme_id' => $theme1->id]);
=======
                'notify_theme_id' => $theme1->id,
            ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        }

        $theme1Assignments = NotifyThemeable::where('notify_theme_id', $theme1->id)->get();
        Assert::assertCount(5, $theme1Assignments);
        NotifyThemeable::where('notify_theme_id', $theme1->id)->update([
            'notify_theme_id' => $theme2->id,
<<<<<<< HEAD
            'updated_by' => 'admin@'.notifyThemeableTestDomain()]);
=======
            'updated_by' => 'admin@'.notifyThemeableTestDomain(),
        ]);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

        $theme2Assignments = NotifyThemeable::where('notify_theme_id', $theme2->id)->get();
        Assert::assertCount(5, $theme2Assignments);
        foreach ($theme2Assignments as $assignment) {
            Assert::assertSame('admin@'.notifyThemeableTestDomain(), $assignment->updated_by);
        }
    });
});
