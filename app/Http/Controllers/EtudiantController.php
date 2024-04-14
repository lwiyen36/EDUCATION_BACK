<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Groupe;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use App\Http\Requests\EtudiantRequest;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
   {
    try {
        $etudiants = Etudiant::select('etudiants.*', 'groupes.nom_groupe')
            ->join('groupes', 'etudiants.id_groupe', '=', 'groupes.id')
            ->orderBy('etudiants.id', 'desc')
            ->get();
        return response()->json(['etudiants' => $etudiants], 200);
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
            $groupes = Groupe::all() ;
            return response()->json(['groupes' => $groupes]) ;
         }catch(Exception $e) {
             return response()->json(["message" => "il ya quelque erreur veuillez verifier : {$e->getMessage()}" ] , 403) ;
         }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EtudiantRequest $request)
    {
        try {
            $etudiant = new Etudiant();
            $etudiant->nom = $request->nom;
            $etudiant->prenom = $request->prenom;
            $etudiant->date_naissance = $request->date_naissance;
            $etudiant->Adresse = $request->Adresse;
            $etudiant->id_groupe = $request->id_groupe;
            $etudiant->Telephone = $request->Telephone;
            $etudiant->email = $request->email;
            if ($request->has('email_responsable')) {
                $etudiant->email_responsable = $request->email_responsable;
            }
            if ($request->has('Telephone_responsable')) {
                $etudiant->Telephone_responsable = $request->Telephone_responsable;
            }
            $etudiant->save();
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
        try  {
            $etudiant = Etudiant::findOrFail($id) ;
            return response()->json(['etudiant' => $etudiant] , 200) ;
        }catch(Exception $e) {
            return response()->json(["staus" => 403 , "message" => "il ya quelque erreur veuillez verifier : {$e->getMessage()}" ] , 403) ;
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try  {
            $etudiant = Etudiant::findOrFail($id) ;
            return response()->json(['etudiant' => $etudiant] , 200) ;
        }catch(Exception $e) {
            return response()->json(["staus" => 403 , "message" => "il ya quelque erreur veuillez verifier : {$e->getMessage()}" ] , 403) ;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $etudiant = Etudiant::findOrFail($id);
        if(!$etudiant){
            return response()->json(["message" => "L'étudiant avec l'id $id n'existe pas."], 404);
        }
        try {



        $etudiant->update([
            "nom" => $request->nom,
            "prenom" => $request->prenom,
            "date_naissance" => $request->date_naissance,
            "Adresse" => $request->Adresse,
            "id_groupe" => $request->id_groupe,
            "Telephone" => $request->Telephone,
            "email" => $request->email,
        ]);

        if ($request->has('email_responsable')) {
            $etudiant->email_responsable = $request->email_responsable;
        }

        if ($request->has('Telephone_responsable')) {
            $etudiant->Telephone_responsable = $request->Telephone_responsable;
        }
        $etudiant->save();
        return response()->json(["message" => "modification réussite"] , 200) ;
    }catch (Exception $e) {
        return response()->json(["staus" => 403 , "message" => "il ya quelque erreur veuillez verifier : {$e->getMessage()}" ] , 403) ;
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            Etudiant::destroy($id) ;
            return response()->json(['message' => "suppresion avec success"],200) ;

        }catch(Exception $e) {
            return response()->json(["message" => "il ya quelque erreur veuillez verifier : {$e->getMessage()}" ] , 403) ;
        }
    }
}
