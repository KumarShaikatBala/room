<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingsTable extends Migration
{

    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('contents')->nullable();
            $table->longText('facility')->nullable();
            $table->string('img')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('meetings');
    }
}
