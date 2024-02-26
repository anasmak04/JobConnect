<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'description' => $this->faker->catchPhrase,
            'website' => $this->faker->domainName,
            // 'logo' => $this->faker->imageUrl(640, 480, 'business', true),
            // Assurez-vous que la colonne 'city_id' est correctement gérée si votre modèle Company y fait référence.
        ];
    }
}
