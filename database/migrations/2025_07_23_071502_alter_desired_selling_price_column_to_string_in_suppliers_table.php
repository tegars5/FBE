<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('suppliers', function (Blueprint $table) {
            // Ubah tipe data kolom 'desired_selling_price' menjadi string
            // Perhatikan: ->change() membutuhkan doctrine/dbal di project Anda
            // Pastikan Anda sudah menginstalnya: composer require doctrine/dbal
            $table->string('desired_selling_price')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('suppliers', function (Blueprint $table) {
            // Kembalikan ke tipe data numerik jika di-rollback
            // Asumsikan sebelumnya adalah decimal(10, 2)
            $table->decimal('desired_selling_price', 10, 2)->nullable()->change();
        });
    }
};