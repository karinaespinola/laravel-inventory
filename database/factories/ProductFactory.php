<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'category_id' => 1,
            'name' => $this->faker->word,
            'slug' => $this->faker->slug,
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'extras' => [
                'weight' => $this->faker->randomFloat(2, 0.1, 50),
                'dimensions' => [
                    'length' => $this->faker->numberBetween(1, 100),
                    'width' => $this->faker->numberBetween(1, 100),
                    'height' => $this->faker->numberBetween(1, 100),
                ],
                'color' => $this->faker->colorName,
                'material' => $this->faker->randomElement(['Plastic', 'Metal', 'Wood', 'Fabric', 'Glass']),
            ],
            'is_active' => $this->faker->boolean(80), // 80% chance of being active
        ];
    }
}
