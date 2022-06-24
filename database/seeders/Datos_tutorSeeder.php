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
        $dat = new Datos_tutor();
        $dat->nombre=$this->faker->firstName();
        $dat->apPat=$this->faker->lastName();
        $dat->apMat=$this->faker->lastName();
        $dat->correo=$this->faker->safeEmail();
        $dat->curp = 'HESM000611HMCRNRA9';
        $dat->telf_movil=1234567890;
        $dat->telf_fijo=1234567890;
        $dat->id_parentesco=1;
        $dat->estado=1;
        $dat->save();

        $dat1 = new Datos_tutor();
        $dat1->nombre=$this->faker->firstName();
        $dat1->apPat=$this->faker->lastName();
        $dat1->apMat=$this->faker->lastName();
        $dat1->correo=$this->faker->safeEmail();
        $dat1->curp = 'HESM000611HMCRNRA9';
        $dat1->telf_movil=1234567890;
        $dat1->telf_fijo=1234567890;
        $dat1->id_parentesco=1;
        $dat1->estado=1;
        $dat1->save();


        $dat2 = new Datos_tutor();
        $dat2->nombre=$this->faker->firstName();
        $dat2->apPat=$this->faker->lastName();
        $dat2->apMat=$this->faker->lastName();
        $dat2->correo=$this->faker->safeEmail();
        $dat2->curp = 'HESM000611HMCRNRA9';
        $dat2->telf_movil=1234567890;
        $dat2->telf_fijo=1234567890;
        $dat2->id_parentesco=1;
        $dat2->estado=1;
        $dat2->save();


        $dat3 = new Datos_tutor();
        $dat3->nombre=$this->faker->firstName();
        $dat3->apPat=$this->faker->lastName();
        $dat3->apMat=$this->faker->lastName();
        $dat3->correo=$this->faker->safeEmail();
        $dat3->curp = 'HESM000611HMCRNRA9';
        $dat3->telf_movil=1234567890;
        $dat3->telf_fijo=1234567890;
        $dat3->id_parentesco=1;
        $dat3->estado=1;
        $dat3->save();


        $dat4 = new Datos_tutor();
        $dat4->nombre=$this->faker->firstName();
        $dat4->apPat=$this->faker->lastName();
        $dat4->apMat=$this->faker->lastName();
        $dat4->correo=$this->faker->safeEmail();
        $dat4->curp = 'HESM000611HMCRNRA9';
        $dat4->telf_movil=1234567890;
        $dat4->telf_fijo=1234567890;
        $dat4->id_parentesco=1;
        $dat4->estado=1;
        $dat4->save();

    }
}
