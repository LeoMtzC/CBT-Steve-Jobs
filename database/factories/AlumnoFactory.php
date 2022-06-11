<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Carrera;
use App\Models\Grupo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $idusr = User::distinct()->select('id')->inRandomOrder()->first();
        $idcar = Carrera::select('id')->inRandomOrder()->first();
        $sem = $this->faker->numberBetween(1,6);
        $idgrupo = $this->getGrupo($sem, $idcar);
        return [
            "matricula" => $this->faker->numerify('########'),
            "nombre" => $this->faker->firstName(),
            "apPat" => $this->faker->lastName(),
            "apMat" => $this->faker->lastName(),
            "id_usuario" => $idusr,
            "id_carrera" => $idcar,
            "id_grupo" => $idgrupo,
            "semestre" => $sem,
            "curp" => $this->faker->bothify('????######??????##'),
            "telefono" => $this->faker->numerify('##########'),
            "correo" => $this->faker->safeEmail(),
            "id_domicilio" => null,
            "fecha_nac" => $this->faker->date(),
            "nss" => $this->faker->optional(30)->numerify('###########'),
            "seguro_med" => $this->faker->randomElement(['s','n']),
            "id_tutor" => null,
            "id_docs" => null,
            "estado" => Arr::random([1,2]),
        ];
    }

    protected function getGrupo($sem, $idcar){
        $grup = Grupo::select('id')
            ->where([['semestre','=',$sem],['id_carrera','=',$idcar->id]])
            ->inRandomOrder()->first();
        if (is_null($grup)){
            $grup = 1;//$this->getGrupo($sem, $idcar);
        }
        return $grup;
    }

}
