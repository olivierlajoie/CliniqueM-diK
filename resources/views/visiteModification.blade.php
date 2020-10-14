@extends('template')

@section('titre')
    Gestion des Visites
@endsection

@section('titrehead')
    Système de gestion des visites
@endsection

@section('contenu')
    <h4>Modification d'une visite</h4>
    
    <?php 
        if (!$visite) { echo "Aucune visite sous cette ID"; } else { ?>
            {!! Form::open(['method' => 'PUT', 'route' => ['visite.update', $visite->id]]) !!}
            {!! Form::hidden('id', $visite->id) !!}
            {!! Form::select('idMedecin', $medecins, $visite->idMedecin, ['class' => 'form-control', 'placeholder' => 'Selectionner le médecin']) !!}
            {!! $errors->first('idMedecin', '<small class="help-block">:message</small>') !!}
            {!! Form::select('idPatient', $patients, $visite->idPatient, ['class' => 'form-control', 'placeholder' => 'Selectionner le patient']) !!}
            {!! $errors->first('idPatient', '<small class="help-block">:message</small>') !!}
            {!! Form::text('date', $visite->date, ['class' => 'form-control', 'placeholder' => 'Date (YYYY-MM-JJ)']) !!}
            {!! $errors->first('date', '<small class="help-block">:message</small>') !!}
            {!! Form::text('but', $visite->but, ['class' => 'span8 form-control', 'placeholder' => 'But']) !!}
            {!! $errors->first('but', '<small class="help-block">:message</small>') !!}
            {!! Form::text('diagnostic', $visite->diagnostic, ['class' => 'form-control', 'placeholder' => 'Diagnostic']) !!}
            {!! $errors->first('diagnostic', '<small class="help-block">:message</small>') !!}
            {!! Form::text('traitement', $visite->traitement, ['class' => 'span8 form-control', 'placeholder' => 'Traitement']) !!}
            {!! $errors->first('traitement', '<small class="help-block">:message</small>') !!}
            {!! Form::text('frais', $visite->frais, ['class' => 'span8 form-control', 'placeholder' => 'Frais']) !!}
            {!! $errors->first('frais', '<small class="help-block">:message</small>') !!}
            </br>
            {!! Form::button('Mettre à jour', array('title'=>'Mettre à jour', 'class'=>'btn btn-success', 'type'=>'submit')) !!}
            {!! Form::close() !!}
    <?php
        }
    ?>
@endsection

@section('buttons')
    <a title='Retour' class='btn btn-primary' href='{{{ URL::route('visite.index') }}}'>Retour</a>
@endsection