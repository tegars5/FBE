<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Supplier;
use Illuminate\Support\Facades\Hash;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Buat User baru dengan peran 'supplier'
        $supplierUser = User::create([
            'name' => 'PT. Sawit Jaya (Supplier)',
            'email' => 'supplier@example.com',
            'password' => Hash::make('password'), // password default: "password"
            'role' => 'supplier',
        ]);

        // 2. Buat data Supplier yang terhubung dengan User di atas
        Supplier::create([
            'user_id' => $supplierUser->id,
            'type' => 'Mill Factory',
            'region' => 'Sumatera Utara',
            'monthly_capacity' => 500,
            'dura_composition' => 30,
            'tenera_composition' => 60,
            'pisifera_composition' => 10,
            'annual_sales' => 20000,
            'desired_price' => 120,
            'years_operation' => 8,
            'minimum_order_quantity' => 120,
            'contact_name' => 'Andi Wijaya',
            'contact_email' => 'andi.wijaya@sawitjaya.com',
            'contact_phone' => '+6281234567890',
            'submission_status' => 'pending',
            'status' => 'active', // Menambahkan status pada supplier
        ]);
    }
}
