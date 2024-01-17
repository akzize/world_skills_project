@extends('layouts.app')

@section('content')
    <main class="container py-5">
        <div class="header d-flex align-items-center justify-content-between">
            <h1>Gestion des Utilisateurs</h1>
            <x-button type="success">
                <a href="{{ route('admin.ajouter') }}" class="text-decoration-none fw-bold text-white">Ajoute Un
                    Utilisateur</a>
            </x-button>
        </div>
        <div class="my-5">
            <table class="table-bordered table-striped table text-center align-middle">
                <thead>
                    <tr>
                        <th>Matricule</th>
                        <th>Code</th>
                        <th>Profile</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($utilisateurs as $utilisateur)
                        <tr>
                            <td>{{ $utilisateur->matricule }}</td>
                            <td>{{ $utilisateur->code }}</td>
                            <td>{{ $utilisateur->prodil }}</td>
                            <td>
                                <a href="{{ route('admin.modifier', $utilisateur) }}">
                                    <x-button type="success">
                                        <i class="bi bi-pencil-square"></i>
                                    </x-button>
                                </a>
                                <a href="{{ route('admin.supprimer', $utilisateur) }}">
                                    <x-button type="danger">
                                        <i class="bi bi-trash3-fill"></i>
                                    </x-button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$utilisateurs->links()}}
    </main>
@endsection

@section('scripts')
    <script>
        toastr.options = {
            "positionClass": "toast-bottom-right",
            "timeOut": "3000",
        }
        @session('success')
        toastr.success('{{ $value }}')
        @endsession
        @session('error')
        toastr.success('{{ $value }}')
        @endsession
    </script>
@endsection
