<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cin' => 'required',
            'nom' => 'required|max:30',
            'date_naissance' => 'required|date',
            // 'etat_civil' => 'required',
            'etat_civil' => 'required|in:Célibataire,Marié,Divorcé,Veuf',
            'nb_enfant' => 'required|integer|min:0',
            'date_recrutement' => 'required|date',
            'echelle' => 'required|integer|min:5|max:25',
            'address' => 'required',
            'photo' => 'required|image',
        ];
    }
}
