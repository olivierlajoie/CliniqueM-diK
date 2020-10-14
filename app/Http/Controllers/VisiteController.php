<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\visiteRequest;
use App\Http\Controllers\Models\Visite;
use App\Http\Controllers\Models\Medecin;
use App\Http\Controllers\Models\Patient;
use DB;

// Controlleur des visites. CRUD
class VisiteController extends Controller
{

    public function index()
    {
        $lesVisites = Visite::all();
        return view('visite')->with(['visites' => $lesVisites]);
    }

    public function create()
    {
        $lesMedecins = DB::table('medecins as m')->selectRaw('CONCAT("Docteur: ", m.prenom, "  ", m.nom) as concatname, m.id')->pluck('concatname', 'm.id');
        $lesPatients = DB::table('patients as p')->selectRaw('CONCAT("Patient: ", p.prenom, "  ", p.nom) as concatname, p.id')->pluck('concatname', 'p.id');
        return view('visiteCreation')->with(['medecins' => $lesMedecins, 'patients' => $lesPatients]);
    }

    public function store(visiteRequest $request)
    {
        $maVisite = new Visite;
        $maVisite->idMedecin = $request->input('idMedecin');
        $maVisite->idPatient = $request->input('idPatient');
        $maVisite->date = $request->input('date');
        $maVisite->but = $request->input('but');
        $maVisite->diagnostic = $request->input('diagnostic');
        $maVisite->traitement = $request->input('traitement');
        $maVisite->frais = $request->input('frais');
        $maVisite->save();
        
        return redirect("visite");
    }

    public function show($id)
    {
        $maVisite = Visite::find($id);
        return view('visiteAffiche')->with(['visite' => $maVisite]);
    }

    public function edit($id)
    {
        $maVisite = Visite::find($id);
        $lesMedecins = DB::table('medecins as m')->selectRaw('CONCAT("Docteur: ", m.prenom, "  ", m.nom) as concatname, m.id')->pluck('concatname', 'm.id');
        $lesPatients = DB::table('patients as p')->selectRaw('CONCAT("Patient: ", p.prenom, "  ", p.nom) as concatname, p.id')->pluck('concatname', 'p.id');
        return view('visiteModification')->with(['visite' => $maVisite, 'medecins' => $lesMedecins, 'patients' => $lesPatients]);
    }

    public function update(visiteRequest $request, $id)
    {
        $maVisite = Visite::find($id);
        $maVisite->idMedecin = $request->input('idMedecin');
        $maVisite->idPatient = $request->input('idPatient');
        $maVisite->date = $request->input('date');
        $maVisite->but = $request->input('but');
        $maVisite->diagnostic = $request->input('diagnostic');
        $maVisite->traitement = $request->input('traitement');
        $maVisite->frais = $request->input('frais');
        $maVisite->save();
        
        return redirect("visite");
    }

    public function destroy($id)
    {
        Visite::destroy($id);
        return redirect("visite");
    }
}
