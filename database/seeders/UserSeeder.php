<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Andrew Oroh',
            'email' => 'andrew.oroh@binus.ac.id',
            'password' => Hash::make('password'),
            'role' => 'Admin',
            'address' => fake()->address(),
            'dob' => fake()->date('Y-m-d', '-8 years')
        ]);

        User::create([
            'name' => 'Elyssa Davina Giovanni',
            'email' => 'elyssa.giovanni@binus.ac.id',
            'password' => Hash::make('password'),
            'role' => 'Admin',
            'address' => fake()->address(),
            'dob' => fake()->date('Y-m-d', '-8 years')
        ]);

        User::create([
            'name' => 'Everlyn Kuolimpo',
            'email' => 'everlyn.kuolimpo@binus.ac.id',
            'password' => Hash::make('password'),
            'role' => 'Admin',
            'address' => fake()->address(),
            'dob' => fake()->date('Y-m-d', '-8 years')
        ]);

        User::create([
            'name' => 'Fico Pangestu',
            'email' => 'fico.pangestu@binus.ac.id',
            'password' => Hash::make('password'),
            'role' => 'Admin',
            'address' => fake()->address(),
            'dob' => fake()->date('Y-m-d', '-8 years')
        ]);

        User::create([
            'name' => 'Guido William',
            'email' => 'guido.william@binus.ac.id',
            'password' => Hash::make('password'),
            'role' => 'Admin',
            'address' => fake()->address(),
            'dob' => fake()->date('Y-m-d', '-8 years')
        ]);

        User::factory(45)->create();
    }
}
