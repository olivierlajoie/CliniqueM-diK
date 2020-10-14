@extends('template')

@section('titre')
    Gestion des Médecins
@endsection

@section('titrehead')
    Système de gestion des médecins
@endsection

@section('contenu')
    </br>
    <h4>Affichage d'un médecin</h4>

    <?php 
        if (!$medecin) { echo "Aucun médecin sous cette ID"; } else {
            echo "Nom Complet: ".$medecin->prenom." ".$medecin->nom."</br>";
            echo "Spécialisation: ".$medecin->specialisation; 
        }
    ?>
    
    </br></br>
    <h4>Montants par période</h4>
    
    <?php
        $visites = $medecin->visite;

        $total = 0;
        foreach ($visites as $uneVisite) {
           $total = $total + $uneVisite->frais;
        }

        echo "<h7>Total pour toutes les visites: ".$total." $</h7></br>";

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $debut = $dateDebut." 00:00:00";
            $fin = $dateFin." 00:00:00";

            $total = 0;
            foreach ($visitesByDate as $uneVisite) {
               $total = $total + $uneVisite->frais;
            }
            echo "<h7>Total pour la période chosie: ".$total." $</h7></br>";
        } else {
            
            $dateDebut = '2000-01-01';
            $dateFin = '2016-01-01';
        }
    ?>
    
    {!! Form::open(['method' => 'POST', 'route' => ['medecin.dateVisite', $medecin->id]]) !!}
    {!! Form::hidden('id', $medecin->id) !!}
    {!! Form::label('debut', 'Date de début') !!}
    {!! Form::text('debut', $dateDebut, ['class' => 'form-control', 'placeholder' => 'Date de début (YYYY-MM-DD)']) !!}
    {!! $errors->first('debut', '<small class="help-block">:message</small>') !!}
    {!! Form::label('debut', 'Date de fin') !!} 
    {!! Form::text('fin', $dateFin, ['class' => 'form-control', 'placeholder' => 'Date de fin (YYYY-MM-DD)']) !!}
    {!! $errors->first('fin', '<small class="help-block">:message</small>') !!}
    </br>
    {!! Form::submit('Rechercher', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}

    </br></br>
    <h4>Liste des patients traités</h4>

    <?php
        $visites = $medecin->visite;
        echo "<ul class='list-group'>";
        if ($visites->count() != 0) {
            foreach ($visites as $uneVisite) { 
                echo "<li class='list-group-item'>Date: ".$uneVisite->date."</br> NAM: ".$uneVisite->patient->numeroAssMaladie."</br> Nom: ".$uneVisite->patient->prenom." ".$uneVisite->patient->nom."</br> Diagnostic: ".$uneVisite->diagnostic."</br> Traitement: ".$uneVisite->traitement."</li>"; 
            }
        } else {
            echo "Aucun patient traité.";
        }
        echo "</ul>";
    ?>

@endsection

@section('buttons')
    <a title='Retour' class='btn btn-primary' href='{{{ URL::route('medecin.index') }}}'>Retour</a>
@endsection