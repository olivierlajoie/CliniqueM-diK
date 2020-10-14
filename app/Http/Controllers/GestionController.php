<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Requests;
use App\Http\Controllers\Models\Visite;
use App\Http\Controllers\Models\Medecin;
use App\Http\Controllers\Models\Patient;
use DB;

// Controlleur des statistiques.
class GestionController extends Controller
{
    // Fonction d'affichage de l'acceuil.
    public function accueil() {
        return view('gestion');
    }
    
    // Fonction d'affichage des statistiques.
    public function clinique() {
        $lesPatients = Patient::all();
        $lesVisites = Visite::all();
        $lesMedecins = Medecin::all();
        
        $lesVisitesParFamille = DB::table('visites')->selectRaw('COUNT(*) as count, idFamille, nom')->join('patients', 'visites.idPatient', '=', 'patients.id')->groupBy(['idFamille', 'nom'])->get();
        $lesAnneesDesVisites = DB::table('visites')->selectRaw('YEAR(date) as date')->distinct()->orderBy('date')->get();
        $lesVisitesParAnnee = DB::table('visites')->selectRaw('COUNT(*) as count, SUM(frais) as total')->whereRaw('YEAR(date) = 1994 AND idMedecin = 1')->get();
        
        $tableauAvg = array();
        $tableauVisite = array();
        $tableauVisitePatient = array();
        
        // Les Visites par années
        foreach($lesAnneesDesVisites as $uneAnnee) {
            
            foreach($lesMedecins as $unMedecin) {
                $query = Visite::selectRaw('COUNT(*) as count, IFNULL(SUM(frais), 0) as total')->whereRaw('YEAR(date) = :date AND idMedecin = :medecin', ['date' => $uneAnnee->date, 'medecin' => $unMedecin->id])->get()->first();
                $tableauVisite[$uneAnnee->date][$unMedecin->id] = array($query->total, $query->count);
            }
        }
        
        // Les Visites par jours de travail pour médecin.
        foreach($lesMedecins as $unMedecin) {
            
            for ($jour = 0; $jour <= 6; $jour++) {
                $query = Visite::whereRaw('WEEKDAY(date) = :date AND idMedecin = :medecin', ['date' => $jour, 'medecin' => $unMedecin->id])->count();
                $tableauAvg[$unMedecin->id][$jour] = $query;
            }
        }
        
        // Les Visites par jours de travail pour patient.
        foreach($lesPatients as $unPatient) {
            
            for ($jour = 0; $jour <= 6; $jour++) {
                $query = Visite::whereRaw('WEEKDAY(date) = :date AND idPatient = :patient', ['date' => $jour, 'patient' => $unPatient->id])->count();
                $tableauVisitePatient[$unPatient->id][$jour] = $query;
            }
        }

        return view('clinique')->with(['visites' => $lesVisites, 'medecins' => $lesMedecins, 'patient' => $lesPatients, 'visitesParFamille' => $lesVisitesParFamille, 'annees' => $lesAnneesDesVisites, 'avgParJour' => $tableauAvg, 'visiteParAnnee' => $tableauVisite, 'visitesParPatient' => $tableauVisitePatient]);
    }
}
