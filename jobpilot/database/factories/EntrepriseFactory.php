<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Candidat;
use App\Models\Offre;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entreprise>
 */
class EntrepriseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker->addProvider(new \Faker\Provider\fr_FR\Address($this->faker));
        $this->faker->addProvider(new \Faker\Provider\fr_FR\Company($this->faker));

        return [
            //
            'nom' => $this->faker->company(),
            'adresse' => $this->faker->address(),
        ];
    }
}
