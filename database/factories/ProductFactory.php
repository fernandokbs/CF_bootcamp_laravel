<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */



    public function definition(): array
    {
        $name = $this->generateProductName();

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->sentence,
            'brand' => $this->faker->words(10, true),
            'price' => $this->faker->randomFloat(0, 5000, 200000),
            'stock' => $this->faker->randomDigit(2, 10, 100),
            'image' => 'products/' . $this->faker->image('public/storage/products', 640, 480, null, false,),
            'visible' => fake()->boolean ? 1 : 0,
            'discount' => 0,
            'created_at' => fake()->dateTime(),
            'updated_at' => fake()->dateTime(),
        ];
    }

    private function generateProductName()
    {
        return $this->faker->words(3, true);
    }
}
