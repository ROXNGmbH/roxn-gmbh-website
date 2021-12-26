<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('description');
            $table->string('slug');
            $table->boolean('status');
            $table->double('price');
            $table->double('purchase_price');
            $table->double('offer_price')->nullable();
            $table->integer('gty');
            $table->integer('min_gty')->nullable();
            $table->integer('max_gty')->nullable();
            $table->integer('weight');
            $table->json('tages')->nullable();
            $table->string('barcode',50)->nullable();
            $table->foreignId('delivery_time_id')->constrained();
            $table->foreignId('tax_id')->constrained();
            $table->foreignId('unit_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('sub_category_id')->constrained();
            $table->foreignId('rate_id')->constrained();
            $table->foreignId('manfacturing_company_id')->constrained();
            $table->foreignId('sell_type_id')->constrained();
            $table->foreignId('flag_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
