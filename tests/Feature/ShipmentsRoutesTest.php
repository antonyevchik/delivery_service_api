<?php

namespace Tests\Feature;

use App\Models\DeliveryService;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShipmentsRoutesTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->make();
        $this->actingAs($this->user);

        DeliveryService::factory()->create([
            'name'        => 'Nova Poshta',
            'description' => 'Nova Poshta Delivery Service'
        ]);
    }

    /**
     * @test
     */
    public function it_fetches_list_of_shipments()
    {
        $this->json('GET', route('shipments.index', ['delivery' => 1]), [
            'sender'   => 1,
            'search'   => $this->faker->word,

        ])->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'description',
                        'weight',
                        'size',
                    ]
                ],
                'meta' => [
                    'current_page',
                    'path',
                    'per_page',
                    'to',
                    'total',
                ]
            ]);
    }

    /**
     * @test
     */
    public function it_can_be_found_by_id()
    {
        $this->json('GET', route('shipments.find-by-id', ['delivery' => 1, 'shipment' => 1]), [
            'sender'   => 1
        ])->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'description',
                    'weight',
                    'size',
                ]
            ]);
    }

    /**
     * @test
     */
    public function it_stores_shipment_info_to_service()
    {
        $this->json('POST', route('shipments.store', ['delivery' => 1]), [
            'sender'   => 1,
            'receiver' => 2,
            'shipment' => [
                'description' => $this->faker->sentence,
                'weight'      => $this->faker->numberBetween(1, 10),
                'size'        => '10x15x20'
            ]
        ])->assertStatus(201);
    }

    /**
     * @test
     */
    public function it_updates_shipment_info_to_service()
    {
        $this->json('PUT', route('shipments.update', ['delivery' => 1, 'shipment' => 1]), [
            'sender'   => 1,
            'receiver' => 2
        ])->assertStatus(200);
    }

    /**
     * @test
     */
    public function it_deletes_shipment_info_to_service()
    {
        $this->json('DELETE', route('shipments.destroy', ['delivery' => 1, 'shipment' => 1]))
            ->assertStatus(204);
    }
}
