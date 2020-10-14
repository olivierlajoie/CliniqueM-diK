<?php

namespace App\Http\Controllers\Models;
use Illuminate\Database\Eloquent\Model;

// Modèle Visite.
class Visite extends Model
{
    protected $table = 'visites';
    public $timestamps = false;
    
    // Join inversé de médecin.
    public function medecin() {
        return $this->belongsTo('App\Http\Controllers\Models\Medecin', 'idMedecin', 'id');
    }
    
    // Join inversé de patient.
    public function patient() {
        return $this->belongsTo('App\Http\Controllers\Models\Patient', 'idPatient', 'id');
    }
}
