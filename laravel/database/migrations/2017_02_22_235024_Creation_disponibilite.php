<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreationDisponibilite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('disponibilites', function (Blueprint $table) {
            $table->increments('id_dispo');
            $table->integer('jour_id')->unsigned()->index();
            $table->integer('etudiant_id')->unsigned()->index();
            $table->time('heureDebut');
            $table->time('heureFin');
            $table->boolean('valider');
            $table->timestamps();
            $table->foreign('etudiant_id')->references('id')->on('etudiants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('disponibilite');
    }
}
