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
            'address' => fake()->address(),
            'city' => fake()->city(),
            'province' => fake()->randomElement([
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
            'postalcode' => fake()->postcode(),
            'created_at' => now()

        ];
    }
}
