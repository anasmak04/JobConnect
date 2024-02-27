<?php

namespace Database\Seeders;

use App\Models\Secteur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SecteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $secteurs = [
            "Biologie / Chimie",
            "Informatique / IT",
            "Construction / BTP",
            "Éducation / Formation",
            "Santé / Soins",
            "Finance / Banque",
            "Hôtellerie / Restauration",
            "Transport / Logistique",
            "Commerce / Vente",
            "Industrie / Production",
            "Agriculture",
            "Art / Culture",
            "Communication / Marketing",
            "Droit / Juridique",
            "Énergie / Environnement",
            "Science / Recherche",
            "Sécurité / Défense",
            "Tourisme / Loisirs"
        ];

        foreach ($secteurs as $secteur) {
            Secteur::create(["name" => $secteur]);
        }
    }
}
