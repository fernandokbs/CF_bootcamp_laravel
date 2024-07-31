<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected static $counter = 1;

    public function definition(): array
    {
        $name = 'categoria ' . self::$counter++;

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'visible' => fake()->boolean ? 1 : 0,
            'created_at' => fake()->dateTime(),
            'updated_at' => fake()->dateTime(),
        ];
    }
}
