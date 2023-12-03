<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductTypeFactory extends Factory
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
            'name' => fake()->randomElement([
                'Fresh Produce',
                'Dairy & Eggs',
                'Bakery & Breads',
                'Meat & Seafood',
                'Frozen Foods',
                'Canned Goods',
                'Snacks & Chips',
                'Beverages',
                'Condiments & Sauces',
                'Pasta & Grains',
                'Breakfast & Cereal',
                'Sweets & Chocolates',
                'Household Essentials',
                'Cleaning Supplies',
                'Personal Care',
                'Baby & Toddler',
                'Pet Supplies',
                'Health & Wellness',
                'International Foods',
                'Organic & Natural',
                'Gluten-Free',
                'Vegetarian & Vegan',
                'Deli & Prepared Foods',
                'Kitchen & Cooking',
                'Paper & Plastic Products',
                'Office & School Supplies',
                'Home Decor',
                'Electronics',
                'Clothing & Apparel',
                'Outdoor & Garden'
            ]),
            'created_at' => now()
        ];
    }
}
