<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat beberapa akun admin
        $admins = [
            [
                'name' => 'Super Admin',
                'email' => 'admin@fujiyama.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'status' => 'active',
                'is_verified' => true,
            ],
            [
                'name' => 'Admin Support',
                'email' => 'support@fujiyama.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'status' => 'active',
                'is_verified' => true,
            ],
        ];

        foreach ($admins as $admin) {
            User::create($admin);
        }
    }
}
