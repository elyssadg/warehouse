<?php

namespace Database\Seeders;

use App\Models\StockHistory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class StockHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        StockHistory::factory(1000)->create();
    }
}
