<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function ListeAffections()
    {
        return view("liste_affections");
    }
}
