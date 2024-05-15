<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Resultat;
use App\Models\Formateur;
use Illuminate\Http\Request;

class ResultatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id_matiere=Formateur::where('email',User::find($request->id_matiere)->email)->get()[0]->id_matiere;
        Resultat::create([
            "id_etudiant"=>$request->id_etudiant,
            "id_matiere"=>$request->id_matiere,
            "note_controle"=>$request->note_controle,
            "note_exam"=>$request->note_exam,
            "date_controlle"=>$request->date_controle,
            "date_exam"=>$request->date_exam
        ]);
        return response()->json([
            'message'=>'Le resultat a bien été ajouté.'
             ],200);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Resultat $resultat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resultat $resultat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resultat $resultat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resultat $resultat)
    {
        //
    }
}
