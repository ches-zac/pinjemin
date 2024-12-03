<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lending>
 */
class LendingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1, 10),
            'inventory_id' => fake()->numberBetween(1,10),
            'ruangan' => 'ruang ' . fake()->numberBetween(1, 20),
            'jam' => fake()->dateTimeBetween('07:00:00', '15:00:00')->format('H:i:s'),
            'tanggal_peminjaman' => fake()->dateTimeBetween('-1 year', '+1 month'),
            'status' => fake()->randomElement(['sudah dipesan', 'belum dikembalikan', 'sudah dikembalikan'])
        ];
    }
}
