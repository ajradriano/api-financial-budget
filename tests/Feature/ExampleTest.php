<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_redirects_to_api_URI()
    {
        $response = $this->get('/');
        $response->assertRedirect('/api');
    }

    public function test_application_returns_successful_response_for_api_URI()
    {
        $response = $this->get('/api');
        $response->assertStatus(200);
    }
}
