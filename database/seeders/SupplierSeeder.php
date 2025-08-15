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
            'password' => Hash::make('password'),
            'role' => 'supplier',
            'status' => 'active', // Status dipindahkan ke tabel user
        ]);

        // 2. Buat data Supplier yang terhubung dengan User di atas
        Supplier::create([
            'user_id' => $supplierUser->id,
            'type' => 'Mill Factory',
            'company_name' => 'PT. Sawit Jaya', // Menambahkan company_name
            'region' => 'Sumatera Utara',
            'monthly_capacity' => 500.00,
            'annual_sales' => 20000.00,
            'desired_selling_price' => '120.00', // Mengubah nama kolom dan tipe jadi string
            'minimum_order_quantity' => '120', // Mengubah tipe jadi string
            'submission_status' => 'pending',
            // Kolom-kolom seperti dura_composition, years_operation, contact_name, dll. dihapus karena sudah tidak ada di skema final.
        ]);
    }
}
