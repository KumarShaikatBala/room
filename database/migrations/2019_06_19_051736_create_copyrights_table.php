<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCopyrightsTable extends Migration
{

    public function up()
    {
        Schema::create('copyrights', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumText('content')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('copyrights');
    }
}
