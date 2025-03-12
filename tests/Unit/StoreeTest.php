<?php

namespace Tests\Unit;

use App\Models\Itinerary;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreeTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    public function test_store_if_data_is_correct(): void
    {
        $response = $this->postJson('api/login', [
            'email' => 'wissam@gmail.com',
            'password' => '123456789'
        ]);

        $response->assertStatus(401);
    }
}
