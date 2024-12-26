<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventControllerTest extends TestCase
{

    public function test_store_validation_errors()
    {
        // Simulate a POST request with invalid data
        $data = [
            'user_id' => '', // Invalid: user_id is required
            'event_name' => '', // Invalid: event_name is required
            // 'payload' is nullable, so it's okay to omit it or make it an empty array.
        ];

        $response = $this->postJson('/api/v1/event', $data); // Replace with your actual route

        $response->assertStatus(422);

        // Assert that the validation error messages are present
        $response->assertJsonValidationErrors(['user_id', 'event_name']);
    }

    /**
     * Test the store (POST) route with valid data and successful creation.
     *
     * @return void
     */
    public function test_store_successful_creation()
    {
        // Simulate valid data for the request
        $data = [
            'user_id' => 1, // Valid user_id
            'event_name' => 'Sample Event', // Valid event_name
            'payload' => ['key' => 'value'], // Valid payload, nullable but here it's an array
        ];

        $response = $this->postJson('/api/v1/event', $data); // Replace with your actual route

        $response->assertStatus(201);

        $response->assertJson([
            'message' => 'Event stored successfully',
        ]);
    }    
}
