<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreationConges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('conges', function (Blueprint $table) {
            $table->increments('id_conges');
            $table->integer('utilisateur_id')->unsigned()->index();
            $table->timestamp('dateDebut');
            $table->timestamp('dateFin');
            $table->boolean('validation');
            $table->timestamps();
            $table->foreign('utilisateur_id')->references('id')->on('utilisateurs')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('conges');
    }
}
