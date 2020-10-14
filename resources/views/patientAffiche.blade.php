@extends('template')

@section('titre')
    Gestion des Patients
@endsection

@section('titrehead')
    Système de gestion des patients
@endsection

@section('contenu')
    </br>
    <h4>Affichage d'un patient</h4>

    <?php 
        if (!$patient) { echo "Aucun patient sous cette ID"; } else {
            echo "Nom Complet: ".$patient->prenom." ".$patient->nom."</br>"; 
            echo "Numéro d'assurance maladie: ".$patient->numeroAssMaladie."</br>";
            echo "Date de naissance: ".$patient->dateNaissance."</br>"; 
            echo "Adresse: ".$patient->adresse."</br>"; 
            echo "Numero de téléphone: ".$patient->noTelephone."</br>"; 
            echo "Médecin de famille: ".$patient->medecin->prenom." ".$patient->medecin->nom."</br>"; 
        }
    ?>
    <?php

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $debut = $dateDebut." 00:00:00";
            $fin = $dateFin." 00:00:00";
            
            echo "<h7>Visites pour la période chosie: ".$visitesByDate->count()."</h7></br>";
            
            echo "<ul class='list-group'>";
            foreach ($visitesByDate as $uneVisite) {
               echo "<li class='list-group-item'>Date: ".$uneVisite->date."</br> Médecin: ".$uneVisite->prenom." ".$uneVisite->nom."</br> But: ".$uneVisite->but."</br> Diagnostic: ".$uneVisite->diagnostic."</br> Traitement: ".$uneVisite->traitement."</br> Frais: ".$uneVisite->frais." $</li>";
            }
            echo "</ul>";
            
        } else {
            
            $dateDebut = '2009-10-10';
            $dateFin = '2016-10-12';
        }
    ?>
    </br></br>
    <h4>Visites par période</h4>
    
    {!! Form::open(['method' => 'POST', 'route' => ['patient.dateVisite', $patient->id]]) !!}
    {!! Form::hidden('id', $patient->id) !!}
    {!! Form::label('debut', 'Date de début') !!}
    {!! Form::text('debut', $dateDebut, ['class' => 'form-control', 'placeholder' => 'Date de début (YYYY-MM-DD)']) !!}
    {!! $errors->first('debut', '<small class="help-block">:message</small>') !!}
    {!! Form::label('debut', 'Date de fin') !!} 
    {!! Form::text('fin', $dateFin, ['class' => 'form-control', 'placeholder' => 'Date de fin (YYYY-MM-DD)']) !!}
    {!! $errors->first('fin', '<small class="help-block">:message</small>') !!}
    </br>
    {!! Form::submit('Rechercher', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
@endsection

@section('buttons')
    <a title='Retour' class='btn btn-primary' href='{{{ URL::route('patient.index') }}}'>Retour</a>
@endsection
