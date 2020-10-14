<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Visite extends Migration
{
    public function up()
    {
        Schema::create('visites', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('idMedecin')->unsigned();
            $table->integer('idPatient')->unsigned();
            $table->dateTime('date', 20);
            $table->string('but', 255);
            $table->string('diagnostic', 20);
            $table->string('traitement', 20);
            $table->double('frais');
        });
        
        Schema::table('visites', function(Blueprint $table) {
            $table->foreign('idMedecin')->references('id')->on('medecins');
            $table->foreign('idPatient')->references('id')->on('patients');
        });
    }

    public function down()
    {
        Schema::drop('visites');
    }
}
