<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class medecinRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    // Règles d'envoie du formulaire médecin.
    public function rules()
    {
        return [
            'prenom' => 'required|min:3|max:20|alpha',
            'nom' => 'required|min:3|max:20|alpha',
            'specialisation' => 'required|min:5|max:20|alpha'
        ];
    }
}
