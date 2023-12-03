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
        do {
            $warehouseId = $this->faker->numberBetween(1, 50);
            $productId = $this->faker->numberBetween(1, 100);
        } while (WarehouseItem::where('warehouse_id', $warehouseId)->where('product_id', $productId)->exists());
        
        return [
            'warehouse_id' => $warehouseId,
            'product_id' => $productId,
            'stock' => $this->faker->numberBetween(1, 9999999),
            'created_at' => now(),
        ];
    }
}
