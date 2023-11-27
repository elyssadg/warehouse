<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class WarehouseItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'warehouse_id' => fake()->numberBetween(1, 100),
            'product_id' => fake()->numberBetween(1, 100),
            'product_stock' => fake()->numberBetween(1, 9999999),
            'created_at' => now()
        ];
    }
}
