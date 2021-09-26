<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemutakhiranTable extends Migration
{
    public function up()
    {
        Schema::create('pemutakhiran', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_temuan');
            $table->integer('pagu_anggaran');
            $table->string('ket');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemutakhiran');
    }
}
