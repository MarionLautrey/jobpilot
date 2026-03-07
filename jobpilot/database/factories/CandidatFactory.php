<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidat>
 */
class CandidatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker->addProvider(new \Faker\Provider\fr_FR\Address($this->faker));
        $this->faker = \Faker\Factory::create('fr_FR');
        $this->faker->addProvider(new \Faker\Provider\fr_FR\Company($this->faker));
        return [
            'nom' => $this->faker->lastName(),
            'prenom' => $this->faker->firstName(),
            'email' => $this->faker->unique()->safeEmail(),
            'telephone' => $this->faker->phoneNumber(),
            'adresse' => $this->faker->address(),
            'date_naissance' => $this->faker->date(),
            'description'=>$this->faker->text(),
        ];
    }
}
