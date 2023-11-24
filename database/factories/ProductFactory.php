<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
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
            'product_name' => fake()->sentence(),
            'product_type_id' => fake()->numberBetween(1, 100),
            // 'product_image' => fake()->image(),
            'product_weight' => fake()->randomFloat(),
            'product_price' => fake()->numberBetween(1, 999999),
            'created_at' => now()
        ];
    }
}
