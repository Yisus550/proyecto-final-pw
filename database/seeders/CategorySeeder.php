<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Electrónica', 'description' => 'Productos electrónicos y gadgets'],
            ['name' => 'Ropa', 'description' => 'Prendas de vestir y accesorios'],
            ['name' => 'Alimentos', 'description' => 'Productos alimenticios'],
            ['name' => 'Hogar', 'description' => 'Artículos para el hogar'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
