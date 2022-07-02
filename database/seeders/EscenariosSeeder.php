<?php

namespace Database\Seeders;

use App\Models\Escenarios;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator;
use Illuminate\Container\Container;

class EscenariosSeeder extends Seeder
{

    protected $faker;

    public function __construct(){
        $this->faker = $this->withFaker();
    }

    protected function withFaker(){
        return Container::getInstance()->make(Generator::class);
    }

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
        $esc->cargoResp = 'Director';
        $esc->telefono = $this->faker->numerify('##########');
        $esc->fecha_ini = '2000-06-17';
        $esc->fecha_term = '2000-08-17';
        $esc->estado = 1;
        $esc->save();
        
        $esc1 = new Escenarios();
        $esc1->nombreEsc= $this->faker->company();
        $esc1->direccion = $this->faker->address();
        $esc1->nombreResp = $this->faker->firstName();
        $esc1->apPatResp = $this->faker->lastName();
        $esc1->apMatResp = $this->faker->lastName();
        $esc1->cargoResp = 'Subdirector';
        $esc1->telefono = $this->faker->numerify('##########');
        $esc1->fecha_ini = '2000-06-17';
        $esc1->fecha_term = '2000-08-17';
        $esc1->estado = 1;
        $esc1->save();

        $esc2 = new Escenarios();
        $esc2->nombreEsc= $this->faker->company();
        $esc2->direccion = $this->faker->address();
        $esc2->nombreResp = $this->faker->firstName();
        $esc2->apPatResp = $this->faker->lastName();
        $esc2->apMatResp = $this->faker->lastName();
        $esc2->cargoResp = 'Dueño';
        $esc2->telefono = $this->faker->numerify('##########');
        $esc2->fecha_ini = '2000-06-17';
        $esc2->fecha_term = '2000-08-17';
        $esc2->estado = 1;
        $esc2->save();

        $esc3 = new Escenarios();
        $esc3->nombreEsc= $this->faker->company();
        $esc3->direccion = $this->faker->address();
        $esc3->nombreResp = $this->faker->firstName();
        $esc3->apPatResp = $this->faker->lastName();
        $esc3->apMatResp = $this->faker->lastName();
        $esc3->cargoResp = 'Secretario';
        $esc3->telefono = $this->faker->numerify('##########');
        $esc3->fecha_ini = '2000-06-17';
        $esc3->fecha_term = '2000-08-17';
        $esc3->estado = 1;
        $esc3->save();

        $esc4 = new Escenarios();
        $esc4->nombreEsc= $this->faker->company();
        $esc4->direccion = $this->faker->address();
        $esc4->nombreResp = $this->faker->firstName();
        $esc4->apPatResp = $this->faker->lastName();
        $esc4->apMatResp = $this->faker->lastName();
        $esc4->cargoResp = 'Dueño';
        $esc4->telefono = $this->faker->numerify('##########');
        $esc4->fecha_ini  = '2000-06-17';
        $esc4->fecha_term =  '2000-08-17';
        $esc4->estado = 1;
        $esc4->save();
    }
}
