<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpecialiteRequest;
use Exception ;
use App\Models\Specialite;
use Illuminate\Http\Request;

class SpecialiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $specialites = Specialite::select('id' , 'nom_specialite' , 'description' , 'duree_etude')->get() ;
            return response()->json(['specialites' => $specialites], 200) ;
        }catch(Exception $e) {
            return response()->json(["message" => "il ya quelque erreur veuillez verifier : {$e->getMessage()}" ] , 403) ;
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
           $specialite = new Specialite() ;
          $specialite->nom_specialite = $request->nom_specialite ;
          $specialite->duree_etude = $request->duree_etude ;

          if($request->has('description')) {
            $specialite->description = $request->description ;
          }
          $specialite->save() ;
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
        $specialite = Specialite::findOrFail($id) ;
        return response()->json(['specialite' => $specialite] , 200) ;
    }catch(Exception $e) {
        return response()->json(["message" => "il ya quelque erreur veuillez verifier : {$e->getMessage()}" ] , 403) ;
    }
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specialite $specialite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SpecialiteRequest $request, $id)
    {
        try {
            $specialite = Specialite::findOrFail($id) ;
            $specialite->update([
              "nom_specialite" => $request->nom_specialite ,
              "duree_etude" => $request->duree_etude
            ]) ;

          if($request->has('description')) {
            $specialite->description = $request->description ;
          }
          $specialite->save() ;
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
            Specialite::destroy($id) ;
            return response()->json(['message' => "suppresion avec success"],200) ;

        }catch(Exception $e) {
            return response()->json(["message" => "il ya quelque erreur veuillez verifier : {$e->getMessage()}" ] , 403) ;
        }
    }
}
