<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeRequest;
use App\Models\Employe;
use Illuminate\Http\Request;

class ResponsableController extends Controller
{
    public function HomeAction()
    {
        return view("responsable.home");
    }

    public function ListeEmployer()
    {
        return view("responsable.employe", [
            'employes' => Employe::all()
        ]);
    }

    public function NouveauEmploye()
    {
        return view("responsable.ajouter-employe");
    }

    public function SaveEmploye(StoreEmployeRequest $request)
    {
        // dd(request()->all());
        $data = $request->validated();

        // saving the image
        $data['photo'] = $request->file('photo')->store('public/images');

        Employe::create($data);

        return to_route('responsable.employe');
    }
    public function ModifierEmploye(Employe $employe)
    {
        return view('responsable.edit-employe', ['employe' => $employe]);
    }

    public function ValiderModificationEmployer(StoreEmployeRequest $request, Employe $employe)
    {
        $data = $request->validated();

        // change the image
        $data['photo'] = $request->file('photo')->store('public/images');

        $employe->update($data);

        return to_route('responsable.index')->with('message', 'Updated with success');
    }

    public function RechercheEmploye(Request $request)
    {

        // handling the recherche

        $employes = [];

        // in case the criteria is not empty return the view with the searched result
        if (request()->all()) {

            // validations
            $data = $request->validate([
                'mot-cle' => 'required|string',
                'critere' => 'required|string|in:matricule,cin,nom',
            ]);

            # fetching the data
            $employes = Employe::where($data['critere'], 'like', "%{$data['mot-cle']}%")->get();
        } else {

            // but in case it's view request return the recherche view with all data
            $employes = Employe::all();
        }

        // dd($employe);
        return view('responsable.recherche-employe', [
            'employes' => $employes
        ]);
    }

    public function SupprimerEmploye(Employe $employe)
    {
        $employe->delete();
        return to_route('responsable.employe')->with('message', 'Deleted with success');
    }
    public function SupprimerTousEmployees()
    {
    }
}
