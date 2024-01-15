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
        Schema::create('employes', function (Blueprint $table) {
            $table->id('matricule');
            $table->string('cin', 10);
            $table->string('nom', 30);
            $table->date('date_naissance');
            $table->enum('etat_civil', ['Célibataire', 'Marié', 'Divorcé', 'Veuf']);
            $table->integer('nb_enfant');
            $table->date('date_recrutement');
            $table->unsignedTinyInteger('echelle');
            $table->string('address');
            $table->string('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employes');
    }
};
