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
        Schema::create('company_representers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Assurez-vous que la table `users` existe
            $table->foreignId('company_id')->constrained()->onDelete('cascade'); // Assurez-vous que la table `companies` existe
            $table->string('position')->nullable(); // Le poste du représentant au sein de l'entreprise
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_representers');
    }
};
