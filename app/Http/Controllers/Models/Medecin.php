<?php

namespace App\Http\Controllers\Models;
use Illuminate\Database\Eloquent\Model;

// Modèle Médecin
class Medecin extends Model
{
    protected $table = 'medecins';
    public $timestamps = false;
    
    // Join de la table visite. De 1 à Plusieurs.
    public function visite() {
        return $this->hasMany('App\Http\Controllers\Models\Visite', 'idMedecin', 'id');
    }
    
    // Join de la table patient. De 1 à Plusieurs.
    public function patient() {
        return $this->hasMany('App\Http\Controllers\Models\Patient', 'idMedecin', 'id');
    }
}