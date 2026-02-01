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
        // Memanggil semua seeder
        $this->call([
            AdminSeeder::class,
            SupplierSeeder::class,
            BuyerSeeder::class,
        ]);
    }
}
