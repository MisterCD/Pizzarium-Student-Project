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
        Schema::create('Users', function (Blueprint $table) {
            $table->integer('id')->nullable(false)->autoIncrement();
            $table->string('username', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string("adress",255)->nullable(true);
            $table->text('password')->nullable();
            $table->float('vallet')->nullable(false)->default(0);
            $table->string("tel", 100)->nullable(false);
            $table->string("avatar", 255)->default("./images/avatar.svg");
            $table->boolean("isAdmin")->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Users');
    }
};