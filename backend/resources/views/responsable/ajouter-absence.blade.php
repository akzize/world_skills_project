@extends('responsable.dashboard')

@section('head')
    <link rel="stylesheet" href="{{ asset('assets/extensions/quill/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/extensions/quill/quill.bubble.css') }}">
@endsection

@section('dashboard-main')
    <section class="section">
        <div class="card py-4">
            <div class="card-header">
                <div class="card-body">
                    <h1>Gestion D'absence</h1>
                    <form action="{{route('absence.save')}}" method="post" class="d-flex gap-3 flex-column " id="absence_form" enctype="multipart/form-data">
                        @csrf
                        <div class="">
                            <label for="" class="form-label">
                                matricule:
                            </label>
                            <select name="matricule" id="" class="form-control form-select">
                                <option value="" selected disabled>choisir matricule</option>
                                    @foreach ($matricules as $matricule)
                                        <option value="{{ $matricule }}">{{ $matricule }}</option>
                                    @endforeach
                            </select>
                        </div>

                        {{-- The quill editor section  --}}
                        <div class="editor">
                            <p>Reason :</p>
                            <input type="hidden" name="raison">
                            <div id="snow">
                                <p>Reason <strong>Ici</strong> ...</p>
                            </div>
                        </div>
                        {{-- The quill editor section end  --}}
                        <div class="">
                            <label for="" class="form-label">
                                Date debut:
                            </label>
                            <x-input type="date" name="date_deb" hint="matricule" value="{{old('date_deb')}}"/>
                            @error('date_deb')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="">
                            <label for="" class="form-label">
                                Date fin:
                            </label>
                            <x-input type="date" name="date_fin" hint="matricule" value="{{old('date_fin')}}"/>
                            @error('date_fin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="">
                            <label for="" class="form-label">
                                Justification:
                            </label>
                            <x-input type="file" name="justification" hint="justification" value="{{old('justification')}}"/>
                            @error('justification')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="">
                            <x-button>Sauvegarder</x-buttun>
                            <x-button type="warning">Annuler</x-buttun>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </section>
    
@endsection

@section('scripts')
    <script src="{{ asset('assets/extensions/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/quill.js') }}"></script>
    <script src="{{ asset('assets/compiled/js/app.js') }}"></script>
@endsection
