<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CompanyRepresenter>
 */
class CompanyRepresenterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Cela crée un nouvel utilisateur pour chaque représentant d'entreprise.
            'company_id' => Company::factory(), // Cela crée une nouvelle entreprise pour chaque représentant.
            'position' => $this->faker->jobTitle,
        ];
    }
}
