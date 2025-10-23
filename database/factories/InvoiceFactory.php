<?php

namespace Database\Factories;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;

    public function definition(): array
    {
        return [
            'number' => 'INV-' . $this->faker->unique()->randomNumber(6),
            'date' => $this->faker->date(),
            'total' => $this->faker->randomFloat(2, 10, 1000),
            'customer_id' => \App\Models\Customer::factory(),
            'user_id' => \App\Models\User::factory(),

        ];
    }
}
