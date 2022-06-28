<?php

namespace Database\Factories;
use App\Models\Alumno;
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

        /*
        $idusr = $this->setUser();
        if ($idusr === null || $this->checkUser($idusr['id'])) {
            $idusr = $this->setUser();
        }*/
        //$idusr = User::distinct()->select('id','matricula')->inRandomOrder()->first();
        $idcar = Carrera::select('id')->inRandomOrder()->first();
        $sem = $this->faker->numberBetween(1,6);
        $idgrupo = $this->getGrupo($sem, $idcar);
        return [
            "matricula" => 'SR',
            "nombre" => $this->faker->firstName(),
            "apPat" => $this->faker->lastName(),
            "apMat" => $this->faker->lastName(),
            "id_usuario" => null,
            "id_carrera" => $idcar,
            "id_grupo" => $idgrupo,
            "semestre" => $sem,
            "generacion" => $this->faker->year(),
            "curp" => $this->faker->bothify('????######??????##'),
            "telefono" => $this->faker->numerify('##########'),
            "correo" => $this->faker->unique()->safeEmail(),
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
            $grup = 1;
        }
        return $grup;
    }
/*
    private function setUser(){
        $idtmp = User::select('id','matricula')
                ->distinct()
                ->inRandomOrder()
                ->whereNotIn('id', function($query){
                    $query->select('id_usuario')->from('alumnos')->get();
                })->first();
        return $idtmp;
    }

    private function checkUser($id){
        $c = Alumno::select('id_usuario')->where('id_usuario',$id)->count();
        print_r($c);
        return $c > 1 ? false : true;
    }
*/

}
