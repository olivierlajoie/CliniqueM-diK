<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\patientRequest;
use App\Http\Requests\dateRequest;
use App\Http\Controllers\Models\Visite;
use App\Http\Controllers\Models\Medecin;
use App\Http\Controllers\Models\Patient;
use DB;

// Controlleur des patients. CRUD
class PatientController extends Controller
{

    public function index()
    {
        $lesPatients = Patient::all();
        return view('patient')->with(['patients' => $lesPatients]);
    }

    public function create()
    {
        $lesMedecins = DB::table('medecins as m')->selectRaw('CONCAT("Docteur: ", m.prenom, " ", m.nom) as concatname, m.id')->pluck('concatname', 'm.id');
        $lesPatients = DB::table('patients as p')->selectRaw('CONCAT("Famille: ", p.idFamille, " ", p.nom) as concatname, p.idFamille')->pluck('concatname', 'p.idFamille');
        return view('patientCreation')->with(['medecins' => $lesMedecins, 'patients' => $lesPatients]);
    }

    public function store(patientRequest $request)
    {
        $monPatient = new Patient;
        $monPatient->prenom = $request->input('prenom');
        $monPatient->nom = $request->input('nom');
        $monPatient->numeroAssMaladie = $request->input('nam');
        $monPatient->dateNaissance = $request->input('date');
        $monPatient->adresse = $request->input('adresse');
        $monPatient->noTelephone = $request->input('tel');
        $monPatient->idMedecin = $request->input('idMedecin');
        $monPatient->idFamille = $request->input('idFamille');
        $monPatient->save();
        
        return redirect("patient");
    }

    public function show($id)
    {
        $monPatient = Patient::find($id);
        return view('patientAffiche')->with(['patient' => $monPatient]);
    }

    public function edit($id)
    {
        $monPatient = Patient::find($id);
        $lesMedecins = DB::table('medecins as m')->selectRaw('CONCAT("Docteur: ", m.prenom, " ", m.nom) as concatname, m.id')->pluck('concatname', 'm.id');
        $lesPatients = DB::table('patients as p')->selectRaw('CONCAT("Famille: ", p.idFamille, " ", p.nom) as concatname, p.idFamille')->pluck('concatname', 'p.idFamille');
        return view('patientModification')->with(['patient' => $monPatient, 'medecins' => $lesMedecins, 'patients' => $lesPatients]);
    }

    public function update(patientRequest $request, $id)
    {
        $monPatient = Patient::find($id);
        $monPatient->prenom = $request->input('prenom');
        $monPatient->nom = $request->input('nom');
        $monPatient->numeroAssMaladie = $request->input('nam');
        $monPatient->dateNaissance = $request->input('date');
        $monPatient->adresse = $request->input('adresse');
        $monPatient->noTelephone = $request->input('tel');
        $monPatient->idMedecin = $request->input('idMedecin');
        $monPatient->idFamille = $request->input('idFamille');
        $monPatient->save();
        
        return redirect("patient");
    }

    public function destroy($id)
    {
        Patient::destroy($id);
        return redirect("patient");
    }
    
    public function dateVisite(dateRequest $request, $id) 
    {
        $monPatient = Patient::find($id);
        $LesVisites = DB::table('visites')->join('medecins', 'visites.idMedecin', '=', 'medecins.id')->where('idPatient', $monPatient->id)->whereBetween('date', array($request->input('debut'), $request->input('fin')))->get();
        return view('patientAffiche')->with(['patient' => $monPatient, 'visitesByDate' => $LesVisites, 'dateDebut' => $request->input('debut'), 'dateFin' => $request->input('fin')]);
    }
}
