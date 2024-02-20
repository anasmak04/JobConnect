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
        Schema::create('job_offers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->foreignId('company_id')->constrained()->onDelete('cascade'); // Assurez-vous que la table `companies` existe
            $table->foreignId('secteur_id')->constrained()->onDelete('cascade'); // Assurez-vous que la table `secteurs` existe
            $table->string('location')->nullable(); // Vous pourriez vouloir utiliser un lien vers une table `cities`
            $table->string('type'); // Par exemple, plein temps, partiel, contractuel, etc.
            $table->decimal('salary', 8, 2)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_offers');
    }
};
