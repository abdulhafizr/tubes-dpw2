<?php

namespace Database\Factories;

use App\Models\Inventory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Inventory>
 */
class InventoryFactory extends Factory
{
    private $index = 0;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $inventories = [
            'Meja Guru',
            'Kursi Guru',
            'Meja Murid',
            'Kursi Murid',
            'Papan Tulis',
            'Projektor',
            'AC'
        ];
        $inventory = $inventories[$this->index];
        $this->index++;
        return [
            'name' => $inventory,
            'total' => $this->faker->numberBetween(5, 15),
            'stock' => $this->faker->numberBetween(1, 5),
            'used' => $this->faker->numberBetween(1, 5),
            'broken' => $this->faker->numberBetween(1, 5),
            'photo' => 'img/inventories/' . strtolower($inventory) . '.png'
        ];
    }
}
