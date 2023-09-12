<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_user(): void
    {
        $response = $this->post('/register', [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'password' => '1231sfafdsfasf',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function test_destroy_user(): void
    {
        $user = User::factory()->create(); 

        $this->actingAs($user);

        // Execute a ação de exclusão
        $response = $this->delete('destroy');
    
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }
}

