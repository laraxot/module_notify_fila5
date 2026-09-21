<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit;

use Mockery;
use Modules\Notify\Models\Policies\ContactPolicy;
use Modules\Notify\Models\Policies\MailTemplatePolicy;
use Modules\Notify\Models\Policies\NotificationPolicy;
use Modules\Notify\Models\Policies\NotificationTemplatePolicy;
use Modules\Notify\Tests\Fixtures\NotifyPolicyBehaviorConcretePolicy;
<<<<<<< HEAD
use Modules\Xot\Contracts\UserContract;
use PHPUnit\Framework\Assert;

=======
use Modules\Notify\Tests\TestCase;
use Modules\Xot\Contracts\UserContract;
use PHPUnit\Framework\Assert;

uses(TestCase::class)->group('no-notify-db');

>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
/**
 * @param  list<string>  $roles
 * @return Mockery\MockInterface&UserContract
 */
function notifyBehaviorUser(array $roles = []): UserContract
{
    /** @var Mockery\MockInterface&UserContract $user */
    $user = Mockery::mock(UserContract::class);
<<<<<<< HEAD
    mockExpectation($user, 'hasRole')
=======
    $user->shouldReceive('hasRole')
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        ->andReturnUsing(static function (array|string $richiesti) use ($roles): bool {
            /** @var list<string> $normalizzati */
            $normalizzati = is_array($richiesti) ? $richiesti : [$richiesti];

            return array_intersect($normalizzati, $roles) !== [];
        });
<<<<<<< HEAD
    mockExpectation($user, 'hasPermissionTo')->andReturn(false);
=======
    $user->shouldReceive('hasPermissionTo')->andReturn(false);
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])

    return $user;
}

afterEach(function (): void {
    Mockery::close();
});

test('NotifyBasePolicy before: super-admin bypass, altri passano a viewAny false', function (): void {
<<<<<<< HEAD
    $policy = new NotifyPolicyBehaviorConcretePolicy;
=======
    $policy = new NotifyPolicyBehaviorConcretePolicy();
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
    $super = notifyBehaviorUser(['super-admin']);
    Assert::assertTrue($policy->before($super, 'viewAny'));

    $normal = notifyBehaviorUser();
    Assert::assertNull($policy->before($normal, 'viewAny'));
    Assert::assertFalse($policy->viewAny($normal));
});

test('policy Notify vuote ereditano before super-admin da XotBasePolicy', function (): void {
    foreach ([
<<<<<<< HEAD
        new ContactPolicy,
        new NotificationPolicy,
        new MailTemplatePolicy,
        new NotificationTemplatePolicy] as $policy) {
=======
        new ContactPolicy(),
        new NotificationPolicy(),
        new MailTemplatePolicy(),
        new NotificationTemplatePolicy(),
    ] as $policy) {
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        Assert::assertTrue($policy->before(notifyBehaviorUser(['super-admin']), 'viewAny'));
        Assert::assertNull($policy->before(notifyBehaviorUser(), 'viewAny'));
    }
});
