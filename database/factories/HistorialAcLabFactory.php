<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Alumno;
use App\Models\Documento;
use App\Models\Escenarios;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HistorialAcLabFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $alu = Alumno::select('id')->inRandomOrder()->first();
        $docu = Documento::select('id','horasreq')->inRandomOrder()->first();
        $esce = Escenarios::select('id')->inRandomOrder()->first();
        return [
            'id_docu' => $docu->id,
            'id_alumno'=> $alu,
            'url' => 'https://mrpoecrafthyde.files.wordpress.com/2010/07/h-p-lovecraft-la-llamada-de-cthulhu.pdf',
            'id_escenario' => $esce,
            'horascumpl' => $docu->horasreq,
            'fecha_ini' => $this->faker->dateTimeInInterval('-2 week'),
            'fecha_term' => $this->faker->dateTimeInInterval('-2 days'),
            'fecha_exp' => $this->faker->datetimeInInterval('+1 week'),
            'estado' => 1
        ];
    }
}
