<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date')->nullable();
            $table->integer('category_id')->unsigned()->nullable()->unique();
            $table->mediumText('type')->nullable();
            $table->longText('contents')->nullable();
            $table->longText('facility')->nullable();
            $table->string('total')->nullable();
            $table->string('available')->nullable();
            $table->string('price')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
