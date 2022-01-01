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
            $table->json('tags')->nullable();
            $table->string('barcode', 50)->nullable();

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('sub_category_id');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('delivery_time_id');
            $table->foreign('delivery_time_id')->references('id')->on('delivery_times')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('tax_id');
            $table->foreign('tax_id')->references('id')->on('taxes')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('manufacturing_company_id');
            $table->foreign('manufacturing_company_id')->references('id')->on('manufacturing_companies')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('sell_type_id');
            $table->foreign('sell_type_id')->references('id')->on('sell_types')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('flag_id');
            $table->foreign('flag_id')->references('id')->on('product_flags')->onDelete('cascade')->onUpdate('cascade');

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
