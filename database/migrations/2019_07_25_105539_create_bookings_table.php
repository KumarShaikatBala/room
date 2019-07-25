<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{

    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date')->nullable();
            $table->unsignedInteger('room_id')->unsigned()->nullable();
            $table->unsignedInteger('customer_id')->unsigned()->nullable();
            $table->string('check_in')->nullable();
            $table->string('check_out')->nullable();
            $table->string('room')->nullable();
            $table->string('adult')->nullable();
            $table->string('child')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->mediumText('address')->nullable();
            $table->string('payment')->nullable();
            $table->integer('payment_status')->nullable();
            $table->integer('payment_id')->nullable();
            $table->integer('cash_status')->nullable();
            $table->integer('cash_id')->nullable();
            $table->integer('checkout_status')->nullable();
            $table->integer('publication_status')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
