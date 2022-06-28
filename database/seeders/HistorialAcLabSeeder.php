<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HistorialAcLab;

class HistorialAcLabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
/*
        $hist = new HistorialAcLab();
        $hist->id_docu = 1;//carta de autorización
        $hist->id_alumno = 1;
        $hist->url = "https://www.maths.ed.ac.uk/~v1ranick/papers/wilsongraph.pdf";
        $hist->id_escenario = 1;
        $hist->horascumpl = 0;
        $hist->fecha_ini = "01-06-2022";
        $hist->fecha_term = "01-06-2022";
        $hist->fecha_exp = "08-06-2022";
        $hist->estado = 1;
        $hist->save();

        $hist1 = new HistorialAcLab();
        $hist1->id_docu = 2;//guia de  observación
        $hist1->id_alumno = 1;
        $hist1->url = "https://www.maths.ed.ac.uk/~v1ranick/papers/wilsongraph.pdf";
        $hist1->id_escenario = 1;
        $hist1->horascumpl = 0;
        $hist1->fecha_ini = "01-06-2022";
        $hist1->fecha_term = "01-06-2022";
        $hist1->fecha_exp = "08-06-2022";
        $hist1->estado = 1;
        $hist1->save();

        $hist2 = new HistorialAcLab();
        $hist2->id_docu = 3;//carta de Autorizacion pE
        $hist2->id_alumno = 1;
        $hist2->url = "https://www.maths.ed.ac.uk/~v1ranick/papers/wilsongraph.pdf";
        $hist2->id_escenario = 2;
        $hist2->horascumpl = 0;
        $hist2->fecha_ini = "02-07-2022";
        $hist2->fecha_term = "02-07-2022";
        $hist2->fecha_exp = "09-02-2022";
        $hist2->estado = 1;
        $hist2->save();

        $hist3 = new HistorialAcLab();
        $hist3->id_docu = 3; //presentacion pE
        $hist3->id_alumno = 1;
        $hist3->url = "https://www.maths.ed.ac.uk/~v1ranick/papers/wilsongraph.pdf";
        $hist3->id_escenario = 2;
        $hist3->horascumpl = 0;
        $hist3->fecha_ini = "02-07-2022";
        $hist3->fecha_term = "02-07-2022";
        $hist3->fecha_exp = "09-02-2022";
        $hist3->estado = 1;
        $hist3->save();

        $hist4 = new HistorialAcLab();
        $hist4->id_docu = 9; //aceptacion pE
        $hist4->id_alumno = 1;
        $hist4->url = "https://www.maths.ed.ac.uk/~v1ranick/papers/wilsongraph.pdf";
        $hist4->id_escenario = 2;
        $hist4->horascumpl = 0;
        $hist4->fecha_ini = "02-07-2022";
        $hist4->fecha_term = "02-07-2022";
        $hist4->fecha_exp = "09-02-2022";
        $hist4->estado = 1;
        $hist4->save();

        $hist5 = new HistorialAcLab();
        $hist5->id_docu = 12;//termino pE
        $hist5->id_alumno = 1;
        $hist5->url = "https://www.maths.ed.ac.uk/~v1ranick/papers/wilsongraph.pdf";
        $hist5->id_escenario = 2;
        $hist5->horascumpl = 0;
        $hist5->fecha_ini = "02-07-2022";
        $hist5->fecha_term = "02-07-2022";
        $hist5->fecha_exp = "09-02-2022";
        $hist5->estado = 1;
        $hist5->save();

        $hist6 = new HistorialAcLab();
        $hist6->id_docu = 9; //aceptacion E
        $hist6->id_alumno = 1;
        $hist6->url = "https://www.maths.ed.ac.uk/~v1ranick/papers/wilsongraph.pdf";
        $hist6->id_escenario = 2;
        $hist6->horascumpl = 0;
        $hist6->fecha_ini = "02-07-2022";
        $hist6->fecha_term = "02-07-2022";
        $hist6->fecha_exp = "09-02-2022";
        $hist6->estado = 1;
        $hist6->save();

        $hist7 = new HistorialAcLab();
        $hist7->id_docu = 15; //informe
        $hist7->id_alumno = 1;
        $hist7->url = "https://www.maths.ed.ac.uk/~v1ranick/papers/wilsongraph.pdf";
        $hist7->id_escenario = 2;
        $hist7->horascumpl = 0;
        $hist7->fecha_ini = "02-07-2022";
        $hist7->fecha_term = "02-07-2022";
        $hist7->fecha_exp = "09-02-2022";
        $hist7->estado = 1;
        $hist7->save();

        $hist8 = new HistorialAcLab();
        $hist8->id_docu = 16;//bitácora
        $hist8->id_alumno = 1;
        $hist8->url = "https://www.maths.ed.ac.uk/~v1ranick/papers/wilsongraph.pdf";
        $hist8->id_escenario = 2;
        $hist8->horascumpl = 0;
        $hist8->fecha_ini = "02-07-2022";
        $hist8->fecha_term = "02-07-2022";
        $hist8->fecha_exp = "09-02-2022";
        $hist8->estado = 1;
        $hist8->save();


        $hist10 = new HistorialAcLab();
        $hist10->id_docu = 5;//carta de autorización
        $hist10->id_alumno = 1;
        $hist10->url = "https://www.maths.ed.ac.uk/~v1ranick/papers/wilsongraph.pdf";
        $hist10->id_escenario = 3;
        $hist10->horascumpl = 0;
        $hist10->fecha_ini = "10-06-2022";
        $hist10->fecha_term = "10-06-2022";
        $hist10->fecha_exp = "18-06-2022";
        $hist10->estado = 1;
        $hist10->save();

        $hist11 = new HistorialAcLab();
        $hist11->id_docu = 7;//carta de Autorizacion SS
        $hist11->id_alumno = 1;
        $hist11->url = "https://www.maths.ed.ac.uk/~v1ranick/papers/wilsongraph.pdf";
        $hist11->id_escenario = 3;
        $hist11->horascumpl = 0;
        $hist11->fecha_ini = "02-07-2022";
        $hist11->fecha_term = "02-07-2022";
        $hist11->fecha_exp = "09-02-2022";
        $hist11->estado = 1;
        $hist11->save();

        $hist12 = new HistorialAcLab();
        $hist12->id_docu = 10; //aceptacion SS
        $hist12->id_alumno = 1;
        $hist12->url = "https://www.maths.ed.ac.uk/~v1ranick/papers/wilsongraph.pdf";
        $hist12->id_escenario = 2;
        $hist12->horascumpl = 0;
        $hist12->fecha_ini = "02-07-2022";
        $hist12->fecha_term = "02-07-2022";
        $hist12->fecha_exp = "09-02-2022";
        $hist12->estado = 1;
        $hist12->save();

        $hist13 = new HistorialAcLab();
        $hist13->id_docu = 13; //termino SS
        $hist13->id_alumno = 1;
        $hist13->url = "https://www.maths.ed.ac.uk/~v1ranick/papers/wilsongraph.pdf";
        $hist13->id_escenario = 2;
        $hist13->horascumpl = 0;
        $hist13->fecha_ini = "02-07-2022";
        $hist13->fecha_term = "02-07-2022";
        $hist13->fecha_exp = "09-02-2022";
        $hist13->estado = 1;
        $hist13->save();

        $hist14 = new HistorialAcLab();
        $hist14->id_docu = 12;//termino pE
        $hist14->id_alumno = 1;
        $hist14->url = "https://www.maths.ed.ac.uk/~v1ranick/papers/wilsongraph.pdf";
        $hist14->id_escenario = 2;
        $hist14->horascumpl = 0;
        $hist14->fecha_ini = "02-07-2022";
        $hist14->fecha_term = "02-07-2022";
        $hist14->fecha_exp = "09-02-2022";
        $hist14->estado = 1;
        $hist14->save();

        $hist15 = new HistorialAcLab();
        $hist15->id_docu = 15; //informe
        $hist15->id_alumno = 1;
        $hist15->url = "https://www.maths.ed.ac.uk/~v1ranick/papers/wilsongraph.pdf";
        $hist15->id_escenario = 2;
        $hist15->horascumpl = 0;
        $hist15->fecha_ini = "02-07-2022";
        $hist15->fecha_term = "02-07-2022";
        $hist15->fecha_exp = "09-02-2022";
        $hist15->estado = 1;
        $hist15->save();

        $hist16 = new HistorialAcLab();
        $hist16->id_docu = 16;//bitácora
        $hist16->id_alumno = 1;
        $hist16->url = "https://www.maths.ed.ac.uk/~v1ranick/papers/wilsongraph.pdf";
        $hist16->id_escenario = 2;
        $hist16->horascumpl = 0;
        $hist16->fecha_ini = "02-07-2022";
        $hist16->fecha_term = "02-07-2022";
        $hist16->fecha_exp = "09-02-2022";
        $hist16->estado = 1;
        $hist16->save();
*/

    }
}
