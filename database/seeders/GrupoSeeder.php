<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Grupo;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grp = new Grupo();
        $grp->id_carrera = 1;
        $grp->clave = "00000001";
        $grp->grupo = "A";
        $grp->semestre= 1;
        $grp->generacion = 2022;
        $grp->estado = 1;
        $grp->save();

        $grp1 = new Grupo();
        $grp1->id_carrera = 1;
        $grp1->clave = "00000002";
        $grp1->grupo = "B";
        $grp1->semestre= 1;
        $grp1->generacion = 2022;
        $grp1->estado = 1;
        $grp1->save();

        $grp2 = new Grupo();
        $grp2->id_carrera = 2;
        $grp2->clave = "00000003";
        $grp2->grupo = "C";
        $grp2->semestre= 1;
        $grp2->generacion = 2022;
        $grp2->estado = 1;
        $grp2->save();

        $grp3 = new Grupo();
        $grp3->id_carrera = 1;
        $grp3->clave = "00000004";
        $grp3->grupo = "A";
        $grp3->semestre= 3;
        $grp3->generacion = 2022;
        $grp3->estado = 1;
        $grp3->save();

        $grp4 = new Grupo();
        $grp4->id_carrera = 1;
        $grp4->clave = "00000005";
        $grp4->grupo = "B";
        $grp4->semestre= 3;
        $grp4->generacion = 2022;
        $grp4->estado = 1;
        $grp4->save();

        $grp5 = new Grupo();
        $grp5->id_carrera = 2;
        $grp5->clave = "00000006";
        $grp5->grupo = "C";
        $grp5->semestre= 3;
        $grp5->generacion = 2022;
        $grp5->estado = 1;
        $grp5->save();

        $grp6 = new Grupo();
        $grp6->id_carrera = 2;
        $grp6->clave = "00000006";
        $grp6->grupo = "C";
        $grp6->semestre= 3;
        $grp6->generacion = 2022;
        $grp6->estado = 1;
        $grp6->save();

        $grp7 = new Grupo();
        $grp7->id_carrera = 2;
        $grp7->clave = "00000006";
        $grp7->grupo = "C";
        $grp7->semestre= 3;
        $grp7->generacion = 2022;
        $grp7->estado = 1;
        $grp7->save();

        $grp8 = new Grupo();
        $grp8->id_carrera = 1;
        $grp8->clave = "00000007";
        $grp8->grupo = "A";
        $grp8->semestre= 5;
        $grp8->generacion = 2022;
        $grp8->estado = 1;
        $grp8->save();

        $grp9 = new Grupo();
        $grp9->id_carrera = 1;
        $grp9->clave = "00000008";
        $grp9->grupo = "B";
        $grp9->semestre= 5;
        $grp9->generacion = 2022;
        $grp9->estado = 1;
        $grp9->save();

        $grp10 = new Grupo();
        $grp10->id_carrera = 2;
        $grp10->clave = "00000008";
        $grp10->grupo = "C";
        $grp10->semestre= 5;
        $grp10->generacion = 2022;
        $grp10->estado = 1;
        $grp10->save();
    }
}
