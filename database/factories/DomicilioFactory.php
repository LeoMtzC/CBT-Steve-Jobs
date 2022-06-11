<?php

namespace Database\Factories;
use App\Models\Estado;
use App\Models\Municipio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Domicilio>
 */
class DomicilioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $est = Estado::select('id')->inRandomOrder()->first();
        $muni = Municipio::select('id')->where('id_estado','=',$est->id)->first();
        return [
            'id_estado' => $est,
            'id_muni' => $muni,
            'calle' => $this->faker->streetAddress(),
            'colonia' => $this->faker->cityPrefix(),
            'cp' => $this->faker->postcode(),
            'no_ext' => $this->faker->buildingNumber(),
            'no_int' => $this->faker->optional(10)->bothify('###?'),
            'estado' => 1
        ];
    }
}