<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResulatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resulats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('question_id')->unsigned();
            $table->foreign('question_id')->references('id')->on('questions');
           
            $table->integer('rapport_id')->unsigned();
            $table->foreign('rapport_id')->references('id')->on('rapports')->onDelete('cascade');
            $table->string('contenu');
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
        Schema::dropIfExists('resulats');
    }
}
