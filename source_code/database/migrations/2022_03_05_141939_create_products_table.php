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
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('product_name');
            $table->string('product_description');
            $table->float('product_price');
            $table->string('product_image');
            $table->unsignedBigInteger('subcategory_id');
            $table->unsignedBigInteger('store_id');
            
            $table->foreign('subcategory_id')
            ->references('id')
            ->on('sub_categories')
            ->onDelete('cascade');
            
            $table->foreign('store_id')
            ->references('id')
            ->on('sellers')
            ->onDelete('cascade');
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
};
