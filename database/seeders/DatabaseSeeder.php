<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            EscenariosSeeder::class,
            UserSeeder::class,
            DomiciliosSeeder::class,
            Datos_tutorSeeder::class,
            DocAlumnosSeeder::class,
            GrupoSeeder::class,
            AlumnoSeeder::class,
        ]);
    }
}
