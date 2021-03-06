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
            $table->bigInteger('no_product')->nullable();
            $table->boolean('status');
            $table->double('price');
            $table->double('purchase_price');
            $table->double('offer_price')->nullable();
            $table->integer('qty');
            $table->integer('min_qty')->nullable();
            $table->integer('max_qty')->nullable();
            $table->integer('weight');
            $table->json('tags')->nullable();
            $table->string('barcode', 50)->nullable();
            $table->boolean('bro_product')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id');
            $table->unsignedBigInteger('sub_sub_category_id');
            $table->foreignId('delivery_time_id')->constrained();
            $table->foreignId('tax_id')->constrained();
            $table->foreignId('unit_id')->constrained();
            $table->foreignId('manufacturing_company_id')->constrained();
            $table->foreignId('sell_type_id')->constrained();
            $table->foreignId('flag_id')->constrained('product_flags');
            $table->foreignId('country_id')->constrained();
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('sub_category_id')
                ->references('id')
                ->on('sub_categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('sub_sub_category_id')
                ->references('id')
                ->on('sub_sub_categories')
                ->onDelete('cascade')
                ->onUpdate('cascade')->nullable();

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
