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
        // 1. Buat atau cari User dengan peran 'supplier'
        $supplierUser = User::firstOrCreate(
            ['email' => 'supplier@example.com'],
            [
                'name' => 'PT. Sawit Jaya (Supplier)',
                'password' => Hash::make('password'),
                'role' => 'supplier',
                'status' => 'pending',
            ]
        );

        // 2. Buat data Supplier yang terhubung dengan User di atas
        Supplier::create([
            'user_id'                 => $supplierUser->id,
            'type'                    => 'Mill Factory',
            'company_name'            => 'PT. Sawit Jaya',
            'region'                  => 'Sumatera Utara',
            'monthly_capacity'        => 500.00,
            'annual_sales'            => 20000.00,

            // ==========================================================
            // PERBAIKAN: Nama kolom diubah dari 'desired_selling_price' menjadi 'desired_price'
            'desired_price'           => 120.00,
            // ==========================================================

            'minimum_order_quantity'  => 120,
            'years_operation'         => 10,
            'contact_name'            => 'Budi Santoso', 
            'contact_email'           => 'budi@sawitjaya.com', 
            'contact_phone'           => '08123456789', 
            'submission_status'       => 'pending',
        ]);
    }
}
