@extends('template')

@section('titre')
    Gestion de la clinique
@endsection

@section('titrehead')
    Système de gestion de la clinique
@endsection

@section('contenu')
    <h4>Affichage des statistiques</h4>

    <div class="alert alert-info" role="alert"><strong>Nombre de visites par patient</strong></div>
    
    <?php 
        foreach($patient as $unPatient) {
            echo $unPatient->prenom." ".$unPatient->nom.": ";
            echo $unPatient->visite->count()." Visites</br>";
        }
    ?>
    </br>

    <div class="alert alert-info" role="alert"><strong>Nombre de patients par médecin par année</strong></div>
    
    <?php 
        foreach($annees as $uneAnnee) { ?>
            <div class="panel panel-success">
              <div class="panel-heading">
                <h3 class="panel-title">{{ $uneAnnee->date }}</h3>
              </div>
              <div class="panel-body">
                <?php 
                    foreach($medecins as $unMedecin) {
                        echo $unMedecin->prenom." ".$unMedecin->nom.": ";
                        echo $visiteParAnnee[$uneAnnee->date][$unMedecin->id][0]." $ de frais ainsi que ".$visiteParAnnee[$uneAnnee->date][$unMedecin->id][1]." patients </br>";
                    }
                ?>
              </div>
            </div>
    <?php } ?>

    <div class="alert alert-info" role="alert"><strong>Nombre moyen de patients par médecin par jour d'une semaine</strong></div>

    <?php
        foreach($medecins as $unMedecin) { ?>
            <div class="panel panel-success">
              <div class="panel-heading">
                <h3 class="panel-title">{{ $unMedecin->prenom }} {{ $unMedecin->nom }}</h3>
              </div>
              <div class="panel-body">
                  <?php 
                                          
                    for ($jour = 0; $jour <= 6; $jour++) {

                        switch($jour) {
                            case 0: { echo "Les Lundi: "; break;}
                            case 1: { echo "Les Mardi: "; break;}
                            case 2: { echo "Les Mercredi: "; break;}
                            case 3: { echo "Les Jeudi: "; break;}
                            case 4: { echo "Les Vendredi: "; break;}
                            case 5: { echo "Les Samedi: "; break;}
                            case 6: { echo "Les Dimanche: "; break;}
                            default: break;
                        }
                        echo $avgParJour[$unMedecin->id][$jour]." Visites </br>";
                    }
                  ?>
              </div>
            </div>
    <?php } ?>
        
    <div class="alert alert-info" role="alert"><strong>Nombre de patients par médecin de famille</strong></div>
    
    <?php 
        foreach($medecins as $unMedecin) { ?>
            <div class="panel panel-success">
              <div class="panel-heading">
                <h3 class="panel-title"><?php echo $unMedecin->prenom." ".$unMedecin->nom; ?></h3>
              </div>
              <div class="panel-body">
                <?php
                    $patients = $unMedecin->patient;
                    $count = $patients->count();

                    echo "Nombre de patients associés: ".$count."</br>";

                    foreach ($patients as $unPatient) {
                        echo $unPatient->prenom." ".$unPatient->nom."</br>";
                    }
                ?>          
                </div>
            </div>
    <?php } ?>

    <div class="alert alert-info" role="alert"><strong>Nombre de visites moyenne par patient</strong></div>

    <?php
        foreach($patient as $unPatient) { ?>
            <div class="panel panel-success">
              <div class="panel-heading">
                <h3 class="panel-title"><?php echo $unPatient->prenom." ".$unPatient->nom; ?></h3>
              </div>
              <div class="panel-body">
                  <?php 
                                          
                    for ($jour = 0; $jour <= 6; $jour++) {

                        switch($jour) {
                            case 0: { echo "Les Lundi: "; break;}
                            case 1: { echo "Les Mardi: "; break;}
                            case 2: { echo "Les Mercredi: "; break;}
                            case 3: { echo "Les Jeudi: "; break;}
                            case 4: { echo "Les Vendredi: "; break;}
                            case 5: { echo "Les Samedi: "; break;}
                            case 6: { echo "Les Dimanche: "; break;}
                            default: break;
                        }
                        echo $visitesParPatient[$unPatient->id][$jour]." Visites </br>";
                    }
                  ?>
              </div>
            </div>
    <?php } ?>

    <div class="alert alert-info" role="alert"><strong>Nombre de visites par famille</strong></div>

    <?php 
        foreach($visitesParFamille as $uneFamille) { 
            echo "Famille ".$uneFamille->nom.": ".$uneFamille->count." Visites</br>"; 
        }
    ?>
    
@endsection

@section('buttons')
    <a title='Retour' class='btn btn-primary' href='{{{ URL::route('accueil') }}}'>Retour</a>
@endsection