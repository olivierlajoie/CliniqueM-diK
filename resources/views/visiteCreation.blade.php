@extends('template')

@section('titre')
    Gestion des Visites
@endsection

@section('titrehead')
    Système de gestion des visites
@endsection

@section('contenu')
    <h4>Création d'une visite</h4>

    <div class="col-xs-10 col-xs-offset-1">
        {!! Form::open(['url' => 'visite']) !!}
        {!! Form::select('idMedecin', $medecins, null, ['class' => 'form-control', 'placeholder' => 'Selectionner le médecin']) !!}
        {!! $errors->first('idMedecin', '<small class="help-block">:message</small>') !!}
        {!! Form::select('idPatient', $patients, null, ['class' => 'form-control', 'placeholder' => 'Selectionner le patient']) !!}
        {!! $errors->first('idPatient', '<small class="help-block">:message</small>') !!}
        {!! Form::text('date', null, ['class' => 'form-control', 'placeholder' => 'Date (YYYY-MM-JJ)']) !!}
        {!! $errors->first('date', '<small class="help-block">:message</small>') !!}
        {!! Form::text('but', null, ['class' => 'span8 form-control', 'placeholder' => 'But']) !!}
        {!! $errors->first('but', '<small class="help-block">:message</small>') !!}
        {!! Form::text('diagnostic', null, ['class' => 'form-control', 'placeholder' => 'Diagnostic']) !!}
        {!! $errors->first('diagnostic', '<small class="help-block">:message</small>') !!}
        {!! Form::text('traitement', null, ['class' => 'span8 form-control', 'placeholder' => 'Traitement']) !!}
        {!! $errors->first('traitement', '<small class="help-block">:message</small>') !!}
        {!! Form::text('frais', null, ['class' => 'span8 form-control', 'placeholder' => 'Frais']) !!}
        {!! $errors->first('frais', '<small class="help-block">:message</small>') !!}
        </br>
        {!! Form::button('Créer la visite', array('title'=>'Créer', 'class'=>'btn btn-success btn-align', 'type'=>'submit')) !!}
        {!! Form::close() !!}
    </div>

@endsection

@section('buttons')
    <a title='Retour' class='btn btn-primary' href='{{{ URL::route('visite.index') }}}'>Retour</a>
@endsection