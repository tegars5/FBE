<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id')->constrained('suppliers')->onDelete('cascade');
            $table->foreignId('admin_id')->nullable()->constrained('users')->onDelete('set null');
            $table->enum('status', ['pending', 'accepted', 'rejected', 'completed'])->default('pending');
            $table->decimal('quantity_requested', 10, 2);
            $table->decimal('price', 15, 2);
            $table->text('supplier_notes')->nullable();
            $table->text('notes')->nullable();
            $table->date('delivery_date')->nullable();
            $table->string('delivery_location')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
