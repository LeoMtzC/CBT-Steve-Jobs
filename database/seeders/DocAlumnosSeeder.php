<?php

namespace Database\Seeders;

use App\Models\Docs_alumno;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocAlumnosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $docs = new Docs_alumno();
        $docs->ine = 'https://wallpaperaccess.com/full/5750684.jpg';
        $docs->acta_nac= 'https://cdn.dribbble.com/users/1778913/screenshots/6562748/dribbble-machucado1.jpg?compress=1&resize=800x600&vertical=top';
        $docs->estado = 1;
        $docs->save();

        $docs1 = new Docs_alumno();
        $docs1->ine = 'https://wallpaperaccess.com/full/5750684.jpg';
        $docs1->acta_nac= 'https://cdn.dribbble.com/users/1778913/screenshots/6562748/dribbble-machucado1.jpg?compress=1&resize=800x600&vertical=top';
        $docs1->estado = 1;
        $docs1->save();

        $docs2 = new Docs_alumno();
        $docs2->ine = 'https://wallpaperaccess.com/full/5750684.jpg';
        $docs2->acta_nac= 'https://cdn.dribbble.com/users/1778913/screenshots/6562748/dribbble-machucado1.jpg?compress=1&resize=800x600&vertical=top';
        $docs2->estado = 1;
        $docs2->save();

        $docs3 = new Docs_alumno();
        $docs3->ine = 'https://wallpaperaccess.com/full/5750684.jpg';
        $docs3->acta_nac= 'https://cdn.dribbble.com/users/1778913/screenshots/6562748/dribbble-machucado1.jpg?compress=1&resize=800x600&vertical=top';
        $docs3->estado = 1;
        $docs3->save();
        
        $docs4 = new Docs_alumno();
        $docs4->ine = 'https://wallpaperaccess.com/full/5750684.jpg';
        $docs4->acta_nac= 'https://cdn.dribbble.com/users/1778913/screenshots/6562748/dribbble-machucado1.jpg?compress=1&resize=800x600&vertical=top';
        $docs4->estado = 1;
        $docs4->save();
    }
}
