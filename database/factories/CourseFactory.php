<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   public function definition(): array
    {
        return [
                'name'       => $this->faker->sentence(3), 
                'course_title' => $this->faker->sentence(2),
                'description' => $this->faker->paragraph(),
                'branch_name' => $this->faker->randomElement(['Main Campus', 'City Center', 'Virtual Wing']),
                'is_active'   => $this->faker->boolean(80), // 80% are active by default
            ];
    }
}
