<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\medecinRequest;
use App\Http\Requests\dateRequest;
use App\Http\Controllers\Models\Medecin;
use App\Http\Controllers\Models\Patient;
use App\Http\Controllers\Models\Visite;
use DB;

// Controlleur des médecins. CRUD
class MedecinController extends Controller
{
    public function index()
    {
        $lesMedecins = Medecin::all();
        return view('medecin')->with(['medecins' => $lesMedecins]);
    }

    public function create()
    {
        return view('medecinCreation');
    }

    public function store(medecinRequest $request)
    {
        $monMedecin = new Medecin;
        $monMedecin->prenom = $request->input('prenom');
        $monMedecin->nom = $request->input('nom');
        $monMedecin->specialisation = $request->input('specialisation');
        $monMedecin->save();
        
        return redirect("medecin");
    }

    public function show($id)
    {
        $monMedecin = Medecin::find($id);
        return view('medecinAffiche')->with(['medecin' => $monMedecin]);
    }

    public function edit($id)
    {
        $monMedecin = Medecin::find($id);
        return view('medecinModification')->with(['medecin' => $monMedecin]);
    }

    public function update(medecinRequest $request, $id)
    {
        $monMedecin = Medecin::find($id);
        $monMedecin->prenom = $request->input('prenom');
        $monMedecin->nom = $request->input('nom');
        $monMedecin->specialisation = $request->input('specialisation');
        $monMedecin->save();
        
        return redirect("medecin");
    }

    public function destroy($id)
    {
        Medecin::destroy($id);
        return redirect("medecin");
    }
    
    public function dateVisite(dateRequest $request, $id) 
    {
        $monMedecin = Medecin::find($id);
        $lesVisites = DB::table('visites')->where('idMedecin', $monMedecin->id)->whereBetween('date', array($request->input('debut'), $request->input('fin')))->get();
        return view('medecinAffiche')->with(['medecin' => $monMedecin, 'visitesByDate' => $lesVisites, 'dateDebut' => $request->input('debut'), 'dateFin' => $request->input('fin')]);
    }
}
