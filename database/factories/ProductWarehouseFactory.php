<?php

namespace Database\Factories;

use App\Models\ProductWarehouse;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductWarehouseFactory extends Factory
{
    protected $model = ProductWarehouse::class;

    public function definition(): array
    {
        return [
            'product_id' => $this->faker->numberBetween(1, 100),
            'warehouse_id' => $this->faker->numberBetween(1, 10),
            'quantity' => $this->faker->numberBetween(0, 1000),
        ];
    }
}