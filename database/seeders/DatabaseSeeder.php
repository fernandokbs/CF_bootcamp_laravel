<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Storage::deleteDirectory('products');
        Storage::makeDirectory('products');

        User::factory()->create(['name' => 'Winston Bravo', 'email' => 'wbravoanoni@gmail.com', 'password' => '12345678']);
        Category::factory()->count(10)->create();
        Product::factory()->count(50)->create();
    }
}
