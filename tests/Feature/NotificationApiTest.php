<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Modules\Notify\Models\NotificationTemplate;
use Modules\User\Models\User;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class, WithFaker::class);

beforeEach(function () {
    $this->user = User::factory()->create(['email' => 'test@example.com']);
    $this->actingAs($this->user);
    Http::fake();
});

afterEach(function () {
    Http::assertNothingSent();
});

describe('Notification API', function () {
    it('POST /api/notify/send sends notification', function () {
        $template = NotificationTemplate::create([
            'code' => 'api-test',
            'name' => 'API Test',
            'subject' => 'Test {{name}}',
            'body_text' => 'Hello {{name}}',
            'channels' => ['database'],
            'is_active' => true,
        ]);

        $response = $this->postJson('/api/notify/send', [
            'template_code' => 'api-test',
            'data' => ['name' => 'John'],
            'channels' => ['database'],
        ]);

        $response->assertOk()
            ->assertJsonStructure([
                'success',
                'data' => ['id', 'type', 'message'],
            ]);
    });

    it('POST /api/notify/send validates template_code', function () {
        $response = $this->postJson('/api/notify/send', [
            'data' => ['name' => 'John'],
        ]);

        $response->assertUnprocessable()
            ->assertJsonValidationErrors(['template_code']);
    });

    it('POST /api/notify/send rejects inactive template', function () {
        NotificationTemplate::create([
            'code' => 'inactive-template',
            'name' => 'Inactive',
            'subject' => 'Test',
            'body_text' => 'Test',
            'channels' => ['database'],
            'is_active' => false,
        ]);

        $response = $this->postJson('/api/notify/send', [
            'template_code' => 'inactive-template',
            'data' => [],
        ]);

        $response->assertUnprocessable();
    });

    it('GET /api/notify/templates lists active templates', function () {
        NotificationTemplate::factory()->create(['code' => 't1', 'is_active' => true]);
        NotificationTemplate::factory()->create(['code' => 't2', 'is_active' => true]);
        NotificationTemplate::factory()->create(['code' => 't3', 'is_active' => false]);

        $response = $this->getJson('/api/notify/templates');

        $response->assertOk()
            ->assertJsonStructure([
                'success',
                'data' => [
                    '*' => ['code', 'name', 'channels'],
                ],
            ]);
        expect(collect($response->json('data')))->toHaveCount(2);
    });

    it('GET /api/notify/templates/{code} shows template details', function () {
        $template = NotificationTemplate::create([
            'code' => 'detail-test',
            'name' => 'Detail Test',
            'subject' => 'Subject',
            'body_text' => 'Body',
            'channels' => ['database'],
            'is_active' => true,
        ]);

        $response = $this->getJson('/api/notify/templates/detail-test');

        $response->assertOk()
            ->assertJsonStructure([
                'success',
                'data' => ['code', 'name', 'subject', 'channels', 'is_active'],
            ]);
    });

    it('POST /api/notify/templates creates template', function () {
        $response = $this->postJson('/api/notify/templates', [
            'code' => 'new-template',
            'name' => 'New Template',
            'subject' => 'Hello {{name}}',
            'body_text' => 'Hi {{name}}',
            'body_html' => '<p>Hi {{name}}</p>',
            'channels' => ['database'],
            'is_active' => true,
        ]);

        $response->assertCreated()
            ->assertJsonStructure([
                'success',
                'data' => ['code', 'name'],
            ]);
    });

    it('PUT /api/notify/templates/{code} updates template', function () {
        $template = NotificationTemplate::create([
            'code' => 'update-test',
            'name' => 'Original',
            'subject' => 'Subject',
            'body_text' => 'Body',
            'channels' => ['database'],
            'is_active' => true,
        ]);

        $response = $this->putJson('/api/notify/templates/update-test', [
            'name' => 'Updated Name',
            'subject' => 'New Subject {{var}}',
        ]);

        $response->assertOk();
        expect($template->fresh()->name)->toBe('Updated Name');
    });

    it('DELETE /api/notify/templates/{code} deletes template', function () {
        $template = NotificationTemplate::factory()->create(['code' => 'delete-test']);

        $response = $this->deleteJson('/api/notify/templates/delete-test');

        $response->assertNoContent();
        $this->assertDatabaseMissing('notification_templates', ['code' => 'delete-test']);
    });
});