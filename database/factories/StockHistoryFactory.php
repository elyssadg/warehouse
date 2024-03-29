<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StockHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $transactionfake = fake()->numberBetween(0, 1);
        $createdAt = fake()->dateTimeBetween('-1 year', 'now');

        return [
            //
            'warehouse_id' => fake()->numberBetween(1, 50),
            'product_id' => fake()->numberBetween(1, 100),
            'user_id' => fake()->numberBetween(1, 50),
            'current_stock' => fake()->numberBetween(1, 1000),
            'transaction_type' => $transactionfake == 0 ? 'insert' : 'retreive',
            'transaction_value' =>
                $transactionfake == 0
                    ? fake()->numberBetween(1, 100)
                    : fake()->numberBetween(-100, -1),
            'created_at' => $createdAt,
        ];
    }
}
