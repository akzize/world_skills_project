@extends('layouts.app')

@section('content')
<div class="p-3">
    {{-- <h1>Recherche</h1> --}}
    <div class="d-flex align-items-center gap-4 py-3">
            <form class="d-flex gap-3">
                <div class="">
                    <x-input hint="mot cle" value="{{old('mot-cle')}}" name="mot-cle"/>
                    @error('mot-cle')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="">
                    <select name="critere" id="" class="form-control form-select">
                        <option value="0" selected disabled>Critaire</option>
                        <option {{old('critere') === 'matricule' ? 'selected' : ''}} value="matricule">Matricule</option>
                        <option {{old('critere') === 'cin' ? 'selected' : ''}} value="cin">CIN</option>
                        <option {{old('critere') === 'nom' ? 'selected' : ''}} value="nom">Nom</option>
                    </select>
                    @error('critere')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="">
                    <x-button>submit</x-button>
                </div>
            </form>
        </div>
        

    <table class="table-bordered table text-center align-middle">
        <thead>
            <tr>
                <th>Matricule</th>
                <th>CIN</th>
                <th>Nom</th>
                <th>Date Naissance</th>
                <th>Etat civil</th>
                <th>Nombre enfants</th>
                <th>Date Recrutement</th>
                <th>Echelle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employes as $emp)
                <tr>
                    {{-- <td>
                        <div class="text-center" style="width: 80px;height: 80px;border-radius: 50%; overflow:hidden;">
                            <img src="{{ Storage::url($emp->photo) }}" class="w-100" alt="sdcsed"
                                style="object-fit:cover;">
                        </div>
                    </td> --}}
                    <td>{{ $emp->matricule }}</td>
                    <td>{{ $emp->cin }}</td>
                    <td>{{ $emp->nom }}</td>
                    <td>{{ $emp->date_naissance }}</td>
                    <td>{{ Str::take($emp->etat_civil, 1) }}</td>
                    <td>{{ $emp->nb_enfant }}</td>
                    <td>{{ $emp->date_recrutement }}</td>
                    <td>{{ $emp->echelle }}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
