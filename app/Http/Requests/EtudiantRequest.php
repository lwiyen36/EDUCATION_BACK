<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EtudiantRequest extends FormRequest
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
        "nom" => "required|string",
        "prenom" => "required|string",
        "date_naissance" => "required|date",
        "Adresse" => "required|string",
        "id_groupe" => "required|exists:groupes,id",
        "Telephone" => "required|string",
        "email" => "required|email|unique:etudiants,email",
        "email_responsable" => "nullable|email",
        "Telephone_responsable" => "nullable|string",
    ];
}

public function messages(): array
{
    return [
        "nom.required" => "Le champ nom est requis.",
        "prenom.required" => "Le champ prénom est requis.",
        "date_naissance.required" => "Le champ date de naissance est requis.",
        "date_naissance.date" => "Le champ date de naissance doit être une date valide.",
        "Adresse.required" => "Le champ adresse est requis.",
        "id_groupe.required" => "Le champ groupe est requis.",
        "id_groupe.exists" => "Le groupe sélectionné est invalide.",
        "Telephone.required" => "Le champ téléphone est requis.",
        "email.required" => "Le champ email est requis.",
        "email.email" => "Le champ email doit être une adresse email valide.",
        "email.unique" => "L'adresse email est déjà utilisée.",
        "email_responsable.email" => "Le champ email responsable doit être une adresse email valide.",
        "Telephone_responsable.string" => "Le champ téléphone responsable doit être une chaîne de caractères.",
    ];
}
}
