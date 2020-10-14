@extends('template')

@section('titre')
    Gestion des Patients
@endsection

@section('titrehead')
    Système de gestion des patients
@endsection

@section('contenu')
    <h4>Affichage des patients</h4>
    <?php 
        echo "<ul class='list-group ulmedecin'>";
        if ($patients->count() == 0) { echo "Aucun Patient"; };
        foreach ($patients as $unPatient) { ?>
            
            <li class='list-group-item'>
            <div class='left'>{{ $unPatient->prenom }} {{ $unPatient->nom }}</div>
            <div class='right'>
            <a title='Afficher' class='btn btn-primary btn-align' href='./patient/{{ $unPatient->id }}'><span class='glyphicon glyphicon-list-alt' aria-hidden='true'></span></a>
            <a title='Modifier' class='btn btn-success btn-align' href='./patient/{{ $unPatient->id }}/edit'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>

            {!! Form::open(['method' => 'DELETE', 'route' => ['patient.destroy', $unPatient->id]]) !!}
            {!! Form::hidden('id', $unPatient->id) !!}
            <?php if ($unPatient->visite->count() ==  0) { ?>
                {!! Form::button('<span class="glyphicon glyphicon-remove"></span>', array('title'=>'Suprimer', 'class'=>'btn btn-danger', 'type'=>'submit')) !!}
            <?php } else { ?>
                {!! Form::button('<span class="glyphicon glyphicon-remove"></span>', array('title'=>'Suprimer', 'class'=>'btn btn-danger disabled')) !!}
            <?php } ?>
            {!! Form::close() !!}
    <?php
            
            echo "</div></li>";
        }
        echo "</ul>";
    ?>
@endsection

@section('buttons')
    <a title='Créer' class='btn btn-primary' href='./patient/create'>Créer un patient</a>
    <a title='Retour' class='btn btn-primary' href='{{{ URL::route('accueil') }}}'>Retour</a>
@endsection