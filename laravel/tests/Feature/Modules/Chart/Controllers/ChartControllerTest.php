<?php

declare(strict_types=1);

use Modules\Chart\Models\Chart;
use Modules\User\Models\User;
use Illuminate\Foundation\Testing\WithFaker;

uses(WithFaker::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
});

describe('ChartController', function () {
    describe('GET /api/charts', function () {
        it('returns all charts for authenticated user', function () {
            Chart::factory()->count(3)->create([
                'user_id' => $this->user->id,
            ]);

            $response = $this->getJson('/api/charts');

            $response->assertStatus(200)
                ->assertJsonCount(3)
                ->assertJsonStructure([
                    '*' => ['id', 'post_id', 'type', 'width', 'height', 'user_id', 'created_at', 'updated_at']
                ]);
        });

        it('returns empty array when user has no charts', function () {
            $response = $this->getJson('/api/charts');

            $response->assertStatus(200)
                ->assertJsonCount(0);
        });

        it('filters charts by type', function () {
            Chart::factory()->create(['type' => 'bar', 'user_id' => $this->user->id]);
            Chart::factory()->create(['type' => 'line', 'user_id' => $this->user->id]);

            $response = $this->getJson('/api/charts?type=bar');

            $response->assertStatus(200)
                ->assertJsonCount(1)
                ->assertJsonPath('0.type', 'bar');
        });

        it('paginates results when specified', function () {
            Chart::factory()->count(15)->create([
                'user_id' => $this->user->id,
            ]);

            $response = $this->getJson('/api/charts?per_page=10');

            $response->assertStatus(200)
                ->assertJsonCount(10)
                ->assertJsonPath('meta.per_page', 10);
        });
    });

    describe('GET /api/charts/{id}', function () {
        it('returns specific chart', function () {
            $chart = Chart::factory()->create([
                'user_id' => $this->user->id,
            ]);

            $response = $this->getJson("/api/charts/{$chart->id}");

            $response->assertStatus(200)
                ->assertJson([
                    'id' => $chart->id,
                    'type' => $chart->type,
                    'user_id' => $this->user->id,
                ]);
        });

        it('returns 404 for non-existent chart', function () {
            $response = $this->getJson('/api/charts/999');

            $response->assertStatus(404);
        });

        it('returns 403 for chart owned by another user', function () {
            $otherUser = User::factory()->create();
            $chart = Chart::factory()->create([
                'user_id' => $otherUser->id,
            ]);

            $response = $this->getJson("/api/charts/{$chart->id}");

            $response->assertStatus(403);
        });
    });

    describe('POST /api/charts', function () {
        it('creates new chart with valid data', function () {
            $chartData = [
                'post_id' => 1,
                'type' => 'bar',
                'width' => 800,
                'height' => 600,
            ];

            $response = $this->postJson('/api/charts', $chartData);

            $response->assertStatus(201)
                ->assertJson([
                    'post_id' => 1,
                    'type' => 'bar',
                    'width' => 800,
                    'height' => 600,
                    'user_id' => $this->user->id,
                ]);

            $this->assertDatabaseHas('charts', [
                'post_id' => 1,
                'type' => 'bar',
                'width' => 800,
                'height' => 600,
                'user_id' => $this->user->id,
            ]);
        });

        it('validates required fields', function () {
            $response = $this->postJson('/api/charts', []);

            $response->assertStatus(422)
                ->assertJsonValidationErrors(['post_id', 'type', 'width', 'height']);
        });

        it('validates chart dimensions are positive', function () {
            $chartData = [
                'post_id' => 1,
                'type' => 'bar',
                'width' => -100,
                'height' => 0,
            ];

            $response = $this->postJson('/api/charts', $chartData);

            $response->assertStatus(422)
                ->assertJsonValidationErrors(['width', 'height']);
        });

        it('validates chart type is valid', function () {
            $chartData = [
                'post_id' => 1,
                'type' => 'invalid_type',
                'width' => 800,
                'height' => 600,
            ];

            $response = $this->postJson('/api/charts', $chartData);

            $response->assertStatus(422)
                ->assertJsonValidationErrors(['type']);
        });
    });

    describe('PUT /api/charts/{id}', function () {
        it('updates existing chart', function () {
            $chart = Chart::factory()->create([
                'user_id' => $this->user->id,
            ]);

            $updateData = [
                'type' => 'line',
                'width' => 1000,
            ];

            $response = $this->putJson("/api/charts/{$chart->id}", $updateData);

            $response->assertStatus(200)
                ->assertJson([
                    'id' => $chart->id,
                    'type' => 'line',
                    'width' => 1000,
                ]);

            $this->assertDatabaseHas('charts', [
                'id' => $chart->id,
                'type' => 'line',
                'width' => 1000,
            ]);
        });

        it('returns 404 for non-existent chart', function () {
            $response = $this->putJson('/api/charts/999', ['type' => 'line']);

            $response->assertStatus(404);
        });

        it('returns 403 for chart owned by another user', function () {
            $otherUser = User::factory()->create();
            $chart = Chart::factory()->create([
                'user_id' => $otherUser->id,
            ]);

            $response = $this->putJson("/api/charts/{$chart->id}", ['type' => 'line']);

            $response->assertStatus(403);
        });

        it('validates update data', function () {
            $chart = Chart::factory()->create([
                'user_id' => $this->user->id,
            ]);

            $response = $this->putJson("/api/charts/{$chart->id}", [
                'width' => -100,
            ]);

            $response->assertStatus(422)
                ->assertJsonValidationErrors(['width']);
        });
    });

    describe('DELETE /api/charts/{id}', function () {
        it('deletes chart and returns 204', function () {
            $chart = Chart::factory()->create([
                'user_id' => $this->user->id,
            ]);

            $response = $this->deleteJson("/api/charts/{$chart->id}");

            $response->assertStatus(204);

            $this->assertDatabaseMissing('charts', ['id' => $chart->id]);
        });

        it('returns 404 for non-existent chart', function () {
            $response = $this->deleteJson('/api/charts/999');

            $response->assertStatus(404);
        });

        it('returns 403 for chart owned by another user', function () {
            $otherUser = User::factory()->create();
            $chart = Chart::factory()->create([
                'user_id' => $otherUser->id,
            ]);

            $response = $this->deleteJson("/api/charts/{$chart->id}");

            $response->assertStatus(403);
        });
    });

    describe('POST /api/charts/{id}/duplicate', function () {
        it('duplicates existing chart', function () {
            $chart = Chart::factory()->create([
                'user_id' => $this->user->id,
                'type' => 'bar',
                'width' => 800,
                'height' => 600,
            ]);

            $response = $this->postJson("/api/charts/{$chart->id}/duplicate");

            $response->assertStatus(201)
                ->assertJson([
                    'type' => 'bar',
                    'width' => 800,
                    'height' => 600,
                    'user_id' => $this->user->id,
                ])
                ->assertJsonMissing(['id' => $chart->id]);

            $this->assertDatabaseCount('charts', 2);
        });

        it('returns 404 for non-existent chart', function () {
            $response = $this->postJson('/api/charts/999/duplicate');

            $response->assertStatus(404);
        });
    });

    describe('GET /api/charts/statistics', function () {
        it('returns chart statistics for user', function () {
            Chart::factory()->count(3)->create(['type' => 'bar', 'user_id' => $this->user->id]);
            Chart::factory()->count(2)->create(['type' => 'line', 'user_id' => $this->user->id]);

            $response = $this->getJson('/api/charts/statistics');

            $response->assertStatus(200)
                ->assertJson([
                    'total' => 5,
                    'by_type' => [
                        'bar' => 3,
                        'line' => 2,
                    ],
                ]);
        });

        it('returns empty statistics for user with no charts', function () {
            $response = $this->getJson('/api/charts/statistics');

            $response->assertStatus(200)
                ->assertJson([
                    'total' => 0,
                    'by_type' => [],
                ]);
        });
    });
});

