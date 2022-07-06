<?php

namespace Database\Seeders;

use App\Models\Avisos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AvisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aviso = new Avisos();
        $aviso-> titulo = "IMPORTANTE";
        $aviso-> cuerpo = "No olvidar portar cubrebocas durante su estadía en la institución. Por su comprensión, gracias.";
        $aviso-> save();

        $aviso2 = new Avisos();
        $aviso2 -> leyenda = '“2022. Año del Quincentenario de Toluca, Capital del Estado de México".';
        $aviso2 ->save();
    }
}
