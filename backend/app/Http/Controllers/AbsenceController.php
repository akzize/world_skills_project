<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use Illuminate\Http\Request;
use App\Models\Employe;

class AbsenceController extends Controller
{
    public function index()
    {
        $absences = Absence::all();
        return view('responsable.absence', ['absences' => $absences]);
    }

    // for the absence list view
    public function AjouterAbsence()
    {
        $matricules = Employe::pluck('matricule');
        return view('responsable.ajouter-absence', ['matricules' => $matricules]);
    }
    public function ValiderAbsence(Request $request)
    {
        // dd($request->all());
        // for validation
        $data = $request->validate([
            'matricule' => 'required',
            'raison' => 'required',
            'date_deb' => 'required',
            'date_fin' => 'required',
            'justification' => 'required | mimes:jpg,jpeg,png',
        ]);       

        // handling the image upload
        // checking for the existance of the file
        if($request->hasFile('justification')){
            // rename the image
            $data['justification'] = $data['matricule'] . '-' . date('ymds') . '.' . $request->file('justification')->getClientOriginalExtension();
            
            // now the file will be stored in justifications folder in storage
            // for here the justifications wouldn't be public, 
            $request->file('justification')->storeAs('justifications', $data['justification']);
        }

        // for insertion
        Absence::query()->create([
            'matricule' => $data['matricule'],
            'raison' => $data['raison'],
            'date_deb' => $data['date_deb'],
            'date_fin' => $data['date_fin'],
            'justification' => $data['justification'],
        ]);

        return redirect()->route('absence.index');
    }
}
