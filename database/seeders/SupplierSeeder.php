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
        $suppliers = [
            [
                'user' => [
                    'name' => 'PT. Sawit Jaya',
                    'email' => 'supplier@example.com',
                    'password' => Hash::make('supplier123'),
                    'role' => 'supplier',
                    'status' => 'active',
                    'is_verified' => true,
                ],
                'supplier' => [
                    'supplier_type' => 'Mill Factory',
                    'company_name' => 'PT. Sawit Jaya',
                    'region' => 'Sumatera Utara',
                    'monthly_available_volume' => 500,
                    'dura_composition' => 30,
                    'tenera_composition' => 60,
                    'pisifera_composition' => 10,
                    'sales_record' => 20000,
                    'desired_selling_price' => '120',
                    'minimum_order_quantity' => '100 MT',
                    'submission_status' => 'approved',
                ],
            ],
            [
                'user' => [
                    'name' => 'CV. Mandiri Biomass',
                    'email' => 'supplier2@example.com',
                    'password' => Hash::make('supplier123'),
                    'role' => 'supplier',
                    'status' => 'active',
                    'is_verified' => true,
                ],
                'supplier' => [
                    'supplier_type' => 'Collector',
                    'company_name' => 'CV. Mandiri Biomass',
                    'region' => 'Riau',
                    'monthly_available_volume' => 350,
                    'dura_composition' => 25,
                    'tenera_composition' => 65,
                    'pisifera_composition' => 10,
                    'sales_record' => 15000,
                    'desired_selling_price' => '115',
                    'minimum_order_quantity' => '80 MT',
                    'submission_status' => 'approved',
                ],
            ],
            [
                'user' => [
                    'name' => 'PT. Green Palm Energy',
                    'email' => 'supplier3@example.com',
                    'password' => Hash::make('supplier123'),
                    'role' => 'supplier',
                    'status' => 'pending',
                    'is_verified' => false,
                ],
                'supplier' => [
                    'supplier_type' => 'Mill Factory',
                    'company_name' => 'PT. Green Palm Energy',
                    'region' => 'Kalimantan Barat',
                    'monthly_available_volume' => 450,
                    'dura_composition' => 28,
                    'tenera_composition' => 62,
                    'pisifera_composition' => 10,
                    'sales_record' => 18000,
                    'desired_selling_price' => '118',
                    'minimum_order_quantity' => '120 MT',
                    'submission_status' => 'pending',
                ],
            ],
            [
                'user' => [
                    'name' => 'UD. Sumber Rezeki',
                    'email' => 'supplier4@example.com',
                    'password' => Hash::make('supplier123'),
                    'role' => 'supplier',
                    'status' => 'active',
                    'is_verified' => true,
                ],
                'supplier' => [
                    'supplier_type' => 'Collector',
                    'company_name' => 'UD. Sumber Rezeki',
                    'region' => 'Jambi',
                    'monthly_available_volume' => 280,
                    'dura_composition' => 32,
                    'tenera_composition' => 58,
                    'pisifera_composition' => 10,
                    'sales_record' => 12000,
                    'desired_selling_price' => '110',
                    'minimum_order_quantity' => '50 MT',
                    'submission_status' => 'approved',
                ],
            ],
        ];

        foreach ($suppliers as $data) {
            $user = User::create($data['user']);

            $data['supplier']['user_id'] = $user->id;
            Supplier::create($data['supplier']);
        }
    }
}
