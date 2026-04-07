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
        Schema::create('Products', function (Blueprint $table) {
            $table->integer('id')->nullable(false)->autoIncrement();
            $table->integer('type_id')->nullable(false);
            $table->string('name', 255)->nullable();
            $table->string("description", 200)->nullable(false);
            $table->float('cost')->nullable(false);
            $table->string('img', 255)->nullable(false);
            $table->text("description_full")->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Products');
    }
};