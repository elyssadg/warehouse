<?php

namespace Database\Factories;

use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Warehouse>
 */
class WarehouseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'warehouse_address' => fake()->address(),
            'warehouse_city' => fake()->city(),
            'warehouse_province' => fake()->randomElement([
                'Aceh',
                'Bali',
                'Bangka Belitung',
                'Banten',
                'Bengkulu',
                'Jawa Tengah',
                'Kalimantan Tengah',
                'Sulawesi Tengah',
                'Jawa Timur',
                'Kalimantan Timur',
                'Nusa Tenggara Timur',
                'Gorontalo',
                'DKI Jakarta',
                'Jambi',
                'Lampung',
                'Maluku',
                'Kalimantan Utara',
                'Maluku Utara',
                'Sulawesi Utara',
                'Sumatera Utara',
                'Papua',
                'Riau',
                'Kepulauan Riau',
                'Kalimantan Selatan',
                'Sulawesi Selatan',
                'Sumatera Selatan',
                'Sulawesi Tenggara',
                'Jawa Barat',
                'Kalimantan Barat',
                'Nusa Tenggara Barat',
                'Papua Barat',
                'Sulawesi Barat',
                'Sumatera Barat',
                'Yogyakarta',
            ]),
            'warehouse_postalcode' => fake()->postcode(),
            'created_at' => now()

        ];
    }
}
