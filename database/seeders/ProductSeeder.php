<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['name' => 'Laptop', 'category_id' => 1, 'unit_price' => 15000.00, 'is_active' => true],
            ['name' => 'Mouse', 'category_id' => 1, 'unit_price' => 250.00, 'is_active' => true],
            ['name' => 'Camiseta', 'category_id' => 2, 'unit_price' => 350.00, 'is_active' => true],
            ['name' => 'Pantalón', 'category_id' => 2, 'unit_price' => 650.00, 'is_active' => true],
            ['name' => 'Arroz 1kg', 'category_id' => 3, 'unit_price' => 25.00, 'is_active' => true],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
