<?php

namespace Database\Seeders;

use App\Models\Escenarios;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EscenariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $esc = new Escenarios();
        $esc->nombreEsc= $this->faker->company();
        $esc->direccion = $this->faker->address();
        $esc->nombreResp = $this->faker->firstName();
        $esc->apPatResp = $this->faker->lastName();
        $esc->apMatResp = $this->faker->lastName();
        $esc->telefono = $this->faker->numerify('##########');
        $esc->estado = 1;
        $esc->save();
        
        $esc1 = new Escenarios();
        $esc1->nombreEsc= $this->faker->company();
        $esc1->direccion = $this->faker->address();
        $esc1->nombreResp = $this->faker->firstName();
        $esc1->apPatResp = $this->faker->lastName();
        $esc1->apMatResp = $this->faker->lastName();
        $esc1->telefono = $this->faker->numerify('##########');
        $esc1->estado = 1;
        $esc1->save();

        $esc2 = new Escenarios();
        $esc2->nombreEsc= $this->faker->company();
        $esc2->direccion = $this->faker->address();
        $esc2->nombreResp = $this->faker->firstName();
        $esc2->apPatResp = $this->faker->lastName();
        $esc2->apMatResp = $this->faker->lastName();
        $esc2->telefono = $this->faker->numerify('##########');
        $esc2->estado = 1;
        $esc2->save();

        $esc3 = new Escenarios();
        $esc3->nombreEsc= $this->faker->company();
        $esc3->direccion = $this->faker->address();
        $esc3->nombreResp = $this->faker->firstName();
        $esc3->apPatResp = $this->faker->lastName();
        $esc3->apMatResp = $this->faker->lastName();
        $esc3->telefono = $this->faker->numerify('##########');
        $esc3->estado = 1;
        $esc3->save();

        $esc4 = new Escenarios();
        $esc4->nombreEsc= $this->faker->company();
        $esc4->direccion = $this->faker->address();
        $esc4->nombreResp = $this->faker->firstName();
        $esc4->apPatResp = $this->faker->lastName();
        $esc4->apMatResp = $this->faker->lastName();
        $esc4->telefono = $this->faker->numerify('##########');
        $esc4->estado = 1;
        $esc4->save();
    }
}
