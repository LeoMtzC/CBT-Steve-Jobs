<?php

namespace Database\Seeders;

use App\Models\Datos_tutor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Datos_tutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Datos_tutor::factory(10)->create();
    }
}
