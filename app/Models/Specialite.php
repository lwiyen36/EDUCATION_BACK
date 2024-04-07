<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    protected $fillable = ['id' , 'nom_specialite' , 'description' , 'duree_etude'] ;
    use HasFactory;
}
