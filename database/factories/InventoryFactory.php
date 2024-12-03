<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventory>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_barang' => fake()->randomElement(['proyektor', 'sapu', 'spidol', 'printer']) . ' ' . fake()->randomDigitNotZero(),
            'category_id' => fake()->numberBetween(1, 4),
            'kuota' => fake()->numberBetween(0, 100)
        ];
    }
}
