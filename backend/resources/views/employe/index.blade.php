@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center py-3">
        <h1>Gestion des Employees</h1>
        <div class="btns d-flex gap-1">
            <button class="btn btn-danger">delete all</button>
            <button class="btn btn-primary"><a class="text-decoration-none text-white" href="{{ route('employe.ajouter') }}">add</a></button>
        </div>
    </div>

    <table class="table-bordered table text-center align-middle">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Matricule</th>
                <th>CIN</th>
                <th>Nom</th>
                <th>Date Naissance</th>
                <th>Etat civil</th>
                <th>Nombre enfants</th>
                <th>Date Recrutement</th>
                <th>Echelle</th>
                <th>Adresse</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employes as $emp)
                <tr>
                    <td>
                        <div class="text-center" style="width: 80px;height: 80px;border-radius: 50%; overflow:hidden;">
                            <img src="{{ Storage::url($emp->photo) }}" class="w-100" alt="sdcsed"
                                style="object-fit:cover;">
                        </div>
                    </td>
                    <td>{{ $emp->matricule }}</td>
                    <td>{{ $emp->cin }}</td>
                    <td>{{ $emp->nom }}</td>
                    <td>{{ $emp->date_naissance }}</td>
                    <td>{{ $emp->etat_civil }}</td>
                    <td>{{ $emp->nb_enfant }}</td>
                    <td>{{ $emp->date_recrutement }}</td>
                    <td>{{ $emp->echelle }}</td>
                    <td>{{ $emp->address }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <button class="btn btn-success"><a
                                    href="{{ route('employe.modifier', $emp) }}">edit</a></button>
                            <form action="{{ route('employe.supprimer', $emp) }}">
                                <button class="btn btn-danger">delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
