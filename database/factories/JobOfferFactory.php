<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Secteur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobOffer>
 */
class JobOfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
//            'title' => $this->faker->jobTitle,
//            'description' => $this->faker->text($maxNbChars = 200),
//            'company_id' => 2,  // Crée une nouvelle entreprise pour chaque offre d'emploi si nécessaire
//            'secteur_id' => Secteur::factory(),  // Crée un nouveau secteur pour chaque offre d'emploi si nécessaire
//            'location' => $this->faker->city,
//            'type' => $this->faker->randomElement(['Full-time', 'Part-time', 'Contract', 'Temporary']),
//            'salary' => $this->faker->numberBetween($min = 30000, $max = 100000),
//            'start_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
//            'end_date' => $this->faker->optional()->date($format = 'Y-m-d', $max = 'now'),
        ];
    }
}
