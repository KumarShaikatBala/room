<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutsTable extends Migration
{

    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('about')->nullable();
            $table->string('img')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('abouts');
    }
}
