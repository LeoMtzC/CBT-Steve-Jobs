<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EscenariosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombreEsc'=> $this->faker->company(),
            'direccion' => $this->faker->address(),
            'nombreResp' => $this->faker->firstName(),
            'apPatResp' => $this->faker->lastName(),
            'apMatResp' => $this->faker->lastName(),
            'telefono' => $this->faker->numerify('##########'),
            'estado' => 1
        ];
    }
}
