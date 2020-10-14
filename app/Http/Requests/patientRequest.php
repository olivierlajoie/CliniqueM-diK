<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class patientRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }
    
    // Règles d'envoie du formulaire patient.
    public function rules()
    {
        return [
            'prenom' => 'required|min:3|max:20|alpha',
            'nom' => 'required|min:3|max:20|alpha',
            'date' => ['required', 'min:10', 'max:10', 'regex:/^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/'],
            'adresse' => 'required|min:5|max:255',
            'tel' => 'required|digits:10',
            'nam' => 'required|min:12|max:12',
            'idMedecin' => 'required',
            'idFamille' => 'required'
        ];
    }
}
