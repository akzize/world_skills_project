<?php

use App\Models\Poste;
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
        Schema::create('affectations', function (Blueprint $table) {
            // $table->id('num_poste');
            $table->foreignId('matricule')->constrained('employes', 'matricule');
            $table->foreignId('num_poste')->constrained('postes', 'num_poste');
            // $table->foreignIdFor(Poste::class);
            $table->date('date_entree');
            $table->date('date_sortie');
            $table->double('salaire');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affectations');
    }
};
