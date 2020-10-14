<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Patient extends Migration
{
    public function up()
    {
        Schema::create('patients', function(Blueprint $table) {
            $table->increments('id');
            $table->string('numeroAssMaladie', 12)->unique();
            $table->string('prenom', 20);
            $table->string('nom', 20);
            $table->date('dateNaissance');
            $table->string('adresse', 255);
            $table->string('noTelephone', 10);
            $table->integer('idMedecin')->unsigned();
            $table->integer('idFamille')->unsigned()->nullable();

        });
        
        Schema::table('patients', function($table) {
           $table->foreign('idMedecin')->references('id')->on('medecins');
        });
    }

    public function down()
    {
        Schema::drop('patients');
    }
}
