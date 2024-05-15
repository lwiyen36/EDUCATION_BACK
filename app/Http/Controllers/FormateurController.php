<?php

namespace App\Http\Controllers;
use Exception ;
use App\Models\Matiere;
use App\Models\Etudiant;
use App\Models\Formateur;
use Illuminate\Http\Request;

class FormateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
       $formateurs =Formateur::select('formateurs.*' , 'matieres.nom_matiere')->join('matieres', 'matieres.id', '=', 'formateurs.id_matiere')
        ->orderBy('formateurs.id', 'desc')
        ->get();
      return response()->json(['formateurs' => $formateurs], 200);
} catch (Exception $e) {
    return response()->json(["message" => "Il y a une erreur, veuillez vérifier : {$e->getMessage()}"], 403);
}
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $matieres = Matiere::all() ;
            return response()->json(['matieres' => $matieres]) ;
         }catch(Exception $e) {
             return response()->json(["message" => "il ya quelque erreur veuillez verifier : {$e->getMessage()}" ] , 403) ;
         }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Formateur::create($request->all());
        return response()->json([
          'message'=>'Le formateur a bien été ajouté.'
           ],200);
    }


    public function getEtudiants($id) {
        $etudiants = Etudiant::whereIn('id_groupe', function($query) use ($id) {
            $query->select('id_groupe')
                  ->from('emplois_temps')
                  ->where('id_formateur', $id);
        })->get();
        
        return response()->json(compact('etudiants'), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Formateur $formateur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Formateur $formateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Formateur $formateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formateur $formateur)
    {
        //
    }
}
