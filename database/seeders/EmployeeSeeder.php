<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = [
            ['first_name' => 'Juan', 'last_name' => 'Pérez', 'role' => 'Gerente', 'email' => 'juan@example.com', 'password' => Hash::make('password123'), 'is_active' => true],
            ['first_name' => 'María', 'last_name' => 'García', 'role' => 'Vendedor', 'email' => 'maria@example.com', 'password' => Hash::make('password123'), 'is_active' => true],
            ['first_name' => 'Carlos', 'last_name' => 'López', 'role' => 'Cajero', 'email' => 'carlos@example.com', 'password' => Hash::make('password123'), 'is_active' => true],
        ];

        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}
