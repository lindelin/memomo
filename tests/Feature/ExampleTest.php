<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);

        $formData = [
            'name' => 'test user',
            'email' => 'test-user@lindelin.org',
            'password' => '123456',
            'password_confirmation' => '123456',
        ];

        $response = $this->post('/register', $formData);
        $response->assertStatus(302);
        $this->assertDatabaseHas('users', $formData);
    }
}
