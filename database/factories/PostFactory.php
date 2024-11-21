<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->randomElements(["Django", "Laravel", "Ruby on Rails", "Express", "Spring", "Flask", "Symfony", "ASP.NET", "Meteor", "Phoenix"])[0],
            'slug' => $this->faker->slug(),
            'description' => $this->faker->text(),
            'is_active' => $this->faker->randomElements([0, 1])[0], // 'is_active' => $this->faker->boolean() ? '1' : '0
            'category' => $this->faker->randomElements(["Backend", "Frontend"])[0]
        ];
    }
}
