<?php

namespace Database\Factories;

use App\Models\Jugadora;
use Illuminate\Database\Eloquent\Factories\Factory;

class JugadoraFactory extends Factory
{
    protected $model = Jugadora::class;

    // database/factories/JugadoraFactory.php
    public function definition(): array
    {
        return [
            'nom' => $this->faker->firstName(),
            'cognom' => $this->faker->lastName(),
            'numero' => $this->faker->numberBetween(1, 99),
            'posicio' => $this->faker->randomElement(['Portera', 'Defensa', 'Migcampista', 'Davantera']),
            'equip_id' => \App\Models\Equip::factory(), // o un ID existente
        ];
    }
}