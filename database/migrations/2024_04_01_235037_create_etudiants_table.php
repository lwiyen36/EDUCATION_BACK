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
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string("nom") ;
            $table->string("prenom") ;
            $table->date("date_naissance") ;
            $table->string("Adresse") ;
            $table->unsignedBigInteger('id_groupe') ;
            $table->foreign('id_groupe')->references('id')->on('groupes')->onDelete('cascade')->onUpdate('cascade');
            $table->string("Telephone") ;
            $table->string('email')->unique();
            $table->string('email_responsbale')->unique()->nullable();
            $table->string('Telephone_responsable')->nullable() ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiants');
    }
};
