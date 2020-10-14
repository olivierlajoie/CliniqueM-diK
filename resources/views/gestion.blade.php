@extends('template')

@section('titre')
    Gestionnaire Médical
@endsection

@section('titrehead')
    Système de gestion médical
@endsection

@section('contenu')
    Bienvenue!
@endsection

@section('buttons')
    <a href="gestion" type="button" class="btn btn-success">Gestion Clinique</a>
    <a href="medecin" type="button" class="btn btn-success">Gestion Médecins</a>
    <a href="patient" type="button" class="btn btn-success">Gestion Patients</a>
    <a href="visite" type="button" class="btn btn-success">Gestion Visites</a>
@endsection