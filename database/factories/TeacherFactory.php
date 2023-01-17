<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $default_photos = [
            'teachers/teacher-1.png',
            'teachers/teacher-2.png',
            'teachers/teacher-3.png',
            'teachers/teacher-4.png',
            'teachers/teacher-5.png',
            'teachers/teacher-6.png',
            'teachers/teacher-7.png',
            'teachers/teacher-8.png'
        ];
        return [
            'nip' => $this->faker->randomNumber(5, true),
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
