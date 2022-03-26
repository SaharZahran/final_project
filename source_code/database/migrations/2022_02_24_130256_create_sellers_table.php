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
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('company_email')->unique();
            $table->string('password');
            $table->string('confirm_password');
            $table->string('grower_method');
            $table->string('phone');
            $table->string('hero_image');
            $table->string('category_one')->nullable;
            $table->string('category_two')->nullable;
            $table->string('category_three')->nullable;
            $table->string('category_four')->nullable;
            $table->string('category_five')->nullable;
            $table->rememberToken();
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
        Schema::dropIfExists('sellers');
    }
};
