<?php

namespace App\Http\Controllers\Models;
use Illuminate\Database\Eloquent\Model;

// Modèle Patient
class Patient extends Model
{
    protected $table = 'patients';
    public $timestamps = false;
    
    // Join de visite. De 1 à Plusieurs.
    public function visite() {
        return $this->hasMany('App\Http\Controllers\Models\Visite', 'idPatient', 'id');
    }
    
    // Join de medecin. De 1 à 1.
    public function medecin() {
        return $this->hasOne('App\Http\Controllers\Models\Medecin', 'id', 'idMedecin');
    }
}

?>
