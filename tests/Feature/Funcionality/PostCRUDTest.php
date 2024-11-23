<?php

namespace Tests\Feature\Funcionality;

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Routing\Route;
use Symfony\Component\Console\Input\Input;
use Tests\TestCase;

class PostCRUDTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     * @test
     */
    public function a_user_can_create_a_course(): void
    {
        $this->withoutExceptionHandling();
        $this->withoutMiddleware();
        $response = $this->post(route('courses.store'), [
            'title' => 'Curso de Laravel', 
            'description' => 'Curso de Laravel desde cero', 
            'slug' => 'curso-laravel', 
            'category' => 'Backend', 
        ]); 
        $this->assertDatabaseHas('posts', [
            'title' => 'curso de laravel',
            'description' => 'Curso de Laravel desde cero',
            'slug' => 'curso-laravel',
            'category' => 'Backend',
        ]);
        $response->dumpSession();
        $response->assertStatus(302);
    }
}
