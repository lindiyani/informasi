<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->integer('jurusan_id')->unsigned();
            $table->integer('ruangan_id')->unsigned();
            $table->integer('guru_id')->unsigned();
            $table->timestamps();
        });
         Schema::table('kelas', function($table) {
            $table->foreign('jurusan_id')->references('id')->on('jurusans')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('ruangan_id')->references('id')->on('ruangans')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('guru_id')->references('id')->on('gurus')->onUpdate('cascade')->onDelete('restrict');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelas');
    }
}
