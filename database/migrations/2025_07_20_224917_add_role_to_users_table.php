<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Menambahkan kolom 'role' dengan nilai default 'buyer'
            // atau Anda bisa menggunakan nullable() jika role bisa kosong dan diisi belakangan.
            // Gunakan enum untuk memastikan hanya nilai yang valid yang bisa masuk.
            $table->enum('role', ['buyer', 'supplier', 'admin'])->default('buyer')->after('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};