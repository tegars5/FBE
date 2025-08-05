<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyersTable extends Migration
{
    public function up()
    {
        Schema::create('buyers', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('country', 100);
            $table->string('city', 100);
            $table->integer('annual_pks_volume');
            $table->integer('monthly_purchase_volume');
            $table->string('preferred_trade_terms', 10);
            $table->decimal('target_price', 10, 2)->nullable();
            $table->integer('years_in_operation');
            $table->string('contact_phone', 30);
            $table->json('products_of_interest')->nullable();
            $table->text('additional_notes')->nullable();
            $table->string('business_license')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('purchase_records')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('buyers');
    }
}
