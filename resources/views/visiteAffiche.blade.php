@extends('template')

@section('titre')
    Gestion des Visites
@endsection

@section('titrehead')
    Système de gestion des visites
@endsection

@section('contenu')
    </br>
    <h4>Affichage d'une visite</h4>

    <?php 
        if (!$visite) { echo "Aucune visite sous cette ID"; } else {
            echo "Identification: ".$visite->id."</br> Date: ".$visite->date."</br> Patient: ".$visite->patient->prenom." ".$visite->patient->nom."</br> Médecin: ".$visite->medecin->prenom." ".$visite->medecin->nom."</br> But: ".$visite->but."</br> Diagnostic: ".$visite->diagnostic."</br> Traitement: ".$visite->traitement."</br> Frais: ".$visite->frais." $"; 
        }
    ?>
@endsection

@section('buttons')
    <a title='Retour' class='btn btn-primary' href='{{{ URL::route('visite.index') }}}'>Retour</a>
@endsection