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
        $doc3 = new Documento();//1
        $doc3->nombre = "Permiso";
        $doc3->descripcion = "Autoriza al estudiante a realizar las prácticas de observacion";
        $doc3->semestrereq = 1;
        $doc3->horasreq = 0;
        $doc3->estado = 1;
        $doc3->save();

        $doc16 = new Documento();
        $doc16->nombre = "Guía de obvservación";
        $doc16->descripcion = "Informe de prácticas de observación";
        $doc16->semestrereq = 1;
        $doc16->horasreq = 0;
        $doc16->estado = 1;
        $doc16->save();

        $doc10 = new Documento();
        $doc10->nombre = "Carta de Autorización de Prácticas de Ejecución";
        $doc10->descripcion = "Autoriza al estudiante a continuar su proceso";
        $doc10->semestrereq = 2;
        $doc10->horasreq = 0;
        $doc10->estado = 1;
        $doc10->save();

        $doc11 = new Documento();
        $doc11->nombre = "Carta de Autorización de Servicio Social";
        $doc11->descripcion = "Autoriza al estudiante a continuar su proceso";
        $doc11->semestrereq = 5;
        $doc11->horasreq = 0;
        $doc11->estado = 1;
        $doc11->save();

        $doc12 = new Documento();//5
        $doc12->nombre = "Carta de Autorización de Estadías";
        $doc12->descripcion = "Autoriza al estudiante a continuar su proceso";
        $doc12->semestrereq = 6;
        $doc12->horasreq = 0;
        $doc12->estado = 1;
        $doc12->save();

        $doc1 = new Documento();
        $doc1->nombre = "Carta de Presentación Prácticas de Ejecución";
        $doc1->descripcion = "Emitida por la institución al escenario real";
        $doc1->semestrereq = 2;
        $doc1->horasreq = 0;
        $doc1->estado = 1;
        $doc1->save();

        $doc13 = new Documento();
        $doc13->nombre = "Carta de Presentación Servicio Social";
        $doc13->descripcion = "Emitida por la institución al escenario real";
        $doc13->semestrereq = 5;
        $doc13->horasreq = 0;
        $doc13->estado = 1;
        $doc13->save();

        $doc14 = new Documento();
        $doc14->nombre = "Carta de Presentación Estadías";
        $doc14->descripcion = "Emitida por la institución al escenario real";
        $doc14->semestrereq = 6;
        $doc14->horasreq = 0;
        $doc14->estado = 1;
        $doc14->save();

        $doc2 = new Documento();
        $doc2->nombre = "Carta de Aceptación Prácticas de Ejecución";
        $doc2->descripcion = "El escenario informa que ha aceptado al alumno";
        $doc2->semestrereq = 2;
        $doc2->horasreq = 0;
        $doc2->estado = 1;
        $doc2->save();

        $doc15 = new Documento();//10
        $doc15->nombre = "Carta de Aceptación Servicio Social";
        $doc15->descripcion = "El escenario informa que ha aceptado al alumno";
        $doc15->semestrereq = 5;
        $doc15->horasreq = 0;
        $doc15->estado = 1;
        $doc15->save();

        $doc16 = new Documento();
        $doc16->nombre = "Carta de Aceptación Estadías";
        $doc16->descripcion = "El escenario informa que ha aceptado al alumno";
        $doc16->semestrereq = 6;
        $doc16->horasreq = 0;
        $doc16->estado = 1;
        $doc16->save();

        $doc4 = new Documento();
        $doc4->nombre = "Constancia de Término Prácticas de Ejecución";
        $doc4->descripcion = "Certifica haber concluido 100 horas de prácticas de ejecución";
        $doc4->semestrereq = 2;
        $doc4->horasreq = 150;
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

        $doc7 = new Documento();//15
        $doc7->nombre = "Informe de prácticas de ejecución";
        $doc7->descripcion = "Informe de prácticas de ejecución";
        $doc7->semestrereq = 2;
        $doc7->horasreq = 0;
        $doc7->estado = 1;
        $doc7->save();
        
        $doc8 = new Documento();//15
        $doc8->nombre = "Informe de Servicio Social";
        $doc8->descripcion = "Informe de servicio social";
        $doc8->semestrereq = 5;
        $doc8->horasreq = 0;
        $doc8->estado = 1;
        $doc8->save();
        
        $doc9 = new Documento();//15
        $doc9->nombre = "Informe de estadías";
        $doc9->descripcion = "Informe de estadías";
        $doc9->semestrereq = 6;
        $doc9->horasreq = 0;
        $doc9->estado = 1;
        $doc9->save();

        $doc10 = new Documento();
        $doc10->nombre = "Bitácora de prácticas de ejecución";
        $doc10->descripcion = "Bitácora de prácticas de ejecución";
        $doc10->semestrereq = 2;
        $doc10->horasreq = 0;
        $doc10->estado = 1;
        $doc10->save();
        
        $doc11 = new Documento();
        $doc11->nombre = "Bitácora de Servicio Social";
        $doc11->descripcion = "Bitácora de servicio social";
        $doc11->semestrereq = 5;
        $doc11->horasreq = 0;
        $doc11->estado = 1;
        $doc11->save();
        
        $doc12 = new Documento();
        $doc12->nombre = "Bitácora de Estadías";
        $doc12->descripcion = "Bitácora de estadías";
        $doc12->semestrereq = 6;
        $doc12->horasreq = 0;
        $doc12->estado = 1;
        $doc12->save();

        $doc13 = new Documento();
        $doc13->nombre = "Memoria de Trabajo Profesional";
        $doc13->descripcion = "Memoria de trabajo";
        $doc13->semestrereq = 6;
        $doc13->horasreq = 0;
        $doc13->estado = 1;
        $doc13->save();

    }
}
