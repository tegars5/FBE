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
            // Menambahkan kolom 'type' setelah 'user_id'
            // Anda bisa menggunakan string biasa atau enum jika hanya ada 2 tipe (Mill Factory, Collector)
            $table->string('type')->after('user_id')->nullable(); // Ditambahkan: nullable()
            // Jika ingin type hanya bisa 'Mill Factory' atau 'Collector':
            // $table->enum('type', ['Mill Factory', 'Collector'])->after('user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('suppliers', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
};
