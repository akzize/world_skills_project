@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row align-content-center align-items-center">
            <div class="col-md-6">
                <img src="imgs/auth.svg" alt="Image">
            </div>
            <div class="col-md-6">
                <form method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="form-group py-2">
                        <input type="text" class="form-control" id="matricule" name="matricule" placeholder="Matricule">
                    </div>
                    <div class="form-group py-2">
                        <input type="password" class="form-control" id="code" name="code" placeholder="Code">
                    </div>
                    <div class="form-group py-2">
                        <select class="form-control" id="profil" name="profil">
                            {{-- Admin, Responsable, Employé --}}
                            <option value="1">Administrateur</option>
                            <option value="2">Responsable</option>
                            <option value="3">Employé</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary my-1">Se connecter</button>
                </form>
            </div>
        </div>
    </div>
@endsection
