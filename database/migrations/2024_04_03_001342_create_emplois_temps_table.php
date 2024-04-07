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
        Schema::create('emplois_temps', function (Blueprint $table) {
            $table->id();
            $table->string('jour') ;
            $table->time('heure_debut');
            $table->time('heure_fin');
            $table->unsignedBigInteger('id_groupe') ;
            $table->foreign('id_groupe' )->references('id')->on('groupes')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_formateur') ;
            $table->foreign('id_formateur')->references('id')->on('formateurs')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emplois_temps');
    }
};
