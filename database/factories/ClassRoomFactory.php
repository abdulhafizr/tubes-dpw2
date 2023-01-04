<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClassRoom>
 */
class ClassRoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $classes = [
            'IPA',
            'IPS'
        ];
        $class = $classes[$this->faker->numberBetween(0, 1)] . ' ' .
            $this->faker->numberBetween(10, 12) . ' ' .
            $this->faker->randomElement(['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U']);
        $class_code = join('-', explode(' ', $class));
        return [
            'code' => $class_code,
            'name' => $class,
            'tables_amount' => 30,
            'chairs_amount' => 30,
            'projector_amount' => 1,
            'ac_amount' => 1,
            'clipboard_amount' => 3,
            'photo' => 'img/class_rooms/class room ' . $this->faker->numberBetween(1, 5) . '.png'
        ];
    }
}
