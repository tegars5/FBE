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
        $buyers = [
            [
                'user' => [
                    'name' => 'Green Energy Trading Ltd.',
                    'email' => 'buyer@example.com',
                    'password' => Hash::make('buyer123'),
                    'role' => 'buyer',
                    'status' => 'active',
                    'is_verified' => true,
                ],
                'buyer' => [
                    'company_name' => 'Green Energy Trading Ltd.',
                    'country' => 'Japan',
                    'city' => 'Tokyo',
                    'years_in_operation' => 10,
                    'annual_purchase_volume' => 50000,
                    'monthly_purchase_volume' => 4000,
                    'preferred_trade_terms' => 'FOB',
                    'target_price' => 120.00,
                    'products_of_interest' => json_encode(['PKS (Raw)', 'PKS Charcoal']),
                    'contact_person_name' => 'Mr. Tanaka',
                    'contact_person_email' => 'tanaka@greenenergy.co.jp',
                    'contact_person_phone' => '+819012345678',
                    'additional_notes' => 'We require GGL-certified PKS only.',
                ],
            ],
            [
                'user' => [
                    'name' => 'Asia Biomass Corporation',
                    'email' => 'buyer2@example.com',
                    'password' => Hash::make('buyer123'),
                    'role' => 'buyer',
                    'status' => 'active',
                    'is_verified' => true,
                ],
                'buyer' => [
                    'company_name' => 'Asia Biomass Corporation',
                    'country' => 'South Korea',
                    'city' => 'Seoul',
                    'years_in_operation' => 8,
                    'annual_purchase_volume' => 35000,
                    'monthly_purchase_volume' => 2900,
                    'preferred_trade_terms' => 'CIF',
                    'target_price' => 115.00,
                    'products_of_interest' => json_encode(['PKS (Raw)', 'Palm Kernel Shell']),
                    'contact_person_name' => 'Kim Min-jun',
                    'contact_person_email' => 'kim@asiabiomass.kr',
                    'contact_person_phone' => '+821012345678',
                    'additional_notes' => 'Looking for long-term partnership.',
                ],
            ],
            [
                'user' => [
                    'name' => 'Euro Renewable Energy',
                    'email' => 'buyer3@example.com',
                    'password' => Hash::make('buyer123'),
                    'role' => 'buyer',
                    'status' => 'pending',
                    'is_verified' => false,
                ],
                'buyer' => [
                    'company_name' => 'Euro Renewable Energy GmbH',
                    'country' => 'Germany',
                    'city' => 'Berlin',
                    'years_in_operation' => 5,
                    'annual_purchase_volume' => 25000,
                    'monthly_purchase_volume' => 2000,
                    'preferred_trade_terms' => 'FOB',
                    'target_price' => 125.00,
                    'products_of_interest' => json_encode(['PKS Charcoal', 'PKS Pellets']),
                    'contact_person_name' => 'Hans Mueller',
                    'contact_person_email' => 'mueller@eurorenewable.de',
                    'contact_person_phone' => '+491234567890',
                    'additional_notes' => 'New buyer looking for reliable supplier.',
                ],
            ],
        ];

        foreach ($buyers as $data) {
            $user = User::create($data['user']);

            $data['buyer']['user_id'] = $user->id;
            Buyer::create($data['buyer']);
        }
    }
}
