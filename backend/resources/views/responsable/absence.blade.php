
@dd($absences)
@extends('responsable.dashboard')

@section('head')
    {{-- datatable styles --}}
    <link rel="stylesheet" href="{{asset('assets/extensions/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/compiled/css/table-datatable.css')}}">
@endsection


@section('dashboard-main')
    <section class="section">
        <div class="card py-4">
            <div class="card-header">
                <h1>Gestion D'absence</h1>
            </div>
            <div class="card-body">
                <h1 class="h5 fw-semibold text-capitalize py-3">liste d'absence de {''}</h1>

                <table class="table-striped-columns table align-middle" id="table1">
                    <thead>
                        <tr>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Date debut</th>
                            <th>Date fin</th>
                            <th>Authorization</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($absences as $abs)
                        @endforeach
                        <tr>
                            <td>{{ $abs->matricule }}</td>
                            <td>{{ $abs->employe->nom }}</td>
                            <td>{{ $abs->date_deb }}</td>
                            <td>{{ $abs->date_fin }}</td>
                            <td>
                                <a href="">
                                    <x-button>
                                        <i class="bi bi-download"></i>
                                    </x-button></a>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Date debut</th>
                            <th>Date fin</th>
                            <th>Authorization</th>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </section>
@endsection

{{-- scripts --}}

@section('script')
    <script src="{{asset('assets/extensions/simple-datatables/umd/simple-datatables.js')}}"></script>
    <script src="{{asset('assets/static/js/pages/simple-datatables.js')}}"></script>
@endsection
