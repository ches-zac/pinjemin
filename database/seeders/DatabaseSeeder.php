<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'nama' => 'rara',
            'email' => 'rara@mail.co',
            'password' => Hash::make('adminra'),
            'no_telp' => '02100998877',
            'role' => 'admin'
        ]);
    }
}
