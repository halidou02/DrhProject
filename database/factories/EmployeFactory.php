<?php

namespace Database\Factories;

use App\Models\Employe;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmployeFactory extends Factory
{
    protected $model = Employe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'IDDepartement' => $this->faker->numberBetween(1),
            'IDPoste' => $this->faker->numberBetween(1),
            'Prenom' => $this->faker->firstName,
            'Nom' => $this->faker->lastName,
            'DateNaissance' => $this->faker->date(),
            'Genre' => $this->faker->randomElement(['M', 'F']),
            'Adresse' => $this->faker->address,
            'NumeroTelephone' => $this->faker->regexify('\+\d{1,3} \(\d{1,4}\) \d{1,4}-\d{4}'),  // Ajustez le format ici
            'Email' => $this->faker->unique()->safeEmail,
            'DateIncorporation' => $this->faker->date(),
            'SalairedeBase' => $this->faker->numberBetween(30000, 60000),
            'Statut' => 'Actif',
            'EtatCivil' => $this->faker->randomElement(['Célibataire', 'Marié']),
            'Photo' => $this->faker->imageUrl(640, 480, 'people')
        ];
    }
}
