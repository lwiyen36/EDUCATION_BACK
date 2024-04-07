<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    protected $fillable = ['id' , 'nom_groupe' , 'niveau' , 'annee_scolaire' , 'id_specialite'] ;
    use HasFactory;
}
