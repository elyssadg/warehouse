<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserWarehouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserWarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 5; $i <= 50; $i++) {
            for ($j = 1; $j <= fake()->numberBetween(1, 3); $j++) {
                UserWarehouse::create([
                    'user_id' => $i,
                    'warehouse_id' => fake()->numberBetween(1, 50)
                ]);
            }
        }
    }
}
