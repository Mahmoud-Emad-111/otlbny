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
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->string('company');
            $table->string('phone',11)->unique();
            $table->string('extra_phone',11)->unique()->nullable();
            $table->string('national_id');
            $table->string('password');
            $table->string('address');
            $table->integer('minimum_shipping')->nullable();
            $table->integer('maximum_shipping')->nullable();
            $table->enum('status',['pending','accepted'])->default('pending');
            $table->tinyInteger('commission')->nullable();
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
        Schema::dropIfExists('merchants');
    }
};
