<?php

namespace Database\Factories;

use App\Models\Employe;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmployeFactory extends Factory
{
    protected $model = Employe::class;

    public function definition()
    {
        return [
            'IDDepartement' => $this->faker->numberBetween(3, 4),
            'IDPoste' => $this->faker->numberBetween(1,2),
            'Prenom' => $this->faker->firstName,
            'Nom' => $this->faker->lastName,
            'DateNaissance' => $this->faker->date(),
            'Genre' => $this->faker->randomElement(['Homme', 'Femme']),
            'Adresse' => $this->faker->address,
            'NumeroTelephone' => $this->faker->phoneNumber,
            'Email' => $this->faker->unique()->safeEmail,
            'DateIncorporation' => $this->faker->date(),
            'SalairedeBase' => $this->faker->numberBetween(20000, 500000),
            'Statut' => $this->faker->randomElement(['Actif', 'En congé']),
            'EtatCivil' => $this->faker->randomElement(['Célibataire', 'Marié']),

        ];
    }
}
