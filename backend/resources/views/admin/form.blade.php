@extends('layouts.app')

{{-- this view can be used for wither creating and editing user --}}
@php
    $for_creating = !isset($utilisateur);
@endphp

@section('content')

    <div class="py-4">
        <h1 class="text-center">{{ $for_creating ? 'Nouveau' : 'Modifier' }} Utlisateur</h1>
        {{-- @dd($matricules) --}}
        <div class="w-50 mx-auto">
            <form action="{{ $for_creating ? route('admin.save') : route('admin.save-edited-user') }}" method="post" class="d-flex flex-column gap-3">
                @csrf
                <div class="">
                    <label for="">Matricule</label>
                    <select name="matricule" id="" class="form-control form-select">
                        @if ($for_creating)
                            <option value="" selected disabled>choisir le matricule</option>
                            @foreach ($matricules as $matricule)
                                <option value="{{ $matricule }}">{{ $matricule }}</option>
                            @endforeach
                        @else
                            <option value="{{ $utilisateur->matricule }}">{{ $utilisateur->matricule }}</option>
                        @endif
                    </select>
                </div>
                <div class="">
                    <label for="">Code: </label>
                    <x-input hint="code" value="{{ $for_creating ? old('code') : $utilisateur->code }}" id="code"
                        name="code" />
                    {{-- cls is for class in the component, check it in component/button --}}
                    <x-button type="danger" cls="my-2" id="code_generate">Generer</x-button>
                </div>

                <label for="">Matricule</label>
                <select name="prodil" id="" class="form-control form-select">
                    <option {{ !$for_creating ? ($utilisateur->prodil === '' ? 'selected' : '') : '' }} value="" selected
                        disabled class="">Choisir Profil</option>
                    <option {{ !$for_creating ? ($utilisateur->prodil === 'administrateur' ? 'selected' : '') : '' }}
                        value="administrateur">Administrateur</option>
                    <option {{ !$for_creating ? ($utilisateur->prodil === 'responsable' ? 'selected' : '') : '' }}
                        value="responsable">Responsable</option>
                    <option {{ !$for_creating ? ($utilisateur->prodil === 'employe' ? 'selected' : '') : '' }} value="employe">
                        Employé</option>
                </select>

                <x-button class="my-2">sauvegarder</x-button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // for the code generation
        const btn = document.querySelector('#code_generate')

        const code_generate = () => {
            const keys = 'qwertyuiopasdfghjklzxcvbnm123456789!@#$%+';
            let password = ''
            const length = Math.floor(Math.random() * 2) + 3;
            for (let i = 0; i <= length; i++) {
                const index = Math.floor(Math.random() * keys.length - 1) + 1;
                password += keys[index]
            }
            return password;
        }

        // handling the event
        btn.onclick = (e) => {
            e.preventDefault()
            const pass = code_generate();

            // now setting the code in the input
            document.querySelector('#code').value = pass
        }
    </script>
@endsection
