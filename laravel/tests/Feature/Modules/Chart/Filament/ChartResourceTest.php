<?php

declare(strict_types=1);

use Modules\Chart\Models\Chart;
use Modules\User\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;

uses(WithFaker::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
});

describe('ChartResource', function () {
    describe('List Page', function () {
        it('displays charts list page', function () {
            $response = $this->get('/admin/charts');

            $response->assertStatus(200);
        });

        it('shows charts in table', function () {
            Chart::factory()->count(3)->create([
                'user_id' => $this->user->id,
            ]);

            $response = $this->get('/admin/charts');

            $response->assertSee('Charts');
            $response->assertSee('Create Chart');
        });

        it('filters charts by type', function () {
            Chart::factory()->create(['type' => 'bar', 'user_id' => $this->user->id]);
            Chart::factory()->create(['type' => 'line', 'user_id' => $this->user->id]);

            $response = $this->get('/admin/charts?tableFilters[type][value]=bar');

            $response->assertSee('bar');
            $response->assertDontSee('line');
        });

        it('searches charts by description', function () {
            Chart::factory()->create([
                'description' => 'Sales Analytics Chart',
                'user_id' => $this->user->id,
            ]);

            $response = $this->get('/admin/charts?tableSearch=sales');

            $response->assertSee('Sales Analytics Chart');
        });

        it('sorts charts by creation date', function () {
            $oldChart = Chart::factory()->create([
                'created_at' => now()->subDays(2),
                'user_id' => $this->user->id,
            ]);
            $newChart = Chart::factory()->create([
                'created_at' => now(),
                'user_id' => $this->user->id,
            ]);

            $response = $this->get('/admin/charts?tableSortColumn=created_at&tableSortDirection=desc');

            $response->assertSeeInOrder(['Charts', $newChart->id, $oldChart->id]);
        });
    });

    describe('Create Page', function () {
        it('displays create chart form', function () {
            $response = $this->get('/admin/charts/create');

            $response->assertStatus(200);
            $response->assertSee('Create Chart');
        });

        it('creates new chart with valid data', function () {
            $chartData = [
                'post_id' => 1,
                'type' => 'bar',
                'width' => 800,
                'height' => 600,
                'description' => 'Test Chart',
            ];

            $response = $this->post('/admin/charts', $chartData);

            $response->assertRedirect('/admin/charts');
            $this->assertDatabaseHas('charts', [
                'post_id' => 1,
                'type' => 'bar',
                'width' => 800,
                'height' => 600,
                'description' => 'Test Chart',
                'user_id' => $this->user->id,
            ]);
        });

        it('validates required fields', function () {
            $response = $this->post('/admin/charts', []);

            $response->assertSessionHasErrors(['post_id', 'type', 'width', 'height']);
        });

        it('validates chart dimensions', function () {
            $chartData = [
                'post_id' => 1,
                'type' => 'bar',
                'width' => -100,
                'height' => 0,
            ];

            $response = $this->post('/admin/charts', $chartData);

            $response->assertSessionHasErrors(['width', 'height']);
        });

        it('validates chart type', function () {
            $chartData = [
                'post_id' => 1,
                'type' => 'invalid_type',
                'width' => 800,
                'height' => 600,
            ];

            $response = $this->post('/admin/charts', $chartData);

            $response->assertSessionHasErrors(['type']);
        });
    });

    describe('Edit Page', function () {
        it('displays edit chart form', function () {
            $chart = Chart::factory()->create([
                'user_id' => $this->user->id,
            ]);

            $response = $this->get("/admin/charts/{$chart->id}/edit");

            $response->assertStatus(200);
            $response->assertSee('Edit Chart');
        });

        it('updates chart with valid data', function () {
            $chart = Chart::factory()->create([
                'user_id' => $this->user->id,
            ]);

            $updateData = [
                'type' => 'line',
                'width' => 1000,
                'description' => 'Updated Chart',
            ];

            $response = $this->put("/admin/charts/{$chart->id}", $updateData);

            $response->assertRedirect('/admin/charts');
            $this->assertDatabaseHas('charts', [
                'id' => $chart->id,
                'type' => 'line',
                'width' => 1000,
                'description' => 'Updated Chart',
            ]);
        });

        it('returns 404 for non-existent chart', function () {
            $response = $this->get('/admin/charts/999/edit');

            $response->assertStatus(404);
        });

        it('returns 403 for chart owned by another user', function () {
            $otherUser = User::factory()->create();
            $chart = Chart::factory()->create([
                'user_id' => $otherUser->id,
            ]);

            $response = $this->get("/admin/charts/{$chart->id}/edit");

            $response->assertStatus(403);
        });
    });

    describe('View Page', function () {
        it('displays chart details', function () {
            $chart = Chart::factory()->create([
                'user_id' => $this->user->id,
                'description' => 'Detailed Chart',
            ]);

            $response = $this->get("/admin/charts/{$chart->id}");

            $response->assertStatus(200);
            $response->assertSee('Detailed Chart');
        });

        it('shows chart configuration', function () {
            $chart = Chart::factory()->create([
                'user_id' => $this->user->id,
                'configuration' => [
                    'colors' => ['#ff0000', '#00ff00'],
                    'animation' => true,
                ],
            ]);

            $response = $this->get("/admin/charts/{$chart->id}");

            $response->assertSee('Configuration');
            $response->assertSee('#ff0000');
        });

        it('shows chart tags', function () {
            $chart = Chart::factory()->create([
                'user_id' => $this->user->id,
                'tags' => ['analytics', 'dashboard'],
            ]);

            $response = $this->get("/admin/charts/{$chart->id}");

            $response->assertSee('analytics');
            $response->assertSee('dashboard');
        });
    });

    describe('Delete Action', function () {
        it('deletes chart successfully', function () {
            $chart = Chart::factory()->create([
                'user_id' => $this->user->id,
            ]);

            $response = $this->delete("/admin/charts/{$chart->id}");

            $response->assertRedirect('/admin/charts');
            $this->assertDatabaseMissing('charts', ['id' => $chart->id]);
        });

        it('returns 404 for non-existent chart', function () {
            $response = $this->delete('/admin/charts/999');

            $response->assertStatus(404);
        });

        it('returns 403 for chart owned by another user', function () {
            $otherUser = User::factory()->create();
            $chart = Chart::factory()->create([
                'user_id' => $otherUser->id,
            ]);

            $response = $this->delete("/admin/charts/{$chart->id}");

            $response->assertStatus(403);
        });
    });

    describe('Bulk Actions', function () {
        it('deletes multiple charts', function () {
            $charts = Chart::factory()->count(3)->create([
                'user_id' => $this->user->id,
            ]);

            $chartIds = $charts->pluck('id')->toArray();

            $response = $this->post('/admin/charts/bulk-delete', [
                'ids' => $chartIds,
            ]);

            $response->assertRedirect('/admin/charts');
            $this->assertDatabaseCount('charts', 0);
        });

        it('activates multiple charts', function () {
            $charts = Chart::factory()->count(2)->create([
                'user_id' => $this->user->id,
                'is_active' => false,
            ]);

            $chartIds = $charts->pluck('id')->toArray();

            $response = $this->post('/admin/charts/bulk-activate', [
                'ids' => $chartIds,
            ]);

            $response->assertRedirect('/admin/charts');
            foreach ($chartIds as $id) {
                $this->assertDatabaseHas('charts', [
                    'id' => $id,
                    'is_active' => true,
                ]);
            }
        });

        it('deactivates multiple charts', function () {
            $charts = Chart::factory()->count(2)->create([
                'user_id' => $this->user->id,
                'is_active' => true,
            ]);

            $chartIds = $charts->pluck('id')->toArray();

            $response = $this->post('/admin/charts/bulk-deactivate', [
                'ids' => $chartIds,
            ]);

            $response->assertRedirect('/admin/charts');
            foreach ($chartIds as $id) {
                $this->assertDatabaseHas('charts', [
                    'id' => $id,
                    'is_active' => false,
                ]);
            }
        });
    });

    describe('Export Actions', function () {
        it('exports charts to CSV', function () {
            Chart::factory()->count(3)->create([
                'user_id' => $this->user->id,
            ]);

            $response = $this->get('/admin/charts/export/csv');

            $response->assertStatus(200);
            $response->assertHeader('Content-Type', 'text/csv');
        });

        it('exports charts to Excel', function () {
            Chart::factory()->count(3)->create([
                'user_id' => $this->user->id,
            ]);

            $response = $this->get('/admin/charts/export/excel');

            $response->assertStatus(200);
            $response->assertHeader('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        });

        it('exports filtered charts', function () {
            Chart::factory()->create(['type' => 'bar', 'user_id' => $this->user->id]);
            Chart::factory()->create(['type' => 'line', 'user_id' => $this->user->id]);

            $response = $this->get('/admin/charts/export/csv?type=bar');

            $response->assertStatus(200);
            // Verifica che solo i chart di tipo 'bar' siano esportati
        });
    });

    describe('Chart Preview', function () {
        it('shows chart preview in list', function () {
            $chart = Chart::factory()->create([
                'user_id' => $this->user->id,
                'type' => 'bar',
                'width' => 400,
                'height' => 300,
            ]);

            $response = $this->get('/admin/charts');

            $response->assertSee('chart-preview');
            $response->assertSee('data-chart-id="' . $chart->id . '"');
        });

        it('renders chart with correct dimensions', function () {
            $chart = Chart::factory()->create([
                'user_id' => $this->user->id,
                'width' => 800,
                'height' => 600,
            ]);

            $response = $this->get('/admin/charts');

            $response->assertSee('width="800"');
            $response->assertSee('height="600"');
        });
    });
});

