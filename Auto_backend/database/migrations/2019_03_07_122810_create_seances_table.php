<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->time('HD');
            $table->time('HF');
         
            $table->integer('moniteur_id')->unsigned();
            $table->integer('vehicule_id')->unsigned();
            $table->integer('candidat_id')->unsigned();

            $table->foreign('moniteur_id')->references('id')->on('moniteurs');
            $table->foreign('vehicule_id')->references('id')->on('vehicules');
            $table->foreign('candidat_id')->references('id')->on('candidats');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seances');
    }
}
