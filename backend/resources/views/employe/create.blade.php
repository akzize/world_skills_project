@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Create Employee</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('employe.save') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="cin">CIN</label>
                                <input id="cin" type="text" class="form-control" value="{{ old('cin') }}"
                                    name="cin" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input id="nom" type="text" class="form-control" value="{{ old('nom') }}"
                                    name="nom" required>
                            </div>

                            <div class="form-group">
                                <label for="date_naissance">Date de Naissance</label>
                                <input id="date_naissance" type="date" class="form-control"
                                    value="{{ old('date_naissance') }}" name="date_naissance" required>
                            </div>

                            <div class="form-group">
                                <label for="etat_civil">État Civil</label>
                                <select id="etat_civil" class="form-control" name="etat_civil" required>
                                    <option value="0" selected disabled>Etat Civil</option>
                                    <option value="Célibataire">Célibataire</option>
                                    <option value="Marié">Marié</option>
                                    <option value="Divorcé">Divorcé</option>
                                    <option value="Veuf">Veuf</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="nb_enfant">Number of Children</label>
                                <input id="nb_enfant" type="number" class="form-control" value="{{ old('nb_enfant') }}"
                                    name="nb_enfant" required>
                            </div>

                            <div class="form-group">
                                <label for="date_recrutement">Date de Recrutement</label>
                                <input id="date_recrutement" type="date" class="form-control"
                                    value="{{ old('date_recrutement') }}" name="date_recrutement" required>
                            </div>

                            <div class="form-group">
                                <label for="echelle">Échelle</label>
                                <input id="echelle" type="text" class="form-control" value="{{ old('echelle') }}"
                                    name="echelle" required>
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea id="address" class="form-control" name="address" required>{{ old('address') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <input id="photo" type="file" class="form-control" name="photo" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection
