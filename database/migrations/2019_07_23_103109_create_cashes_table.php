<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCashesTable extends Migration
{

    public function up()
    {
        Schema::create('cashes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date')->nullable();
            $table->string('amount')->nullable();
            $table->integer('status')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('room_id')->nullable();
            $table->integer('booking_id')->nullable();
            $table->integer('room')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cashes');
    }
}
