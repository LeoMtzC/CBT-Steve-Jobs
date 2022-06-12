<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Parentesco;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Datos_tutor>
 */
class Datos_tutorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $idpar = Parentesco::select('id')->inRandomOrder()->first();
        return [
            'nombre' => $this->faker->firstName(),
            'apPat' => $this->faker->lastName(),
            'apMat' => $this->faker->lastName(),
            'correo' => $this->faker->safeEmail(),
            'curp' => $this->faker->bothify('????######??????##'),
            'telf_movil' => $this->faker->numerify('##########'),
            'telf_fijo' => $this->faker->numerify('##########'),
            'id_parentesco' => $idpar,
            'estado' => 1
        ];
    }
}
