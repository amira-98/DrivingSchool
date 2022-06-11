<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoniteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moniteurs', function (Blueprint $table) {
            $table->bigIncrements('id');//
            $table->string('nom');//
            $table->string('numero_tel');//
            $table->string('prenom');//
            $table->string('email')->unique();//
            $table->date('date_naissance');//
            $table->string('pseudo');//
            $table->string('mot_de_passe');//
            $table->float('salaire');//
            $table->date('date_embauche');//
            $table->string('cin');//
            

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
        Schema::dropIfExists('moniteurs');
    }
}
