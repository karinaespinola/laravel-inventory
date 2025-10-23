<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'number' => 'ORD-' . $this->faker->unique()->randomNumber(6),
            'date' => $this->faker->date(),
            'total' => $this->faker->randomFloat(2, 10, 1000),
        ];
    }
}
