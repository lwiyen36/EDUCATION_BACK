<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupeRequest extends FormRequest
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
            "nom_groupe" => "required" ,
            "niveau" => "required" ,
            "annee_scolaire" => "required|date_format:Y"
        ];
    }

    public function messages()
    {
        return [
           "nom_groupe.required" => "nom du groupe est obligatoire" ,
            "niveau.required" => "niveau du groupe est obligatoire" ,
            'annee_scolaire.required' => "L'année scolaire du groupe est obligatoire",
            'annee_scolaire.date_format' => "L'année scolaire doit être au format YYYY"
        ] ;
    }
}
