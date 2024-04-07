<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('resultats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_etudiant') ;
            $table->foreign('id_etudiant')->references('id')->on('etudiants')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_matiere') ;
            $table->foreign('id_matiere' )->references('id')->on ('matieres')->onDelete('cascade')->onUpdate('cascade');
            $table->double('note_controle')->nullable() ;
            $table->double('note_exam')->nullable() ;
            $table->date('date_controlle')->nullable() ;
            $table->date('date_exam')->nullable() ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultats');
    }
};
