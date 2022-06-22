<?php

namespace Database\Seeders;

use App\Models\Documento;
use Illuminate\Database\Seeder;

class DocumentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doc3 = new Documento();
        $doc3->nombre = "Carta de Autorización";
        $doc3->descripcion = "Autoriza al estudiante a continuar su proceso";
        $doc3->semestrereq = 5;
        $doc3->horasreq = 0;
        $doc3->estado = 1;
        $doc3->save();

        $doc1 = new Documento();
        $doc1->nombre = "Carta de Presentación";
        $doc1->descripcion = "Emitida por la institución al escenario real";
        $doc1->semestrereq = 3;
        $doc1->horasreq = 0;
        $doc1->estado = 1;
        $doc1->save();

        $doc2 = new Documento();
        $doc2->nombre = "Carta de Aceptación";
        $doc2->descripcion = "El escenario informa que ha aceptado al alumno";
        $doc2->semestrereq = 3;
        $doc2->horasreq = 0;
        $doc2->estado = 1;
        $doc2->save();
        
        $doc4 = new Documento();
        $doc4->nombre = "Constancia de Término Practicas de Ejecución";
        $doc4->descripcion = "Certifica haber concluido 100 horas de prácticas de ejecución";
        $doc4->semestrereq = 3;
        $doc4->horasreq = 100;
        $doc4->estado = 1;
        $doc4->save();
        
        $doc5 = new Documento();
        $doc5->nombre = "Constancia de Término Servicio Social";
        $doc5->descripcion = "Certifica la finalización del Servicio Social";
        $doc5->semestrereq = 5;
        $doc5->horasreq = 480;
        $doc5->estado = 1;
        $doc5->save();

        $doc6 = new Documento();
        $doc6->nombre = "Constancia de Término Estadías";
        $doc6->descripcion = "Certifica la finalización de las estadías";
        $doc6->semestrereq = 6;
        $doc6->horasreq = 150;
        $doc6->estado = 1;
        $doc6->save();

        $doc7 = new Documento();
        $doc7->nombre = "Informe";
        $doc7->descripcion = "Informe de estadías o servicio social";
        $doc7->semestrereq = 5;
        $doc7->horasreq = 0;
        $doc7->estado = 1;
        $doc7->save();

        $doc8 = new Documento();
        $doc8->nombre = "Bitácora";
        $doc8->descripcion = "Bitácora de estadías o servicio social";
        $doc8->semestrereq = 5;
        $doc8->horasreq = 0;
        $doc8->estado = 1;
        $doc8->save();

        $doc8 = new Documento();
        $doc8->nombre = "Memoria de Trabajo Profesional";
        $doc8->descripcion = "Memoria de trabajo";
        $doc8->semestrereq = 5;
        $doc8->horasreq = 0;
        $doc8->estado = 1;
        $doc8->save();
    }
}
