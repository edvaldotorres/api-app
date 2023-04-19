<?php

namespace Tests\Feature\Api\v1;

use App\Models\Delivery;
use Tests\TestCase;

class DeliveryTest extends TestCase
{
    /** 
     * Test if the index route returns a list of deliveries with pagination
     * 
     * @test 
     */
    public function test_it_returns_a_list_of_deliveries(): void
    {
        // Create some test deliveries using the factory
        Delivery::factory()->count(15)->create();

        // Make a GET request to the index route
        $response = $this->getJson(route('deliveries.index'));

        // Assert that the response has a status of 200
        $response->assertStatus(200);

        // Assert that the response has the expected structure
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'title',
                    'description',
                    'delivery_date',
                    'is_delivered',
                    'created_at',
                    'updated_at',
                ]
            ],
            'links' => [
                'first',
                'last',
                'prev',
                'next',
            ],
            'meta' => [
                'current_page',
                'last_page',
                'per_page',
                'from',
                'to',
                'total',
            ]
        ]);
    }

    /** 
     * Test if the store route creates a new delivery
     * 
     * @test 
     */
    public function test_it_creates_a_new_delivery(): void
    {
        // Create a test delivery using the factory
        $delivery = Delivery::factory()->make();

        // Make a POST request to the store route
        $response = $this->postJson(route('deliveries.store'), $delivery->toArray());

        // Assert that the response has a status of 201
        $response->assertStatus(201);

        // Assert that the response has the expected structure
        $response->assertJsonStructure([
            'data' => [
                'id',
                'title',
                'description',
                'delivery_date',
                'is_delivered',
                'created_at',
                'updated_at',
            ]
        ]);
    }

    /** 
     * Test if the show route returns a single delivery
     * 
     * @test 
     */
    public function test_it_returns_a_single_delivery(): void
    {
        // Create a test delivery using the factory
        $delivery = Delivery::factory()->create();

        // Make a GET request to the show route
        $response = $this->getJson(route('deliveries.show', $delivery->id));

        // Assert that the response has a status of 200
        $response->assertStatus(200);

        // Assert that the response has the expected structure
        $response->assertJsonStructure([
            'data' => [
                'id',
                'title',
                'description',
                'delivery_date',
                'is_delivered',
                'created_at',
                'updated_at',
            ]
        ]);
    }

    /** 
     * Test if the update route updates a delivery
     * 
     * @test 
     */
    public function test_it_updates_a_delivery(): void
    {
        // Create a test delivery using the factory
        $delivery = Delivery::factory()->create();

        // Make a PUT request to the update route
        $response = $this->putJson(route('deliveries.update', $delivery->id), $delivery->toArray());

        // Assert that the response has a status of 200
        $response->assertStatus(200);

        // Assert that the response has the expected structure
        $response->assertJsonStructure([
            'data' => [
                'id',
                'title',
                'description',
                'delivery_date',
                'is_delivered',
                'created_at',
                'updated_at',
            ]
        ]);
    }

    /** 
     * Test if the destroy route deletes a delivery
     * 
     * @test 
     */
    public function test_it_deletes_a_delivery(): void
    {
        // Create a test delivery using the factory
        $delivery = Delivery::factory()->create();

        // Make a DELETE request to the destroy route
        $response = $this->deleteJson(route('deliveries.destroy', $delivery->id));

        // Assert that the response has a status of 204
        $response->assertStatus(204);
    }
}
