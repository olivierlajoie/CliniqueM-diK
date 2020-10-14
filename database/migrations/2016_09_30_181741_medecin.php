<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Medecin extends Migration
{
    public function up()
    {
        Schema::create('medecins', function(Blueprint $table) {
            $table->increments('id');
            $table->string('prenom', 20);
            $table->string('nom', 20);
            $table->string('specialisation', 20);
        });
        
        
    }

    public function down()
    {
        Schema::drop('medecins');
    }
}
