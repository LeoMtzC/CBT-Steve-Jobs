<?php

namespace Database\Seeders;

use App\Models\Alumno;
use App\Models\Datos_tutor;
use App\Models\Domicilio;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Grupo;
use App\Models\Docs_alumno;
use App\Models\Escenarios;
use App\Models\HistorialAcLab;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            RolesSeeder::class,
            DocumentosSeeder::class,
            ParentescoSeeder::class,
            CarrerasSeeder::class,
            EstadosSeeder::class,
            MunicipiosSeeder::class,
        ]);
        User::factory(10)->create();
        Grupo::factory(10)->create();
        Domicilio::factory(10)->create();
        Alumno::factory(10)->create();
        Docs_alumno::factory(10)->create();
        Datos_tutor::factory(10)->create();
        Escenarios::factory(10)->create();
        HistorialAcLab::factory(10)->create();
    }
}
