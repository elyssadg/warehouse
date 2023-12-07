<?php

namespace Database\Factories;

use App\Models\WarehouseItem;
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
        $warehouseIds = WarehouseItem::pluck('warehouse_id')->toArray();
        $productIds = WarehouseItem::pluck('product_id')->toArray();

        // Generate unique warehouse and product IDs
        do {
            $warehouseId = fake()->numberBetween(1, 50);
        } while (in_array($warehouseId, $warehouseIds));

        do {
            $productId = fake()->numberBetween(1, 100);
        } while (in_array($productId, $productIds));

        // Store the generated warehouse and product IDs
        $warehouseIds[] = $warehouseId;
        $productIds[] = $productId;

        return [
            'warehouse_id' => $warehouseId,
            'product_id' => $productId,
            'stock' => fake()->numberBetween(1, 9999999),
            'created_at' => now(),
        ];
    }
}
