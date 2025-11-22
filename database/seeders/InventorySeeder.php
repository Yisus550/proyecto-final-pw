<?php

namespace Database\Seeders;

use App\Models\Inventory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $inventories = [
                   ['product_id' => 1, 'stock_quantity' => 10],
                   ['product_id' => 2, 'stock_quantity' => 50],
                   ['product_id' => 3, 'stock_quantity' => 100],
                   ['product_id' => 4, 'stock_quantity' => 75],
                   ['product_id' => 5, 'stock_quantity' => 200],
               ];

        foreach ($inventories as $inventory) {
            Inventory::create($inventory);
        }
    }
}
