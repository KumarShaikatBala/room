<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlider2sTable extends Migration
{

    public function up()
    {
        Schema::create('slider2s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('heading_1')->nullable();
            $table->string('heading_2')->nullable();
            $table->longText('description')->nullable();
            $table->string('slider_image')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('slider2s');
    }
}
