<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilitysinglesTable extends Migration
{

    public function up()
    {
        Schema::create('facilitysingles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('contents')->nullable();
            $table->string('img')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('facilitysingles');
    }
}
