<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Author;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_author()
    {
        $response = $this->post('/register_author', [
            'name' => fake()->name(),
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/table_author');
    }
    
    public function test_destory_author()
    {
        $author = Author::factory()->create(); // Crie um autor fictício para o teste

        $response = $this->delete("/delete_author/{$author->id}");

        $response->assertStatus(302);
        $response->assertRedirect('/table_author');
    }
}
