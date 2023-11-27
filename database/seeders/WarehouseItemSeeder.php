<?php

namespace Database\Seeders;

use App\Models\WarehouseItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WarehouseItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataCount = 5000;

        do {
            WarehouseItem::factory()->create();
            $currentCount = WarehouseItem::count();
        } while ($currentCount < $dataCount);
    }
}
