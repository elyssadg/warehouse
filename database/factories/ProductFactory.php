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
            'adjective' => ['Fresh', 'Creamy', 'Fluffy', 'Savory', 'Zesty', 'Delicious', 'Hearty', 'Wholesome', 'Juicy', 'Gourmet', 'Sizzling', 'Crispy', 'Mouthwatering', 'Tasty', 'Spicy', 'Rich', 'Succulent'],
            'material' => ['Organic', 'Grass-fed', 'Handcrafted', 'Artisanal', 'Locally Sourced', 'Whole Grain', 'Free-range', 'Gluten-free', 'Vegan', 'Fair Trade', 'Natural', 'Wild-caught', 'Biodegradable', 'Sustainable', 'Non-GMO', 'Ethically Sourced', 'Freshly Harvested'],
            'product' => ['Produce', 'Cheese', 'Bread', 'Seafood', 'Frozen Meal', 'Snack', 'Beverage', 'Condiment', 'Pasta', 'Breakfast Cereal', 'Dessert', 'Household Cleaner', 'Personal Care Product', 'Pet Food', 'Health Supplement', 'International Cuisine', 'Organic Snack', 'Gluten-Free Product', 'Vegetarian Meal'],
        ];

        $adjective = $this->faker->randomElement($productName['adjective']);
        $material = $this->faker->randomElement($productName['material']);
        $product = $this->faker->randomElement($productName['product']);
        $productName = "{$adjective} {$material} {$product}";

        return [
            'name' => $productName,
            'product_type_id' => fake()->numberBetween(1, 30),
            'image' => "product_default.png",
            'weight' => fake()->randomFloat(),
            'price' => fake()->numberBetween(1, 999999),
            'created_at' => now()
        ];
    }
}
