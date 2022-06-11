<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministrateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrateurs', function (Blueprint $table) {
            $table->bigIncrements('id'); //
            $table->string('numero_tel');//
            $table->string('cin');//
            $table->string('nom'); //
            $table->string('prenom');//
            $table->string('email')->unique();//
            $table->date('date_naissance');
            $table->string('pseudo');//
            $table->string('mot_de_passe');//
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
        Schema::dropIfExists('administrateurs');
    }
}
