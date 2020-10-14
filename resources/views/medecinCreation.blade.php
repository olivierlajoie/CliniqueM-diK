@extends('template')

@section('titre')
    Gestion des Médecins
@endsection

@section('titrehead')
    Système de gestion des médecins
@endsection

@section('contenu')
    <h4>Création d'un médecin</h4>

    <div class="col-xs-10 col-xs-offset-1">
        {!! Form::open(['url' => 'medecin']) !!}
        {!! Form::text('prenom', null, ['class' => 'form-control', 'placeholder' => 'Prénom']) !!}
        {!! $errors->first('prenom', '<small class="help-block">:message</small>') !!}
        {!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
        {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
        {!! Form::text('specialisation', null, ['class' => 'span8 form-control', 'placeholder' => 'Spécialisation']) !!}
        {!! $errors->first('specialisation', '<small class="help-block">:message</small>') !!}
        </br>
        {!! Form::button('Créer le médecin', array('title'=>'Créer', 'class'=>'btn btn-success btn-align', 'type'=>'submit')) !!}
        {!! Form::close() !!}
    </div>

@endsection

@section('buttons')
    <a title='Retour' class='btn btn-primary' href='{{{ URL::route('medecin.index') }}}'>Retour</a>
@endsection
