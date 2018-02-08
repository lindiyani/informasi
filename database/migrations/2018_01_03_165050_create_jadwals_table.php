<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
           $table->increments('id');
            $table->string('hari');
            $table->integer('jam');
             $table->integer('guru_id')->unsigned();
            $table->integer('kelas_id')->unsigned();
            $table->timestamps();
        });
         Schema::table('jadwals', function($table) {
             $table->foreign('guru_id')->references('id')->on('gurus')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('kelas_id')->references('id')->on('kelas')->onUpdate('cascade')->onDelete('restrict');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwals');
    }
}
