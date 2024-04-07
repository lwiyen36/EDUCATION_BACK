<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function Login(Request $request){

        if(!Auth::attempt(["email"=>$request->email,"password"=>$request->password])){
            return response()->json(['message'=>"Email Ou Mot de Passe Incorrect"],422);
        }
        $user=Auth::user();
        $token=$user->createToken('main')->plainTextToken  ;      
        return response()->json(compact('token','user'));
    }


    public function Register(Request $request){
        User::create([
             "name"=>$request->name,
             "email"=>$request->email,
             "password"=>Hash::make($request->password),
             "id_role"=>1,
         ]);
         $message="success";
         return response()->json(compact('message'));
     }
     public function GetRole($idrole){
        $role=Role::where('id',$idrole)->get()[0]->nom_role;
        return response()->json(compact('role'));
     }

}
