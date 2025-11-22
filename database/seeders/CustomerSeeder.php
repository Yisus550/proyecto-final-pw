<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = [
            ['first_name' => 'Ana', 'last_name' => 'Martínez', 'email' => 'ana@example.com', 'phone_number' => '5551234567', 'is_active' => true],
            ['first_name' => 'Pedro', 'last_name' => 'Sánchez', 'email' => 'pedro@example.com', 'phone_number' => '5559876543', 'is_active' => true],
            ['first_name' => 'Laura', 'last_name' => 'Rodríguez', 'email' => 'laura@example.com', 'phone_number' => '5555555555', 'is_active' => true],
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }
    }
}
