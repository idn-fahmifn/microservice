<?php

namespace Database\Seeders;

use App\Models\Food;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Food::create([
            'category_id' => random_int(1, 9),
            'name' => fake()->name,
            'image' => fake()->image(),
            'price' => '20000',
            'desc' => fake()->realText()
        ]);
    }
}
