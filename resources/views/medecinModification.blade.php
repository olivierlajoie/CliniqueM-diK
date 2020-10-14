@extends('template')

@section('titre')
    Gestion des Médecins
@endsection

@section('titrehead')
    Système de gestion des médecins
@endsection

@section('contenu')
    <h4>Modification d'un médecin</h4>
    
    <?php 
        if (!$medecin) { echo "Aucun médecin sous cette ID"; } else { ?>
            {!! Form::open(['method' => 'PUT', 'route' => ['medecin.update', $medecin->id]]) !!}
            {!! Form::hidden('id', $medecin->id) !!}
            {!! Form::text('prenom', $medecin->prenom, ['class' => 'form-control', 'placeholder' => 'Prénom']) !!}
            {!! $errors->first('prenom', '<small class="help-block">:message</small>') !!}
            {!! Form::text('nom', $medecin->nom, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
            {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
            {!! Form::text('specialisation', $medecin->specialisation, ['class' => 'span8 form-control', 'placeholder' => 'Spécialisation']) !!}
            {!! $errors->first('specialisation', '<small class="help-block">:message</small>') !!}  
            </br>
            {!! Form::button('Mettre à jour', array('title'=>'Mettre à jour', 'class'=>'btn btn-success', 'type'=>'submit')) !!}
            {!! Form::close() !!}
    <?php
        }
    ?>
@endsection

@section('buttons')
    <a title='Retour' class='btn btn-primary' href='{{{ URL::route('medecin.index') }}}'>Retour</a>
@endsection

