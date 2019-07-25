<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date')->nullable();
            $table->string('amount')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->unsignedInteger('customer_id')->nullable();
            $table->unsignedInteger('room_id')->nullable();
            $table->unsignedInteger('room')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
