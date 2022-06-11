<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Carrera;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grupo>
 */
class GrupoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_carrera' => Carrera::inRandomOrder()->first(),
            'clave' => $this->faker->asciify('********'),
            'semestre' => $this->faker->numberBetween(1,6),
            'aula' => $this->faker->numberBetween(1,12),
            'estado' => 1,
        ];
    }
}
