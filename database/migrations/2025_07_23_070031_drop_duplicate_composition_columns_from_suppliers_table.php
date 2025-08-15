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
            // Hapus kolom-kolom duplikat
            if (Schema::hasColumn('suppliers', 'composition_dura')) {
                $table->dropColumn('composition_dura');
            }
            if (Schema::hasColumn('suppliers', 'composition_tenera')) {
                $table->dropColumn('composition_tenera');
            }
            if (Schema::hasColumn('suppliers', 'composition_pisifera')) {
                $table->dropColumn('composition_pisifera');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('suppliers', function (Blueprint $table) {
            // Tambahkan kembali kolom-kolom jika migrasi di-rollback
            // Sesuaikan tipe data dan nullable() sesuai kebutuhan awal kolom ini
            // Pastikan tipe data sesuai dengan kolom yang Anda hapus
            // Contoh: Jika sebelumnya string, gunakan string(). Jika integer, gunakan integer().
            $table->string('composition_dura')->nullable();
            $table->string('composition_tenera')->nullable();
            $table->string('composition_pisifera')->nullable();
        });
    }
};