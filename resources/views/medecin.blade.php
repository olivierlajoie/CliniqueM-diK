@extends('template')

@section('titre')
    Gestion des Médecins
@endsection

@section('titrehead')
    Système de gestion des médecins
@endsection

@section('contenu')
    <h4>Affichage des médecins</h4>
    <?php 
        echo "<ul class='list-group ulmedecin'>";
        if ($medecins->count() == 0) { echo "Aucun Medecin"; };
        foreach ($medecins as $unMedecin) { ?>
            
            <li class='list-group-item'>
            <div class='left'>{{ $unMedecin->prenom }} {{ $unMedecin->nom }}</div>
            <div class='right'>
            <a title='Afficher' class='btn btn-primary btn-align' href='./medecin/{{ $unMedecin->id }}'><span class='glyphicon glyphicon-list-alt' aria-hidden='true'></span></a>
            <a title='Modifier' class='btn btn-success btn-align' href='./medecin/{{ $unMedecin->id }}/edit'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a>
    
            {!! Form::open(['method' => 'DELETE', 'route' => ['medecin.destroy', $unMedecin->id]]) !!}
            {!! Form::hidden('id', $unMedecin->id) !!}
            <?php if ($unMedecin->visite->count() ==  0) { ?>
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
    <a title='Créer' class='btn btn-primary' href='./medecin/create'>Créer un médecin</a>
    <a title='Retour' class='btn btn-primary' href='{{{ URL::route('accueil') }}}'>Retour</a>
@endsection
