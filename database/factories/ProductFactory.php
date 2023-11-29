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
        $productName = [
            'adjective' => ['Small', 'Ergonomic', 'Rustic', 'Intelligent', 'Gorgeous', 'Incredible', 'Fantastic', 'Practical', 'Sleek', 'Awesome', 'Enormous', 'Mediocre', 'Synergistic', 'Heavy Duty', 'Lightweight', 'Aerodynamic', 'Durable'],
            'material' => ['Steel', 'Wooden', 'Concrete', 'Plastic', 'Cotton', 'Granite', 'Rubber', 'Leather', 'Silk', 'Wool', 'Linen', 'Marble', 'Iron', 'Bronze', 'Copper', 'Aluminum', 'Paper'],
            'product' => ['Chair', 'Car', 'Computer', 'Gloves', 'Pants', 'Shirt', 'Table', 'Shoes', 'Hat', 'Plate', 'Knife', 'Bottle', 'Coat', 'Lamp', 'Keyboard', 'Bag', 'Bench', 'Clock', 'Watch', 'Wallet'],
        ];

        $adjective = $this->faker->randomElement($productName['adjective']);
        $material = $this->faker->randomElement($productName['material']);
        $product = $this->faker->randomElement($productName['product']);

        $productName = "{$adjective} {$material} {$product}";

        return [
            //
            'product_name' => $productName,
            'product_type_id' => fake()->numberBetween(1, 100),
            // 'product_image' => fake()->image(),
            'product_weight' => fake()->randomFloat(),
            'product_price' => fake()->numberBetween(1, 999999),
            'created_at' => now()
        ];
    }
}