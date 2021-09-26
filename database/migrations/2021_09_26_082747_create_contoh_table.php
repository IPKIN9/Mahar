<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContohTable extends Migration
{

    public function up()
    {
        Schema::create('contoh', function (Blueprint $table) {
            $table->id();
            $table->string('contoh');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contoh');
    }
}
