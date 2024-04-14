<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formateur extends Model
{
    protected $fillable = ['id' , 'nom' , 'prenom' , 'email' , 'telephone' , 'id_matiere' , 'heure_de_travail'] ;
    use HasFactory;
}
