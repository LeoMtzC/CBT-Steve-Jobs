<?php

namespace Database\Seeders;

use App\Models\Carrera;
use Illuminate\Database\Seeder;

class CarrerasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carrera = new Carrera();
        $carrera->nombre = "Técnico en Informática";
        $carrera->clave = "TI";
        $carrera->estado = 1;
        $carrera->save();

        $carrera2 = new Carrera();
        $carrera2->nombre = "Técnico en Expresión Gráfica Digital";
        $carrera2->clave = "TEGD";
        $carrera->estado = 1;
        $carrera2->save();
    }
}
