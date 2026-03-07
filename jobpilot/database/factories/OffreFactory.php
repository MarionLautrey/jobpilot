<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Projet>
 */
class OffreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('fr_FR');
        $this->faker->addProvider(new \Faker\Provider\fr_FR\Internet($this->faker));
        $this->faker->addProvider(new \Faker\Provider\fr_FR\PhoneNumber($this->faker));
        $this->faker->addProvider(new \Faker\Provider\fr_FR\Address($this->faker));
        $this->faker->addProvider(new \Faker\Provider\fr_FR\Company($this->faker));

        return [
            'adresse'=>$this->faker->address(),
            'job' => $this->faker->jobTitle(),     
            'date' => $this->faker->date(),
            'type'=> $this->faker->randomElement(['CDD', 'CDI', 'Stage', 'Alternance']),       
            'entreprise_id' => \App\Models\Entreprise::factory(),
            'candidat_id' => \App\Models\Candidat::factory(),

        ];
    }
}
