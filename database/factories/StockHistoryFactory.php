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
        return [
            //
            'warehouse_id' => fake()->numberBetween(1, 100),
            'product_id' => fake()->numberBetween(1, 1000),
            'user_id' => fake()->numberBetween(1, 100),
            'current_stock' => fake()->numberBetween(1, 999999),
            'transaction_type' => $transactionfake == 0 ? 'insert' : 'retreive',
            'transaction_value' => $transactionfake == 0 ? fake()->numberBetween(1, 100) :
                fake()->numberBetween(-100, -1),
            'insert_at' => fake()->dateTimeBetween('-10 years', 'now'),
        ];
    }
}
