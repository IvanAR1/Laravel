<?php

namespace Tests\Unit;

use App\Models\Post;
use PHPUnit\Framework\TestCase;

class PostModelFunctionalityTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_attributes_are_set_correctly()
   {
        // create a new post instance with attributes
        $post = new Post([
            'slug'=>'test-post',
            'title'=>'Test Post',
            'description'=>'This is a test post',
            'category'=>'Test',
        ]);

        // check if you set the attributes correctly
        $this->assertEquals('test-post', $post->slug);
        $this->assertEquals('Test Post', $post->title);
        $this->assertEquals('This is a test post', $post->description);
        $this->assertEquals('Test', $post->category);
   }

   public function test_non_fillable_attributes_are_not_set()
   {
        //Attempt to update a post with guarded attribute
        $post = new Post([
            'slug'=>'test-post',
            'title'=>'Test Post',
            'description'=>'This is a test post',
            'category'=>'Test',
            'is_active'=>1,
       ]);

        // check if the guarded attribute is not set
        $this->assertNull($post->is_active);
   }
}
