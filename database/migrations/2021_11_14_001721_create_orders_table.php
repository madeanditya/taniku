<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('dest_province');
            $table->string('dest_city');
            $table->string('dest_subdistrict');
            $table->string('dest_address');
            $table->string('dest_postal_code');
            $table->string('dest_fullname');
            $table->string('dest_phone_number');
            $table->string('status');
            $table->string('tax');
            $table->string('username');
            $table->integer('shipper_id');
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
        Schema::dropIfExists('orders');
    }
}
