<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpecialiteRequest extends FormRequest
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
            "nom_speciliate" => "required|string" ,
            "description" => "string" ,
            "duree_etude" => "required|numeric|min:1"
        ];
    }

    public function messages(): array
{
    return [
        "nom_specialite.required" => "Le champ nom de la spécialité est requis.",
        "nom_specialite.string" => "Le champ nom de la spécialité doit être une chaîne de caractères.",

        "description.string" => "Le champ description doit être une chaîne de caractères.",

        "duree_etude.required" => "Le champ durée d'étude est requis.",
        "duree_etude.numeric" => "Le champ durée d'étude doit être un nombre.",
        "duree_etude.min" => "Le champ durée d'étude doit être supérieur à 0."
    ];
}
}
