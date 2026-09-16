<<<<<<< HEAD
<<<<<<< HEAD
# Testing $MOD

## Quick Start

```bash
./vendor/bin/pest Modules/$MOD/tests
./vendor/bin/pest Modules/$MOD/tests --filter="TestName"
```

## Coverage

Coverage report: docs/coverage.md (auto-generated).

Target: ≥85% coverage.

See Xot module (TESTING.md) for base test patterns.
=======
=======
>>>>>>> laraxot/dev
---
title: "Notify Module Testing"
type: guide
tags: [notify, testing, pest]
created: 2026-07-28
---

# Notify Module — Testing

```php
test('sends welcome notification', function () {
    Notification::fake();
    $user = User::factory()->create();

    $user->notify(new WelcomeNotification());

    Notification::assertSentTo($user, WelcomeNotification::class);
});
```
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
