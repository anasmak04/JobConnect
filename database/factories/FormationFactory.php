<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Formation>
 */
class FormationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true), // Un titre de formation
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true), // Une description
            'start_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'), // Une date de début
            'end_date' => $this->faker->optional()->date($format = 'Y-m-d', $max = 'now'), // Une date de fin optionnelle
        ];
    }
}
