<?php

namespace Database\Seeders;

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
        $dataCount = 2500;

        do {
            UserWarehouse::factory()->create();
            $currentCount = UserWarehouse::count();
        } while ($currentCount < $dataCount);
    }
}
