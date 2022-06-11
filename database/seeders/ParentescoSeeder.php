<?php

namespace Database\Seeders;

use App\Models\Parentesco;
use Illuminate\Database\Seeder;

class ParentescoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parentescos = new Parentesco();
        $parentescos -> nombre = "Padre/Madre";
        $parentescos -> estado = 1;
        $parentescos -> save();

        $parentescos2 = new Parentesco();
        $parentescos2 -> nombre = "Tío(a)";
        $parentescos -> estado = 1;
        $parentescos2 -> save();

        $parentescos3 = new Parentesco();
        $parentescos3 -> nombre = "Abuelo(a)";
        $parentescos -> estado = 1;
        $parentescos3 -> save();

        $parentescos4 = new Parentesco();
        $parentescos4 -> nombre = "Hermano(a)";
        $parentescos -> estado = 1;
        $parentescos4 -> save();

        $parentescos4 = new Parentesco();
        $parentescos4 -> nombre = "Tutor";
        $parentescos -> estado = 1;
        $parentescos4 -> save();
    }
}
