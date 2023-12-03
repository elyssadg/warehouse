<?php

namespace Database\Seeders;

use App\Models\ProductType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = [
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
        ];

        for ($i = 0; $i < 30; $i++) {
            ProductType::create([
                'name' => $categories[$i],
                'created_at' => now()
            ]);
        }
    }
}
