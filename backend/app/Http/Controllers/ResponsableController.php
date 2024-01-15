<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeRequest;
use App\Models\Employe;
use Illuminate\Http\Request;

class ResponsableController extends Controller
{
    public function HomeAction()
    {
        
    }

    public function ListeEmployer()
    {
        return view("employe.index", [
            'employes' => Employe::all()
        ]);
    }

    public function NouveauEmploye()
    {
        return view("employe.create");
    }

    public function SaveEmploye(StoreEmployeRequest $request)
    {
        // dd(request()->all());
        $data = $request->validated();

        // saving the image
        $data['photo'] = $request->file('photo')->store('public/images');

        Employe::create($data);

        return to_route('employe.index');
    }
    public function ModifierEmploye(Employe $employe)
    {
        return view('employe.edit', ['employe' => $employe]);
    }

    public function ValiderModificationEmployer(StoreEmployeRequest $request)
    {
        $data = $request->validated();

        // change the image
        $data['photo'] = $request->file('photo')->store('public/images');
        
        
    }

    public function RechercheEmploye(Request $request)
    {
        
    }
    
    public function SupprimerEmploye(Employe $employe)
    {
        if ($employe->delete()) {
            return to_route('employe.index')->with('message', 'Deleted with success');
        }
        return to_route('employe.index')->with('error', 'The employe not found');
    }
    public function SupprimerTousEmployees()
    {
        
    }
}
