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
    public function definition()
    {
        $courses = [
            'Matematika',
            'Pendidikan Agama',
            'PPKn',
            'Bahasa Indonesia',
            'IPA',
            'IPS',
            'Bahasa Inggris',
            'Seni dan Prakarya',
            'Pendidikan Jasmani',
            'Informatika'
        ];
        return [
            'name' => $courses[$this->faker->randomDigit()],
            'teacher_id' => $this->faker->numberBetween(1, 25),
            'start_time' => $this->faker->numberBetween(4, 12) . ':' . $this->faker->numberBetween(0, 60),
            'end_time' => $this->faker->numberBetween(4, 12) . ':' . $this->faker->numberBetween(0, 60),
            'class_name' => 'IPA ' . $this->faker->numberBetween(7, 9) . $this->faker->randomElement(['A', 'B', 'C']),
        ];
    }
}
