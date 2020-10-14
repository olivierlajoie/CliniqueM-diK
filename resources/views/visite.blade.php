@extends('template')

@section('titre')
    Gestion des Visites
@endsection

@section('titrehead')
    Système de gestion des visites
@endsection

@section('contenu')
    <h4>Affichage des visites</h4>
    <?php 
        echo "<ul class='list-group ulmedecin'>";
        if ($visites->count() == 0) { echo "Aucune Visite"; };
        foreach ($visites as $uneVisite) { ?>
            
            <li class='list-group-item'>
            <div class='left'>Patient: {{ $uneVisite->patient->prenom }} {{ $uneVisite->patient->nom }} - Médecin: {{ $uneVisite->medecin->prenom }} {{ $uneVisite->medecin->nom }} - {{ $uneVisite->date }}</div>
            <div class='right'>
            <a title='Afficher' class='btn btn-primary btn-align' href='./visite/{{ $uneVisite->id }}'><span class='glyphicon glyphicon-list-alt' aria-hidden='true'></span></a>
            <a title='Modifier' class='btn btn-success btn-align' href='./visite/{{ $uneVisite->id }}/edit'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>
            
            {!! Form::open(['method' => 'DELETE', 'route' => ['visite.destroy', $uneVisite->id]]) !!}
            {!! Form::hidden('id', $uneVisite->id) !!}
            {!! Form::button('<span class="glyphicon glyphicon-remove"></span>', array('title'=>'Suprimer', 'class'=>'btn btn-danger', 'type'=>'submit')) !!}
            {!! Form::close() !!}
    
            </div></li>
      
        <?php } ?>
        </ul>
@endsection

@section('buttons')
    <a title='Créer' class='btn btn-primary' href='./visite/create'>Créer une visite</a>
    <a title='Retour' class='btn btn-primary' href='{{{ URL::route('accueil') }}}'>Retour</a>
@endsection