<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatementsTable extends Migration
{

    public function up()
    {
        Schema::create('statements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date')->nullable();
            $table->string('rooms')->nullable();
            $table->string('booked')->nullable();
            $table->string('available')->nullable();
            $table->string('rent')->nullable();
            $table->string('opening')->nullable();
            $table->string('closing')->nullable();
            $table->string('card')->nullable();
            $table->string('cash')->nullable();
            $table->string('expense')->nullable();
            $table->string('due')->nullable();
           /* $table->unsignedInteger('booking_id')->nullable();
            $table->unsignedInteger('expense_id')->nullable();
            $table->unsignedInteger('payment_id')->nullable();*/
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('statements');
    }
}
