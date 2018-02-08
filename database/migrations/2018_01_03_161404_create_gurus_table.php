<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gurus', function (Blueprint $table) {
            $table->increments('id');
             $table->string('nama');
              $table->text('alamat');
               $table->string('nohp');
                $table->integer('mapel_id')->unsigned();
            $table->timestamps();
        });
         Schema::table('gurus', function($table) {

            $table->foreign('mapel_id')->references('id')->on('mapels')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gurus');
    }
}
