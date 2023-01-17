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
    public function definition()
    {
        $default_photos = [
            'students/student-1.png',
            'students/student-2.png',
            'students/student-3.png',
            'students/student-4.png',
            'students/student-5.png',
            'students/student-6.png',
            'students/student-7.png',
            'students/student-8.png'
        ];
        return [
            'teacher_id' => $this->faker->numberBetween(1, 25),
            'nis' => $this->faker->randomNumber(5, true),
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'place_of_birth' => $this->faker->city(),
            'date_of_birth' => $this->faker->date(),
            'phone' => $this->faker->phoneNumber(),
            'gender' => $this->faker->randomElement(['L', 'P']),
            'photo' => 'img/' . $default_photos[$this->faker->numberBetween(0, 7)]
        ];
    }
}
