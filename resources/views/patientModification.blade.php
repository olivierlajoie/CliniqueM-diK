@extends('template')

@section('titre')
    Gestion des Patients
@endsection

@section('titrehead')
    Système de gestion des patients
@endsection

@section('contenu')
    <h4>Modification d'un patient</h4>
    
    <?php 
        $patients->prepend('Aucune', 0);

        if (!$patient) { echo "Aucun patient sous cette ID"; } else { ?>
            {!! Form::open(['method' => 'PUT', 'route' => ['patient.update', $patient->id]]) !!}
            {!! Form::hidden('id', $patient->id) !!}
            {!! Form::text('prenom', $patient->prenom, ['class' => 'form-control', 'placeholder' => 'Prénom']) !!}
            {!! $errors->first('prenom', '<small class="help-block">:message</small>') !!}
            {!! Form::text('nom', $patient->nom, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
            {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
            {!! Form::text('nam', $patient->numeroAssMaladie, ['class' => 'form-control', 'placeholder' => 'Numero Assurance Maladie']) !!}
            {!! $errors->first('nam', '<small class="help-block">:message</small>') !!}
            {!! Form::text('date', $patient->dateNaissance, ['class' => 'form-control', 'placeholder' => 'Date Naissance (YYYY-MM-JJ)']) !!}
            {!! $errors->first('date', '<small class="help-block">:message</small>') !!}
            {!! Form::text('adresse', $patient->adresse, ['class' => 'form-control', 'placeholder' => 'Adresse Postale']) !!}
            {!! $errors->first('adresse', '<small class="help-block">:message</small>') !!}
            {!! Form::text('tel', $patient->noTelephone, ['class' => 'form-control', 'placeholder' => 'Téléphone']) !!}
            {!! $errors->first('tel', '<small class="help-block">:message</small>') !!}
            {!! Form::select('idMedecin', $medecins, $patient->idMedecin, ['class' => 'form-control', 'placeholder' => 'Selectionner le médecin de famille']) !!}
            {!! $errors->first('idMedecin', '<small class="help-block">:message</small>') !!}
            {!! Form::select('idFamille', $patients, $patient->idFamille, ['class' => 'form-control', 'placeholder' => 'Selectionner la famille']) !!}
            {!! $errors->first('idFamille', '<small class="help-block">:message</small>') !!} 
            </br>
            {!! Form::button('Mettre à jour', array('title'=>'Mettre à jour', 'class'=>'btn btn-success', 'type'=>'submit')) !!}
            {!! Form::close() !!}
    <?php
        }
    ?>
@endsection

@section('buttons')
    <a title='Retour' class='btn btn-primary' href='{{{ URL::route('patient.index') }}}'>Retour</a>
@endsection