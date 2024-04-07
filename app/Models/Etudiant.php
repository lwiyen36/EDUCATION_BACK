<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    protected $fillable = ['id' , 'nom' , 'prenom' , 'date_naissance' , 'Adresse' , 'id_groupe' , 'Telephone' , 'email' , 'email_responsable'  , 'Telephone_responsable'] ;
    use HasFactory;
}
