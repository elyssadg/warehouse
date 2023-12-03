<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use App\Models\ProductType;
use App\Models\StockHistory;
use App\Models\User;
use App\Models\UserWarehouse;
use App\Models\Warehouse;
use App\Models\WarehouseItem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            WarehouseSeeder::class,
            ProductTypeSeeder::class,
            ProductSeeder::class,
            StockHistorySeeder::class,
            UserWarehouseSeeder::class,
            WarehouseItemSeeder::class
        ]);
    }
}
