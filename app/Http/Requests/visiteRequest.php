<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class visiteRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    // Règles d'envoie du formulaire visite.
    public function rules()
    {
        return [
            'idMedecin' => 'required',
            'idPatient' => 'required',
            'date' => ['required', 'min:10', 'max:10', 'regex:/^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/'],
            'but' => 'required|min:5|max:255',
            'diagnostic' => 'required|min:5|max:20',
            'traitement' => 'required|min:5|max:20',
            'frais' => 'required|numeric'
        ];
    }
}
