<?php

namespace App\Http\Controllers;
use Exception ;
use App\Models\Matiere;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $matieres = Matiere::orderBy('id', 'desc')->get() ;
            return response()->json(['matieres' => $matieres], 200) ;
        }catch(Exception $e){
            return response()->json(["message" => "Il y a une erreur, veuillez vérifier : {$e->getMessage()}"], 403);
        }

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
        try {
          Matiere::create([
              "nom_matiere" => $request->nom_matiere ,
              "Coefficient" => $request->Coefficient
          ]) ;
                 return response()->json(["message" => "création avec succes"] , 200) ;
         }catch(Exception $e) {
                return response()->json([ "message" => "il ya quelque erreur veuillez verifier : {$e->getMessage()}" ] , 403) ;
         }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try  {
            $matiere = Matiere::findOrFail($id) ;
            return response()->json(['matiere' => $matiere] , 200) ;
        }catch(Exception $e) {
            return response()->json(["message" => "il ya quelque erreur veuillez verifier : {$e->getMessage()}" ] , 403) ;
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try  {
            $matiere = Matiere::findOrFail($id) ;
            return response()->json(['matiere' => $matiere] , 200) ;
        }catch(Exception $e) {
            return response()->json(["message" => "il ya quelque erreur veuillez verifier : {$e->getMessage()}" ] , 403) ;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            Matiere::findOrFail($id)->update([
                "nom_matiere" => $request->nom_matiere ,
                "Coefficient" => $request->Coefficient
            ]) ;
            return response()->json(['message' => "modification réussie"] ,200) ;
        }catch(Exception $e) {
            return response()->json(["message" => "il ya quelque erreur veuillez verifier : {$e->getMessage()}" ] , 403) ;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            Matiere::destroy($id) ;
            return response()->json(['message' => "suppresion avec success"],200) ;

        }catch(Exception $e) {
            return response()->json(["message" => "il ya quelque erreur veuillez verifier : {$e->getMessage()}" ] , 403) ;
        }
    }
}
