<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Brand;
use Illuminate\Support\Str;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->word();

        return [
            'title'                 => $title,
            'slug'                  => Str::slug($title . '-' . now()->getPreciseTimestamp(4)),
            'code'                  => rand(1000, 5000),
            'price'                 => $this->faker->numberBetween($min = 1500, $max = 6000),
            'discount'                 => $this->faker->numberBetween($min = 300, $max = 600),
            'qty'                     => rand(1, 10),
            'alert_stock'             => rand(1, 5),
            'image'                 => json_encode(['product-'. $this->faker->randomElement(['one', 'two', 'three', 'four']) . '.jpg']),
            'description'           => $this->faker->paragraph(5),
            'status'                => 1,
            'product_category_id'  => $attribute['product_category_id'] ?? ProductCategory::factory(),
            'brand_id'              => $attribute['brand_id'] ?? Brand::factory(),
            'author_id'               => $attribute['author_id'] ?? User::factory(),
        ];
    }
}