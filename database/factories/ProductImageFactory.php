<?php

namespace Database\Factories;

use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductImageFactory extends Factory
{
    protected $model = ProductImage::class;

    public function definition(): array
    {
        $filename = $this->faker->uuid() . '.jpg';
        $originalFilename = $this->faker->word() . '.jpg';
        
        return [
            'product_id' => $this->faker->numberBetween(1, 100),
            'filename' => $filename,
            'path' => 'products/' . $filename,
            'mime_type' => 'image/jpeg',
            'size' => $this->faker->numberBetween(50000, 2000000), // 50KB to 2MB
            'extension' => 'jpg',
            'original_filename' => $originalFilename,
        ];
    }
}
