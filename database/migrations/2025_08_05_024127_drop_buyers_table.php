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
        Schema::dropIfExists('buyers');
    }

    /**
     * Reverse the migrations.
     * (Di sini kita bisa definisikan ulang skema lama jika ingin bisa di-rollback)
     */
    public function down(): void
    {
        // Anda bisa membiarkannya kosong atau mendefinisikan skema lama di sini
    }
};