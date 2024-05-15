<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultat extends Model
{
    protected $fillable=["id_etudiant","id_matiere","note_controle","note_exam","date_controlle","date_exam"];
    use HasFactory;
}
