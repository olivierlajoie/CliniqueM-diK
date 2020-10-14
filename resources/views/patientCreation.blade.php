@extends('template')

@section('titre')
    Gestion des Patients
@endsection

@section('titrehead')
    Système de gestion des patients
@endsection

@section('contenu')
    <h4>Création d'un patient</h4>
    <?php 
        $patients->prepend('Aucune', 0);
        $patients->prepend('Nouvelle', $patients->count() + 1);
    ?>

    <div class="col-xs-10 col-xs-offset-1">
        {!! Form::open(['url' => 'patient']) !!}
        {!! Form::text('prenom', null, ['class' => 'form-control', 'placeholder' => 'Prénom']) !!}
        {!! $errors->first('prenom', '<small class="help-block">:message</small>') !!}
        {!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
        {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
        {!! Form::text('nam', null, ['class' => 'form-control', 'placeholder' => 'Numero Assurance Maladie']) !!}
        {!! $errors->first('nam', '<small class="help-block">:message</small>') !!}
        {!! Form::text('date', null, ['class' => 'form-control', 'placeholder' => 'Date Naissance (YYYY-MM-JJ)']) !!}
        {!! $errors->first('date', '<small class="help-block">:message</small>') !!}
        {!! Form::text('adresse', null, ['class' => 'form-control', 'placeholder' => 'Adresse Postale']) !!}
        {!! $errors->first('adresse', '<small class="help-block">:message</small>') !!}
        {!! Form::text('tel', null, ['class' => 'form-control', 'placeholder' => 'Téléphone']) !!}
        {!! $errors->first('tel', '<small class="help-block">:message</small>') !!}
        {!! Form::select('idMedecin', $medecins, 0, ['class' => 'form-control', 'placeholder' => 'Selectionner le médecin de famille']) !!}
        {!! $errors->first('idMedecin', '<small class="help-block">:message</small>') !!}
        {!! Form::select('idFamille', $patients, 0, ['class' => 'form-control', 'placeholder' => 'Selectionner la famille']) !!}
        {!! $errors->first('idFamille', '<small class="help-block">:message</small>') !!}
        </br>
        {!! Form::button('Créer le patient', array('title'=>'Créer', 'class'=>'btn btn-success btn-align', 'type'=>'submit')) !!}
        {!! Form::close() !!}
    </div>

@endsection

@section('buttons')
    <a title='Retour' class='btn btn-primary' href='{{{ URL::route('patient.index') }}}'>Retour</a>
@endsection
