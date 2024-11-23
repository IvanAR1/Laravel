<?php

namespace Tests\Feature\Integration;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CourseIndexIntegrationTest extends TestCase
{
    /** @test */
    public function it_can_display_a_listing_of_courses()
    {
        $response = $this->get(route('courses.index'));
        $response->assertStatus(200);
        $response->assertViewIs('courses.principal');
        $response->assertViewHas('courses');
        $response->assertViewHas('keys');
    }

    /** @test */
    public function it_can_display_a_listing_of_courses_with_the_correct_keys()
    {
        $response = $this->get(route('courses.index'));
        $response->assertStatus(200);
        $response->assertViewIs('courses.principal');
        $response->assertViewHas('courses');
        $response->assertViewHas('keys');
        $courses = $response->original->getData()['courses'];
        $keys = $response->original->getData()['keys'];
        $this->assertEquals(array_keys($courses->first()->toArray()), $keys);
    }
}
