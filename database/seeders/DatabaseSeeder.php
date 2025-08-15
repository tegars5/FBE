<?php

namespace Database\Seeders;

// Hapus 'use App\Models\Admin;' karena tidak kita gunakan lagi
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Ganti Admin::create menjadi User::create dan tambahkan role
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
            'status' => 'active',
        ]);

        // Memanggil seeder lain (ini sudah benar)
        $this->call([
            SupplierSeeder::class,
            BuyerSeeder::class,
        ]);
    }
}
    