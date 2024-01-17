<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function ListeUtilisateurs()
    {
        // for the pagination
        $utilisateurs = Utilisateur::paginate(5);
        return view('admin.index', ['utilisateurs' => $utilisateurs]);
    }
    public function AjouterUtilisateur()
    {
        $matricules = Employe::all()->pluck('matricule');
        // those two lines are not the same
        // $matricules = Employe::all('matricule');
        return view('admin.form', ['matricules' => $matricules]);
    }

    public function SaveUtilisateur(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'matricule' => 'required',
            'code' => 'required',
            'prodil' => 'required',
        ]);

        // $utilisateur = Utilisateur::create($data);
        // an other way to create a new utilisateur
        $utilisateur = new Utilisateur();
        $utilisateur->matricule = $data['matricule'];
        $utilisateur->code = $data['code'];
        $utilisateur->prodil = $data['prodil'];
        if ($utilisateur->save())
            return to_route('admin.index')->with('success', 'Utilisateur ajouté avec succès');
        else
            return to_route('admin.index')->with('error', 'Erreur lors de l\'ajout de l\'utilisateur');
    }

    // for edited utilisateur
    public function SaveEditedUtilisateur(Request $request, Utilisateur $utilisateur)
    {
        // dd($request->all());
        $data = $request->validate([
            'matricule' => 'required',
            'code' => 'required',
            'prodil' => 'required',
        ]);

        $utilisateur->matricule = $data['matricule'];
        $utilisateur->code = $data['code'];
        $utilisateur->prodil = $data['prodil'];
        if ($utilisateur->save())
            return to_route('admin.index')->with('success', 'Utilisateur modifié avec succès');
        else
            return to_route('admin.index')->with('error', 'Erreur lors de la modification de l\'utilisateur');
    }

    // for editing the utilisateur
    public function ModifierUtilisateur(Utilisateur $utilisateur)
    {
        return view('admin.form', ['utilisateur' => $utilisateur]);
    }

    // for deleting the utilisateur
    public function SupprimerUtilisateur(Utilisateur $utilisateur)
    {
        if ($utilisateur->delete())
            return to_route('admin.index')->with('success', 'Utilisateur supprimé avec succès');
        else
            return to_route('admin.index')->with('error', 'Erreur lors de la suppression de l\'utilisateur');
    }
}
