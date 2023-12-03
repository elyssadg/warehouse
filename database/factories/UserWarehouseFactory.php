<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserWarehouse>
 */
class UserWarehouseFactory extends Factory
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
            'warehouse_id' => fake()->numberBetween(1, 50),
            'user_id' => fake()->numberBetween(1, 50),
            'created_at' => now()
        ];
    }
}
