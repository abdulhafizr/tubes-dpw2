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
            'user1-128x128.jpg',
            'user2-160x160.jpg',
            'user3-128x128.jpg',
            'user4-128x128.jpg',
            'user5-128x128.jpg',
            'user6-128x128.jpg',
            'user7-128x128.jpg',
            'user8-128x128.jpg'
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
