<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDinningsTable extends Migration
{

    public function up()
    {
        Schema::create('dinnings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('contents')->nullable();
            $table->longText('facility')->nullable();
            $table->string('img')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('dinnings');
    }
}
