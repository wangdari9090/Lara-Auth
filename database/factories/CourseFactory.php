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
                'title'       => $this->faker->sentence(3), 
                'description' => $this->faker->paragraph(),
                'department'  => $this->faker->randomElement(['Computer Science', 'Business', 'Engineering', 'Arts']),
                'branch_name' => $this->faker->randomElement(['Main Campus', 'City Center', 'Virtual Wing']),
                'is_active'   => $this->faker->boolean(80), // 80% are active by default
            ];
    }
}
