<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol = new Rol();
        $rol->nombre = "Administrador";
        $rol->desc = "Agrega, elimina o modifica información";
        $rol->save();

        $rol1 = new Rol();
        $rol1->nombre = "Usuario";
        $rol1->desc = "Generalmente asociado a alumnos";
        $rol1->save();
    }
}
