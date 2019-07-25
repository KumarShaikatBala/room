<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilitiesTable extends Migration
{

    public function up()
    {
        Schema::create('facilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('room_id')->unsigned()->nullable();
            $table->unsignedInteger('meeting_id')->unsigned()->nullable();
            $table->unsignedInteger('dinning_id')->unsigned()->nullable();
            $table->longText('heading')->nullable();
            $table->longText('facility')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('facilities');
    }
}
