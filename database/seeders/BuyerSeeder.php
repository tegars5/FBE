<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Buyer;
use Illuminate\Support\Facades\Hash;

class BuyerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Membuat User baru dengan peran 'buyer'
        $buyerUser = User::create([
            'name' => 'Green Energy Trading (Buyer)',
            'email' => 'buyer@example.com',
            'password' => Hash::make('password'), // password default: "password"
            'role' => 'buyer',
        ]);

        // 2. Membuat data Buyer yang terhubung dengan User di atas
        Buyer::create([
            'user_id' => $buyerUser->id,
            'company_name' => 'Green Energy Trading Ltd.',
            'country' => 'Japan',
            'city' => 'Tokyo',
            'years_in_operation' => 10,
            'annual_purchase_volume' => 50000.00,
            'monthly_purchase_volume' => 4000.00,
            'preferred_trade_terms' => 'FOB',
            'target_price' => 120.00,
            'products_of_interest' => ['PKS (Raw)', 'PKS Charcoal'], // Ini akan disimpan sebagai JSON
            'contact_person_name' => 'Mr. Tanaka',
            'contact_person_email' => 'tanaka@greenenergy.co.jp',
            'contact_person_phone' => '+819012345678',
            'additional_notes' => 'We require GGL-certified PKS only.',
        ]);
    }
}
