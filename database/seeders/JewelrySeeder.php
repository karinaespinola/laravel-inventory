<?php

namespace Database\Seeders;

use Database\Factories\CategoryFactory;
use Database\Factories\ProductFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class JewelrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define jewelry categories
        $categories = [
            [
                'name' => 'Rings',
                'description' => 'Beautiful rings for every occasion, from engagement rings to fashion rings.',
                'slug' => 'rings',
            ],
            [
                'name' => 'Necklaces',
                'description' => 'Elegant necklaces and chains to complement any outfit.',
                'slug' => 'necklaces',
            ],
            [
                'name' => 'Earrings',
                'description' => 'Stunning earrings including studs, hoops, and drop earrings.',
                'slug' => 'earrings',
            ],
            [
                'name' => 'Bracelets',
                'description' => 'Charming bracelets and bangles for wrists and arms.',
                'slug' => 'bracelets',
            ],
            [
                'name' => 'Watches',
                'description' => 'Luxury timepieces combining style and functionality.',
                'slug' => 'watches',
            ],
            [
                'name' => 'Pendants',
                'description' => 'Exquisite pendants and charms to hang on chains.',
                'slug' => 'pendants',
            ],
            [
                'name' => 'Brooches',
                'description' => 'Decorative brooches and pins to accessorize garments.',
                'slug' => 'brooches',
            ],
            [
                'name' => 'Anklets',
                'description' => 'Delicate anklets and ankle bracelets for a bohemian touch.',
                'slug' => 'anklets',
            ],
            [
                'name' => 'Cufflinks',
                'description' => 'Elegant cufflinks for formal attire and special occasions.',
                'slug' => 'cufflinks',
            ],
            [
                'name' => 'Gemstones',
                'description' => 'Precious and semi-precious gemstones for custom jewelry.',
                'slug' => 'gemstones',
            ],
        ];

        // Create categories using CategoryFactory
        $createdCategories = [];
        foreach ($categories as $categoryData) {
            $category = CategoryFactory::new()->create([
                'name' => $categoryData['name'],
                'slug' => $categoryData['slug'],
                'description' => $categoryData['description'],
                'image' => 'https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=400&h=300&fit=crop',
                'parent_id' => null,
            ]);
            $createdCategories[] = $category;
        }

        // Define products for each category
        $products = [
            // Rings (3 products)
            [
                'category_id' => 0, // Will be set to Rings category index
                'name' => 'Diamond Solitaire Engagement Ring',
                'price' => 2899.99,
                'extras' => [
                    'weight' => 3.5,
                    'dimensions' => ['length' => 8, 'width' => 8, 'height' => 6],
                    'color' => 'White',
                    'material' => 'Platinum',
                    'stone' => 'Diamond',
                    'carat' => 1.5,
                ],
            ],
            [
                'category_id' => 0,
                'name' => 'Vintage Gold Band Ring',
                'price' => 459.99,
                'extras' => [
                    'weight' => 2.8,
                    'dimensions' => ['length' => 7, 'width' => 7, 'height' => 4],
                    'color' => 'Gold',
                    'material' => '14K Gold',
                    'stone' => null,
                ],
            ],
            [
                'category_id' => 0,
                'name' => 'Sapphire and Diamond Ring',
                'price' => 1299.99,
                'extras' => [
                    'weight' => 3.2,
                    'dimensions' => ['length' => 9, 'width' => 9, 'height' => 5],
                    'color' => 'Blue',
                    'material' => 'White Gold',
                    'stone' => 'Sapphire',
                    'carat' => 2.0,
                ],
            ],
            // Necklaces (3 products)
            [
                'category_id' => 1,
                'name' => 'Pearl Strand Necklace',
                'price' => 899.99,
                'extras' => [
                    'weight' => 12.5,
                    'dimensions' => ['length' => 45, 'width' => 1, 'height' => 1],
                    'color' => 'Cream',
                    'material' => 'Pearl',
                    'length' => '45cm',
                ],
            ],
            [
                'category_id' => 1,
                'name' => 'Gold Chain Necklace',
                'price' => 649.99,
                'extras' => [
                    'weight' => 15.3,
                    'dimensions' => ['length' => 50, 'width' => 0.5, 'height' => 0.5],
                    'color' => 'Gold',
                    'material' => '18K Gold',
                    'length' => '50cm',
                ],
            ],
            [
                'category_id' => 1,
                'name' => 'Tennis Diamond Necklace',
                'price' => 3499.99,
                'extras' => [
                    'weight' => 8.7,
                    'dimensions' => ['length' => 40, 'width' => 2, 'height' => 0.3],
                    'color' => 'White',
                    'material' => 'Platinum',
                    'stone' => 'Diamond',
                    'length' => '40cm',
                ],
            ],
            // Earrings (3 products)
            [
                'category_id' => 2,
                'name' => 'Diamond Stud Earrings',
                'price' => 1199.99,
                'extras' => [
                    'weight' => 1.2,
                    'dimensions' => ['length' => 1, 'width' => 1, 'height' => 0.5],
                    'color' => 'White',
                    'material' => 'White Gold',
                    'stone' => 'Diamond',
                    'carat' => 1.0,
                ],
            ],
            [
                'category_id' => 2,
                'name' => 'Gold Hoop Earrings',
                'price' => 299.99,
                'extras' => [
                    'weight' => 3.5,
                    'dimensions' => ['length' => 3, 'width' => 3, 'height' => 0.3],
                    'color' => 'Gold',
                    'material' => '14K Gold',
                    'stone' => null,
                ],
            ],
            [
                'category_id' => 2,
                'name' => 'Emerald Drop Earrings',
                'price' => 1599.99,
                'extras' => [
                    'weight' => 4.2,
                    'dimensions' => ['length' => 5, 'width' => 2, 'height' => 0.8],
                    'color' => 'Green',
                    'material' => 'White Gold',
                    'stone' => 'Emerald',
                    'carat' => 3.5,
                ],
            ],
            // Bracelets (3 products)
            [
                'category_id' => 3,
                'name' => 'Silver Charm Bracelet',
                'price' => 429.99,
                'extras' => [
                    'weight' => 8.5,
                    'dimensions' => ['length' => 20, 'width' => 2, 'height' => 1],
                    'color' => 'Silver',
                    'material' => 'Sterling Silver',
                    'stone' => null,
                ],
            ],
            [
                'category_id' => 3,
                'name' => 'Diamond Tennis Bracelet',
                'price' => 2799.99,
                'extras' => [
                    'weight' => 12.3,
                    'dimensions' => ['length' => 18, 'width' => 1.5, 'height' => 0.5],
                    'color' => 'White',
                    'material' => 'Platinum',
                    'stone' => 'Diamond',
                    'carat' => 5.0,
                ],
            ],
            [
                'category_id' => 3,
                'name' => 'Gold Bangle Set',
                'price' => 749.99,
                'extras' => [
                    'weight' => 15.8,
                    'dimensions' => ['length' => 7, 'width' => 7, 'height' => 2],
                    'color' => 'Gold',
                    'material' => '18K Gold',
                    'stone' => null,
                ],
            ],
            // Watches (3 products)
            [
                'category_id' => 4,
                'name' => 'Luxury Automatic Watch',
                'price' => 3499.99,
                'extras' => [
                    'weight' => 85.0,
                    'dimensions' => ['length' => 4, 'width' => 4, 'height' => 1],
                    'color' => 'Black',
                    'material' => 'Stainless Steel',
                    'movement' => 'Automatic',
                    'water_resistance' => '100m',
                ],
            ],
            [
                'category_id' => 4,
                'name' => 'Gold Dress Watch',
                'price' => 2299.99,
                'extras' => [
                    'weight' => 72.5,
                    'dimensions' => ['length' => 3.5, 'width' => 3.5, 'height' => 0.8],
                    'color' => 'Gold',
                    'material' => '18K Gold',
                    'movement' => 'Quartz',
                    'water_resistance' => '50m',
                ],
            ],
            [
                'category_id' => 4,
                'name' => 'Diamond Bezel Watch',
                'price' => 4999.99,
                'extras' => [
                    'weight' => 95.3,
                    'dimensions' => ['length' => 4.2, 'width' => 4.2, 'height' => 1.2],
                    'color' => 'White',
                    'material' => 'Platinum',
                    'stone' => 'Diamond',
                    'movement' => 'Automatic',
                    'water_resistance' => '200m',
                ],
            ],
            // Pendants (3 products)
            [
                'category_id' => 5,
                'name' => 'Heart Pendant with Diamond',
                'price' => 599.99,
                'extras' => [
                    'weight' => 2.5,
                    'dimensions' => ['length' => 2, 'width' => 2, 'height' => 0.5],
                    'color' => 'White',
                    'material' => 'White Gold',
                    'stone' => 'Diamond',
                    'carat' => 0.5,
                ],
            ],
            [
                'category_id' => 5,
                'name' => 'Cross Pendant',
                'price' => 349.99,
                'extras' => [
                    'weight' => 3.1,
                    'dimensions' => ['length' => 3, 'width' => 2, 'height' => 0.3],
                    'color' => 'Gold',
                    'material' => '14K Gold',
                    'stone' => null,
                ],
            ],
            [
                'category_id' => 5,
                'name' => 'Ruby Pendant',
                'price' => 899.99,
                'extras' => [
                    'weight' => 4.2,
                    'dimensions' => ['length' => 2.5, 'width' => 2.5, 'height' => 0.8],
                    'color' => 'Red',
                    'material' => 'Yellow Gold',
                    'stone' => 'Ruby',
                    'carat' => 2.5,
                ],
            ],
            // Brooches (3 products)
            [
                'category_id' => 6,
                'name' => 'Vintage Butterfly Brooch',
                'price' => 459.99,
                'extras' => [
                    'weight' => 5.5,
                    'dimensions' => ['length' => 4, 'width' => 4, 'height' => 1],
                    'color' => 'Multi-color',
                    'material' => 'Gold Plated',
                    'stone' => 'Crystal',
                ],
            ],
            [
                'category_id' => 6,
                'name' => 'Art Deco Diamond Brooch',
                'price' => 1899.99,
                'extras' => [
                    'weight' => 8.3,
                    'dimensions' => ['length' => 5, 'width' => 3, 'height' => 0.8],
                    'color' => 'White',
                    'material' => 'Platinum',
                    'stone' => 'Diamond',
                    'carat' => 3.0,
                ],
            ],
            [
                'category_id' => 6,
                'name' => 'Pearl Floral Brooch',
                'price' => 629.99,
                'extras' => [
                    'weight' => 6.7,
                    'dimensions' => ['length' => 4.5, 'width' => 4.5, 'height' => 1.2],
                    'color' => 'Cream',
                    'material' => 'Sterling Silver',
                    'stone' => 'Pearl',
                ],
            ],
            // Anklets (3 products)
            [
                'category_id' => 7,
                'name' => 'Delicate Chain Anklet',
                'price' => 149.99,
                'extras' => [
                    'weight' => 2.3,
                    'dimensions' => ['length' => 25, 'width' => 0.3, 'height' => 0.3],
                    'color' => 'Silver',
                    'material' => 'Sterling Silver',
                    'stone' => null,
                ],
            ],
            [
                'category_id' => 7,
                'name' => 'Gold Beaded Anklet',
                'price' => 229.99,
                'extras' => [
                    'weight' => 4.5,
                    'dimensions' => ['length' => 26, 'width' => 0.5, 'height' => 0.5],
                    'color' => 'Gold',
                    'material' => '14K Gold',
                    'stone' => null,
                ],
            ],
            [
                'category_id' => 7,
                'name' => 'Diamond Anklet',
                'price' => 799.99,
                'extras' => [
                    'weight' => 3.8,
                    'dimensions' => ['length' => 24, 'width' => 0.8, 'height' => 0.4],
                    'color' => 'White',
                    'material' => 'White Gold',
                    'stone' => 'Diamond',
                    'carat' => 1.5,
                ],
            ],
            // Cufflinks (3 products)
            [
                'category_id' => 8,
                'name' => 'Silver Cufflinks Set',
                'price' => 179.99,
                'extras' => [
                    'weight' => 8.2,
                    'dimensions' => ['length' => 2, 'width' => 2, 'height' => 0.5],
                    'color' => 'Silver',
                    'material' => 'Sterling Silver',
                    'stone' => null,
                ],
            ],
            [
                'category_id' => 8,
                'name' => 'Gold Monogram Cufflinks',
                'price' => 349.99,
                'extras' => [
                    'weight' => 9.5,
                    'dimensions' => ['length' => 2.5, 'width' => 2.5, 'height' => 0.6],
                    'color' => 'Gold',
                    'material' => '18K Gold',
                    'stone' => null,
                ],
            ],
            [
                'category_id' => 8,
                'name' => 'Diamond Cufflinks',
                'price' => 1199.99,
                'extras' => [
                    'weight' => 10.3,
                    'dimensions' => ['length' => 2.2, 'width' => 2.2, 'height' => 0.7],
                    'color' => 'White',
                    'material' => 'White Gold',
                    'stone' => 'Diamond',
                    'carat' => 1.0,
                ],
            ],
            // Gemstones (3 products)
            [
                'category_id' => 9,
                'name' => 'Blue Sapphire Gemstone',
                'price' => 1299.99,
                'extras' => [
                    'weight' => 5.2,
                    'dimensions' => ['length' => 1, 'width' => 1, 'height' => 0.6],
                    'color' => 'Blue',
                    'material' => 'Sapphire',
                    'carat' => 3.0,
                    'cut' => 'Round',
                ],
            ],
            [
                'category_id' => 9,
                'name' => 'Emerald Gemstone',
                'price' => 899.99,
                'extras' => [
                    'weight' => 4.8,
                    'dimensions' => ['length' => 1.2, 'width' => 1, 'height' => 0.7],
                    'color' => 'Green',
                    'material' => 'Emerald',
                    'carat' => 2.5,
                    'cut' => 'Oval',
                ],
            ],
            [
                'category_id' => 9,
                'name' => 'Ruby Gemstone',
                'price' => 1599.99,
                'extras' => [
                    'weight' => 6.1,
                    'dimensions' => ['length' => 1.1, 'width' => 1.1, 'height' => 0.8],
                    'color' => 'Red',
                    'material' => 'Ruby',
                    'carat' => 4.0,
                    'cut' => 'Cushion',
                ],
            ],
        ];

        // Create products using ProductFactory
        foreach ($products as $productData) {
            $categoryIndex = $productData['category_id'];
            $category = $createdCategories[$categoryIndex];
            
            ProductFactory::new()->create([
                'category_id' => $category->id,
                'name' => $productData['name'],
                'slug' => Str::slug($productData['name']),
                'price' => $productData['price'],
                'extras' => $productData['extras'],
                'is_active' => true,
            ]);
        }
    }
}
