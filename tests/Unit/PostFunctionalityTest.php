<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;
use App\Models\Post;
use PHPUnit\Framework\TestCase;

class PostFunctionalityTest extends TestCase
{
    use RefreshDatabase, InteractsWithExceptionHandling;

    /**
     * A basic unit test example.
     * @test 
    */
    public function a_user_can_create_a_post()
    {
        $this->withoutExceptionHandling();
        $post = new Post([
            'slug'=>'test-post',
            'title'=>'Test Post',
            'description'=>'This is a test post',
            'category'=>'Test',
        ]);
        
    }
}
