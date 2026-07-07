<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Set the correct user model for authentication
        config(['auth.providers.users.model' => \Modules\User\Models\User::class]);
        
        // Migrate all databases including module databases
        $this->artisan('migrate', ['--seed' => false]);
    }

    /**
     * Create a user using the correct User model
     */
    protected function createUser(array $attributes = []): \Modules\User\Models\User
    {
        return \Modules\User\Models\User::factory()->create($attributes);
    }

    /**
     * Act as a user for testing
     */
    protected function actingAsUser(\Modules\User\Models\User $user = null): static
    {
        $user = $user ?: $this->createUser();
        return $this->actingAs($user);
    }
}
