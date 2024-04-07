<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupeRequest;
use App\Models\Etudiant;
use App\Models\Groupe;
use Exception;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class GroupeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $Groupes = Groupe::select('groupes.id', 'groupes.nom_groupe', 'groupes.niveau', 'specialites.nom_specialite', 'groupes.annee_scolaire')
            ->join('specialites', 'groupes.id_specialite', '=', 'specialites.id')
            ->orderBy('groupes.id', 'desc')
            ->get();
            return response()->json(['groupes' => $Groupes],200) ;
        }catch(Exception $e){
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
    public function store(GroupeRequest $request)
    {
        try {
            Groupe::create([
                "nom_groupe" => $request->nom_groupe ,
                "niveau" => $request->niveau ,
                "id_specialite" => $request->id_specialite ,
                "annee_scolaire" => $request->annee_scolaire ,
            ]) ;

            return response()->json(["message" => "création avec succes"] , 200) ;

        }catch(Exception $e) {
            return response()->json(["message" => "il ya quelque erreur veuillez verifier : {$e->getMessage()}" ] , 403) ;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $groupe = Groupe::select('groupes.id', 'groupes.nom_groupe', 'groupes.niveau', 'specialites.nom_specialite', 'groupes.annee_scolaire')
            ->join('specialites', 'groupes.id_specialite', '=', 'specialites.id')
            ->where('specialites.id', $id)
            ->get();
            return response()->json(['groupe' => $groupe] , 200) ;
        }catch(Exception $e) {
            return response()->json(["message" => "il ya quelque erreur veuillez verifier : {$e->getMessage()}" ] , 403) ;
        }


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GroupeRequest $request, $id)
    {
        try {
            Groupe::findOrFail($id)->update([
                "nom_groupe" => $request->nom_groupe ,
                "niveau" => $request->niveau ,
                "id_specialite" => $request->id_specialite ,
                "annee_scolaire" => $request->annee_scolaire ,
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
            Groupe::destroy($id) ;
            return response()->json(['message' => "suppresion avec success"],200) ;

        }catch(Exception $e) {
            return response()->json(["message" => "il ya quelque erreur veuillez verifier : {$e->getMessage()}" ] , 403) ;
        }
    }
}
