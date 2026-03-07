<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 2 utilisateurs connus pour la démo
        User::updateOrCreate(
            ['email' => 'alice@example.com'],
            ['name' => 'Alice Demo', 'password' => Hash::make('password')]
        );

        User::updateOrCreate(
            ['email' => 'bob@example.com'],
            ['name' => 'Bob Demo', 'password' => Hash::make('password')]
        );

        User::updateOrCreate(
            ['email' => 'leona@test'],
            ['name' => 'Leona', 'password' => 'sgwn9fv2']
        );

        // + 3 utilisateurs aléatoires
        User::factory(3)->create();
    }
}
