<?php

declare(strict_types=1);

namespace Tests\Feature\Modules\Chart\Api;

use Tests\TestCase;
use Tests\Support\Traits\ModuleTestTrait;
use Modules\Chart\Models\Chart;
use Modules\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class ChartApiTest extends TestCase
{
    use RefreshDatabase, WithFaker, ModuleTestTrait;

    protected User $user;
    protected Chart $chart;

    protected function setUp(): void
    {
        parent::setUp();
        $this->setUpModuleTest();
        $this->user = $this->createAuthenticatedUser();
        $this->chart = Chart::factory()->create();
    }

    /** @test */
    public function it_can_list_charts(): void
    {
        Chart::factory()->count(3)->create();

        $response = $this->actingAs($this->user)
            ->getJson('/api/charts');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'post_id',
                        'post_type',
                        'type',
                        'width',
                        'height',
                        'color',
                        'bg_color',
                        'font_family',
                        'font_size',
                        'font_style',
                        'y_grace',
                        'yaxis_hide',
                        'list_color',
                        'grace',
                        'x_label_angle',
                        'show_box',
                        'x_label_margin',
                        'plot_perc_width',
                        'plot_value_show',
                        'plot_value_format',
                        'plot_value_pos',
                        'plot_value_color',
                        'group_by',
                        'sort_by',
                        'transparency',
                        'colors',
                        'created_at',
                        'updated_at',
                    ]
                ],
                'links',
                'meta'
            ]);

        $this->assertCount(4, $response->json('data')); // 3 + 1 dal setUp
    }

    /** @test */
    public function it_can_show_single_chart(): void
    {
        $response = $this->actingAs($this->user)
            ->getJson("/api/charts/{$this->chart->id}");

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $this->chart->id,
                    'post_id' => $this->chart->post_id,
                    'type' => $this->chart->type,
                    'width' => $this->chart->width,
                    'height' => $this->chart->height,
                ]
            ]);
    }

    /** @test */
    public function it_can_create_chart(): void
    {
        $chartData = [
            'post_id' => 1,
            'post_type' => 'post',
            'type' => 'bar',
            'width' => 800,
            'height' => 600,
            'color' => '#000000',
            'bg_color' => '#ffffff',
            'font_family' => 'Arial',
            'font_size' => 12,
            'font_style' => 'normal',
            'y_grace' => 0.1,
            'yaxis_hide' => false,
            'list_color' => '#666666',
            'grace' => 0.05,
            'x_label_angle' => 0,
            'show_box' => true,
            'x_label_margin' => 5,
            'plot_perc_width' => 0.8,
            'plot_value_show' => true,
            'plot_value_format' => '%.1f',
            'plot_value_pos' => 'top',
            'plot_value_color' => '#000000',
            'group_by' => 'category',
            'sort_by' => 'value',
            'transparency' => 0.8,
            'colors' => ['#ff0000', '#00ff00', '#0000ff'],
        ];

        $response = $this->actingAs($this->user)
            ->postJson('/api/charts', $chartData);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'post_id',
                    'post_type',
                    'type',
                    'width',
                    'height',
                    'color',
                    'bg_color',
                    'font_family',
                    'font_size',
                    'font_style',
                    'y_grace',
                    'yaxis_hide',
                    'list_color',
                    'grace',
                    'x_label_angle',
                    'show_box',
                    'x_label_margin',
                    'plot_perc_width',
                    'plot_value_show',
                    'plot_value_format',
                    'plot_value_pos',
                    'plot_value_color',
                    'group_by',
                    'sort_by',
                    'transparency',
                    'colors',
                    'created_at',
                    'updated_at',
                ]
            ]);

        $this->assertDatabaseHas('charts', [
            'post_id' => 1,
            'post_type' => 'post',
            'type' => 'bar',
            'width' => 800,
            'height' => 600,
        ]);
    }

    /** @test */
    public function it_can_update_chart(): void
    {
        $updateData = [
            'type' => 'line',
            'width' => 1000,
            'height' => 800,
            'color' => '#ff0000',
            'bg_color' => '#f0f0f0',
        ];

        $response = $this->actingAs($this->user)
            ->putJson("/api/charts/{$this->chart->id}", $updateData);

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $this->chart->id,
                    'type' => 'line',
                    'width' => 1000,
                    'height' => 800,
                    'color' => '#ff0000',
                    'bg_color' => '#f0f0f0',
                ]
            ]);

        $this->assertDatabaseHas('charts', [
            'id' => $this->chart->id,
            'type' => 'line',
            'width' => 1000,
            'height' => 800,
            'color' => '#ff0000',
            'bg_color' => '#f0f0f0',
        ]);
    }

    /** @test */
    public function it_can_delete_chart(): void
    {
        $response = $this->actingAs($this->user)
            ->deleteJson("/api/charts/{$this->chart->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('charts', [
            'id' => $this->chart->id,
        ]);
    }

    /** @test */
    public function it_validates_required_fields_on_create(): void
    {
        $response = $this->actingAs($this->user)
            ->postJson('/api/charts', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors([
                'post_id',
                'post_type',
                'type',
                'width',
                'height',
            ]);
    }

    /** @test */
    public function it_validates_field_types_on_create(): void
    {
        $invalidData = [
            'post_id' => 'invalid',
            'post_type' => 123,
            'type' => 456,
            'width' => 'invalid',
            'height' => 'invalid',
            'color' => 123,
            'bg_color' => 456,
            'font_size' => 'invalid',
            'y_grace' => 'invalid',
            'yaxis_hide' => 'invalid',
            'show_box' => 'invalid',
            'x_label_margin' => 'invalid',
            'plot_perc_width' => 'invalid',
            'plot_value_show' => 'invalid',
            'transparency' => 'invalid',
        ];

        $response = $this->actingAs($this->user)
            ->postJson('/api/charts', $invalidData);

        $response->assertStatus(422)
            ->assertJsonValidationErrors([
                'post_id',
                'post_type',
                'type',
                'width',
                'height',
                'color',
                'bg_color',
                'font_size',
                'y_grace',
                'yaxis_hide',
                'show_box',
                'x_label_margin',
                'plot_perc_width',
                'plot_value_show',
                'transparency',
            ]);
    }

    /** @test */
    public function it_validates_field_ranges_on_create(): void
    {
        $invalidData = [
            'post_id' => 1,
            'post_type' => 'post',
            'type' => 'bar',
            'width' => -100,
            'height' => 0,
            'font_size' => 0,
            'y_grace' => 2.0,
            'grace' => -0.1,
            'x_label_angle' => 91,
            'x_label_margin' => -10,
            'plot_perc_width' => 1.5,
            'transparency' => 2.0,
        ];

        $response = $this->actingAs($this->user)
            ->postJson('/api/charts', $invalidData);

        $response->assertStatus(422)
            ->assertJsonValidationErrors([
                'width',
                'height',
                'font_size',
                'y_grace',
                'grace',
                'x_label_angle',
                'x_label_margin',
                'plot_perc_width',
                'transparency',
            ]);
    }

    /** @test */
    public function it_validates_enum_values_on_create(): void
    {
        $invalidData = [
            'post_id' => 1,
            'post_type' => 'invalid_type',
            'type' => 'invalid_chart_type',
            'width' => 800,
            'height' => 600,
            'font_style' => 'invalid_style',
            'plot_value_pos' => 'invalid_position',
            'group_by' => 'invalid_group',
            'sort_by' => 'invalid_sort',
        ];

        $response = $this->actingAs($this->user)
            ->postJson('/api/charts', $invalidData);

        $response->assertStatus(422)
            ->assertJsonValidationErrors([
                'post_type',
                'type',
                'font_style',
                'plot_value_pos',
                'group_by',
                'sort_by',
            ]);
    }

    /** @test */
    public function it_validates_colors_array_on_create(): void
    {
        $invalidData = [
            'post_id' => 1,
            'post_type' => 'post',
            'type' => 'bar',
            'width' => 800,
            'height' => 600,
            'colors' => 'invalid_colors',
        ];

        $response = $this->actingAs($this->user)
            ->postJson('/api/charts', $invalidData);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['colors']);
    }

    /** @test */
    public function it_validates_hex_color_format(): void
    {
        $invalidData = [
            'post_id' => 1,
            'post_type' => 'post',
            'type' => 'bar',
            'width' => 800,
            'height' => 600,
            'color' => 'invalid_color',
            'bg_color' => '#invalid',
            'list_color' => 'not_hex',
            'plot_value_color' => '123456',
        ];

        $response = $this->actingAs($this->user)
            ->postJson('/api/charts', $invalidData);

        $response->assertStatus(422)
            ->assertJsonValidationErrors([
                'color',
                'bg_color',
                'list_color',
                'plot_value_color',
            ]);
    }

    /** @test */
    public function it_can_filter_charts_by_type(): void
    {
        Chart::factory()->create(['type' => 'bar']);
        Chart::factory()->create(['type' => 'line']);
        Chart::factory()->create(['type' => 'pie']);

        $response = $this->actingAs($this->user)
            ->getJson('/api/charts?type=bar');

        $response->assertStatus(200);
        $data = $response->json('data');
        
        foreach ($data as $chart) {
            $this->assertEquals('bar', $chart['type']);
        }
    }

    /** @test */
    public function it_can_filter_charts_by_post_type(): void
    {
        Chart::factory()->create(['post_type' => 'post']);
        Chart::factory()->create(['post_type' => 'page']);
        Chart::factory()->create(['post_type' => 'article']);

        $response = $this->actingAs($this->user)
            ->getJson('/api/charts?post_type=post');

        $response->assertStatus(200);
        $data = $response->json('data');
        
        foreach ($data as $chart) {
            $this->assertEquals('post', $chart['post_type']);
        }
    }

    /** @test */
    public function it_can_filter_charts_by_post_id(): void
    {
        Chart::factory()->create(['post_id' => 100]);
        Chart::factory()->create(['post_id' => 200]);
        Chart::factory()->create(['post_id' => 300]);

        $response = $this->actingAs($this->user)
            ->getJson('/api/charts?post_id=100');

        $response->assertStatus(200);
        $data = $response->json('data');
        
        foreach ($data as $chart) {
            $this->assertEquals(100, $chart['post_id']);
        }
    }

    /** @test */
    public function it_can_sort_charts_by_created_at(): void
    {
        $oldChart = Chart::factory()->create(['created_at' => now()->subDays(2)]);
        $newChart = Chart::factory()->create(['created_at' => now()]);

        $response = $this->actingAs($this->user)
            ->getJson('/api/charts?sort=created_at&order=desc');

        $response->assertStatus(200);
        $data = $response->json('data');
        
        $this->assertEquals($newChart->id, $data[0]['id']);
        $this->assertEquals($oldChart->id, $data[1]['id']);
    }

    /** @test */
    public function it_can_paginate_charts(): void
    {
        Chart::factory()->count(25)->create();

        $response = $this->actingAs($this->user)
            ->getJson('/api/charts?per_page=10&page=2');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data',
                'links',
                'meta' => [
                    'current_page',
                    'from',
                    'last_page',
                    'per_page',
                    'to',
                    'total',
                ]
            ]);

        $meta = $response->json('meta');
        $this->assertEquals(2, $meta['current_page']);
        $this->assertEquals(10, $meta['per_page']);
        $this->assertEquals(26, $meta['total']); // 25 + 1 dal setUp
    }

    /** @test */
    public function it_returns_404_for_nonexistent_chart(): void
    {
        $response = $this->actingAs($this->user)
            ->getJson('/api/charts/99999');

        $response->assertStatus(404);
    }

    /** @test */
    public function it_returns_404_for_nonexistent_chart_on_update(): void
    {
        $response = $this->actingAs($this->user)
            ->putJson('/api/charts/99999', ['type' => 'line']);

        $response->assertStatus(404);
    }

    /** @test */
    public function it_returns_404_for_nonexistent_chart_on_delete(): void
    {
        $response = $this->actingAs($this->user)
            ->deleteJson('/api/charts/99999');

        $response->assertStatus(404);
    }

    /** @test */
    public function it_requires_authentication(): void
    {
        $response = $this->getJson('/api/charts');
        $response->assertStatus(401);

        $response = $this->postJson('/api/charts', []);
        $response->assertStatus(401);

        $response = $this->putJson('/api/charts/1', []);
        $response->assertStatus(401);

        $response = $this->deleteJson('/api/charts/1');
        $response->assertStatus(401);
    }

    /** @test */
    public function it_can_search_charts_by_multiple_criteria(): void
    {
        Chart::factory()->create([
            'type' => 'bar',
            'post_type' => 'post',
            'width' => 800,
        ]);

        Chart::factory()->create([
            'type' => 'line',
            'post_type' => 'page',
            'width' => 1000,
        ]);

        $response = $this->actingAs($this->user)
            ->getJson('/api/charts?type=bar&post_type=post&width=800');

        $response->assertStatus(200);
        $data = $response->json('data');
        
        $this->assertCount(1, $data);
        $this->assertEquals('bar', $data[0]['type']);
        $this->assertEquals('post', $data[0]['post_type']);
        $this->assertEquals(800, $data[0]['width']);
    }

    /** @test */
    public function it_can_get_chart_statistics(): void
    {
        Chart::factory()->count(5)->create(['type' => 'bar']);
        Chart::factory()->count(3)->create(['type' => 'line']);
        Chart::factory()->count(2)->create(['type' => 'pie']);

        $response = $this->actingAs($this->user)
            ->getJson('/api/charts/statistics');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'total_charts',
                    'charts_by_type',
                    'charts_by_post_type',
                    'average_dimensions',
                ]
            ]);

        $data = $response->json('data');
        $this->assertEquals(11, $data['total_charts']); // 5 + 3 + 2 + 1 dal setUp
        $this->assertEquals(5, $data['charts_by_type']['bar']);
        $this->assertEquals(3, $data['charts_by_type']['line']);
        $this->assertEquals(2, $data['charts_by_type']['pie']);
    }

    /** @test */
    public function it_can_bulk_update_charts(): void
    {
        $charts = Chart::factory()->count(3)->create(['type' => 'bar']);
        $chartIds = $charts->pluck('id')->toArray();

        $updateData = [
            'ids' => $chartIds,
            'updates' => [
                'type' => 'line',
                'color' => '#ff0000',
            ]
        ];

        $response = $this->actingAs($this->user)
            ->putJson('/api/charts/bulk-update', $updateData);

        $response->assertStatus(200);

        foreach ($chartIds as $id) {
            $this->assertDatabaseHas('charts', [
                'id' => $id,
                'type' => 'line',
                'color' => '#ff0000',
            ]);
        }
    }

    /** @test */
    public function it_can_bulk_delete_charts(): void
    {
        $charts = Chart::factory()->count(3)->create();
        $chartIds = $charts->pluck('id')->toArray();

        $response = $this->actingAs($this->user)
            ->deleteJson('/api/charts/bulk-delete', ['ids' => $chartIds]);

        $response->assertStatus(204);

        foreach ($chartIds as $id) {
            $this->assertDatabaseMissing('charts', ['id' => $id]);
        }
    }

    /** @test */
    public function it_validates_bulk_operations(): void
    {
        $response = $this->actingAs($this->user)
            ->putJson('/api/charts/bulk-update', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['ids', 'updates']);

        $response = $this->actingAs($this->user)
            ->deleteJson('/api/charts/bulk-delete', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['ids']);
    }

    /** @test */
    public function it_can_export_charts(): void
    {
        Chart::factory()->count(5)->create();

        $response = $this->actingAs($this->user)
            ->getJson('/api/charts/export?format=csv');

        $response->assertStatus(200)
            ->assertHeader('Content-Type', 'text/csv; charset=UTF-8')
            ->assertHeader('Content-Disposition', 'attachment; filename="charts.csv"');

        $response = $this->actingAs($this->user)
            ->getJson('/api/charts/export?format=json');

        $response->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json');
    }

    /** @test */
    public function it_validates_export_format(): void
    {
        $response = $this->actingAs($this->user)
            ->getJson('/api/charts/export?format=invalid');

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['format']);
    }
}

