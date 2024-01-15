<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuhentificationController extends Controller
{
    public function LoginAction()
    {
        return view("login");
    }

    public function LoginPost(Request $request)
    {
        dd(request()->all());
    }
}
