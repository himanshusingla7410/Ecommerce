<?php

/// database/factories/ProductFactory.php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $dressTypes = ['A-line', 'Sheath', 'Wrap', 'Empire Waist', 'Maxi', 'Bodycon', 'Off-shoulder'];
        $fabrics = ['Chiffon', 'Silk', 'Lace', 'Satin', 'Velvet', 'Tulle'];
        $patterns = ['Floral', 'Striped', 'Polka Dot', 'Abstract', 'Geometric', 'Paisley'];
        
        $name = $this->faker->randomElement($dressTypes).' Dress in '.
                $this->faker->randomElement($fabrics).' with '.
                $this->faker->randomElement($patterns).' Pattern';
                
        // Generate a realistic dress image URL using Faker's imageUrl
        $imageUrl = $this->faker->imageUrl(
            width: 200,
            height: 1000,
            category: 'fashion', // This generates fashion-related images
            randomize: true // Adds random parameters to make each URL unique
        );
        
        // Alternative using placeholder services
        // $imageUrl = 'https://via.placeholder.com/800x1200.png?'.
        //             http_build_query([
        //                 'text' => urlencode($name),
        //                 'bg' => $this->faker->hexColor(),
        //                 'color' => 'fff'
        //             ]);
                
        return [
            'name' => $name,
            'description' => $this->faker->paragraph(3),
            'price' => $this->faker->random_int(850, 4000),
            //'image_url' => $imageUrl,
            // For multiple images (if your model supports it)
            'images' => json_encode([
                $imageUrl,
               
            ]),
            // Add other product fields as needed
        ];
    }
}