<?php

namespace Database\Seeders;
use App\Models\Alumno;
use Illuminate\Database\Seeder;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $al = new Alumno();
        $al->matricula = '2022060001';
        $al->nombre = 'Mariano';
        $al->apPat = 'Hernández';
        $al->apMat = 'Sanchez';
        $al->id_usuario = 1;
        $al->id_carrera = 1;
        $al->id_grupo = 1;
        $al->semestre = 1;
        $al->generacion = 2022;
        $al->curp = 'HESM000611HMCRNRA9';
        $al->sexo = 'M';
        $al->telefono ='0011223344';
        $al->correo = $this->faker->safeEmail();
        $al->fecha_nac = '17-06-2000';
        $al->id_domicilio = null;
        $al->nss = $this->faker->numerify('###########');
        $al->seguro_med = 's';
        $al->id_tutor = null;
        $al->id_docs = null;
        $al->estado = 1;
        $al->save();

        $al1 = new Alumno();
        $al1->matricula = '2022060002';
        $al1->nombre = 'Albertano';
        $al1->apPat = 'Ramirez';
        $al1->apMat = 'Ramirez';
        $al1->id_usuario = 2;
        $al1->id_carrera = 2;
        $al1->id_grupo = 2;
        $al1->semestre = 4;
        $al1->generacion = 2022;
        $al1->curp = 'HESM000611HMCRNRA9';
        $al1->sexo = 'M';
        $al1->telefono ='0011223344';
        $al1->correo = $this->faker->safeEmail();
        $al1->fecha_nac = '13-05-2000';
        $al1->id_domicilio = null;
        $al1->nss = $this->faker->numerify('###########');
        $al1->seguro_med = 's';
        $al1->id_tutor = null;
        $al1->id_docs = null;
        $al1->estado = 1;
        $al1->save();

        $al2 = new Alumno();
        $al2->matricula = '2022060003';
        $al2->nombre = 'Guadalupe';
        $al2->apPat = 'Rpdriguez';
        $al2->apMat = 'Mendez';
        $al2->id_usuario = 3;
        $al2->id_carrera = 2;
        $al2->id_grupo = 3;
        $al2->semestre = 5;
        $al2->generacion = 2022;
        $al2->curp = 'HESM000611HMCRNRA9';
        $al2->sexo = 'F';
        $al2->telefono ='0011223344';
        $al2->correo = $this->faker->safeEmail();
        $al2->fecha_nac = '25-01-2000';
        $al2->id_domicilio = null;
        $al2->nss = $this->faker->numerify('###########');
        $al2->seguro_med = 's';
        $al2->id_tutor = null;
        $al2->id_docs = null;
        $al2->estado = 1;
        $al2->save();

        $al3 = new Alumno();
        $al3->matricula = '2022060004';
        $al3->nombre = 'Mariana';
        $al3->apPat = 'Hernández';
        $al3->apMat = 'Sanchez';
        $al3->id_usuario = 4;
        $al3->id_carrera = 1;
        $al3->id_grupo = 1;
        $al3->semestre = 1;
        $al3->generacion = 2022;
        $al3->curp = 'HESM000611HMCRNRA9';
        $al3->sexo = 'F';
        $al3->telefono ='0011223344';
        $al3->correo = $this->faker->safeEmail();
        $al3->fecha_nac = '17-06-2000';
        $al3->id_domicilio = null;
        $al3->nss = $this->faker->numerify('###########');
        $al3->seguro_med = 's';
        $al3->id_tutor = null;
        $al3->id_docs = null;
        $al3->estado = 1;
        $al3->save();

        $al4 = new Alumno();
        $al4->matricula = '2022060005';
        $al4->nombre = 'Miranda';
        $al4->apPat = 'Lopez';
        $al4->apMat = 'Sanchez';
        $al4->id_usuario = 5;
        $al4->id_carrera = 2;
        $al4->id_grupo = 4;
        $al4->semestre = 1;
        $al4->generacion = 2022;
        $al4->curp = 'HESM000611HMCRNRA9';
        $al4->sexo = 'M';
        $al4->telefono ='0011223344';
        $al4->correo = $this->faker->safeEmail();
        $al4->fecha_nac = '22-07-2000';
        $al4->id_domicilio = null;
        $al4->nss = $this->faker->numerify('###########');
        $al4->seguro_med = 's';
        $al4->id_tutor = null;
        $al4->id_docs = null;
        $al4->estado = 1;
        $al4->save();
    }
}
