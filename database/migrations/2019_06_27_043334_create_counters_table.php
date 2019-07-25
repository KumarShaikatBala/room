<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountersTable extends Migration
{

    public function up()
    {
        Schema::create('counters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('counter1')->nullable();
            $table->string('counter1_name')->nullable();
            $table->string('counter2')->nullable();
            $table->string('counter2_name')->nullable();
            $table->string('counter3')->nullable();
            $table->string('counter3_name')->nullable();
            $table->string('counter4')->nullable();
            $table->string('counter4_name')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('counters');
    }
}
