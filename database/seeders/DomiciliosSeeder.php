<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Domicilio;

class DomiciliosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dom = new Domicilio();
        $dom->id_estado = 15;
        $dom->id_muni = 708;
        $dom->calle = 'Principal';
        $dom->colonia = 'Centro';
        $dom->cp = '52400';
        $dom->no_ext = '404';
        $dom->no_int = '';
        $dom->estado = 1;
        $dom->save();

        $dom1 = new Domicilio();
        $dom1->id_estado = 15;
        $dom1->id_muni = 708;
        $dom1->calle = 'Principal';
        $dom1->colonia = 'Centro';
        $dom1->cp = '52400';
        $dom1->no_ext = '117';
        $dom1->no_int = '';
        $dom1->estado = 1;
        $dom1->save();


        $dom2 = new Domicilio();
        $dom2->id_estado = 15;
        $dom2->id_muni = 708;
        $dom2->calle = 'Principal';
        $dom2->colonia = 'Centro';
        $dom2->cp = '52400';
        $dom2->no_ext = '217';
        $dom2->no_int = '';
        $dom2->estado = 1;
        $dom2->save();

        $dom3 = new Domicilio();
        $dom3->id_estado = 15;
        $dom3->id_muni = 708;
        $dom3->calle = 'Principal';
        $dom3->colonia = 'Centro';
        $dom3->cp = '52400';
        $dom3->no_ext = '505';
        $dom3->no_int = '';
        $dom3->estado = 1;
        $dom3->save();

        $dom4 = new Domicilio();
        $dom4->id_estado = 15;
        $dom4->id_muni = 708;
        $dom4->calle = 'Principal';
        $dom4->colonia = 'Centro';
        $dom4->cp = '52400';
        $dom4->no_ext = '404';
        $dom4->no_int = '';
        $dom4->estado = 1;
        $dom4->save();
    }
}
