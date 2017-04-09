<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableIntermediaire extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiant_horaire', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('etudiant_id')->unsigned()->index();
            $table->integer('horaire_id')->unsigned()->index();
            $table->foreign('etudiant_id')->references('id')->on('etudiants')->onDelete('cascade');
            $table->foreign('horaire_id')->references('id_horaire')->on('horaires')->onDelete('cascade');

           
        });
       /* Schema::table('etudiants', function (Blueprint $table) {
            $table->foreign('contrat_id')->references('id')->on('contrats');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('etudiant_horaire');
    }
}
