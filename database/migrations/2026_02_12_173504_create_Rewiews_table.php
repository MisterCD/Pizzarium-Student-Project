<?php

namespace Database\Migrations;

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
        Schema::create('Rewiews', function (Blueprint $table) {
            $table->integer('id')->nullable(false)->autoIncrement();
            $table->integer('user_id')->nullable(false);
            $table->integer('stars')->nullable(false);
            $table->string("text", 200);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Basket');
    }
};