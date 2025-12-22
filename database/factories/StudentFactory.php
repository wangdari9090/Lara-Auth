<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_code' => 'STD-' . $this->faker->unique()->numberBetween(1000, 9999),
            'student_name' => $this->faker->name(),
            'course'       => $this->faker->randomElement([
                'Computer Science',
                'Business Administration',
                'Engineering',
                'Information Technology'
            ]),
            'branch_name'  => $this->faker->randomElement([
                'Main Branch',
                'City Branch',
                'North Branch'
            ]),
            'status'       => $this->faker->randomElement(['active', 'inactive']),
            'created_at'   => now(),
            'updated_at'   => now(),
        ];
    }
}
