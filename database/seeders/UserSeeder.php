<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $su = new User();
        $su->nombre = 'SuperUser';
        $su->email = '0000202006';
        $su->id_rol = 1;
        $su->password = Hash::make('superuser');
        $su->remember_token = Str::random(10);
        $su->estado = 1;
        $su->save();

        $us = new User();
        $us->nombre = "Leonardo";
        $us->email = '2022060001';
        $us->id_rol = 2;
        $us->password = Hash::make('123456789'); // password
        $us->remember_token = Str::random(10);
        $us->estado = 1;
        $us->save();

        $us1 = new User();
        $us1->nombre = "Samuel";
        $us1->email = '2022060002';
        $us1->id_rol = 2;
        $us1->password = Hash::make('123456789'); // password
        $us1->remember_token = Str::random(10);
        $us1->estado = 1;
        $us1->save();

        $us2 = new User();
        $us2->nombre = "Lucía";
        $us2->email = '2022060003';
        $us2->id_rol = 2;
        $us2->password = Hash::make('123456789'); // password
        $us2->remember_token = Str::random(10);
        $us2->estado = 1;
        $us2->save();

        $us3 = new User();
        $us3->nombre = "Mariana";
        $us3->email = '2022060004';
        $us3->id_rol = 2;
        $us3->password = Hash::make('123456789'); // password
        $us3->remember_token = Str::random(10);
        $us3->estado = 1;
        $us3->save();

        $us4 = new User();
        $us4->nombre = "Almendra";
        $us4->email = '2022060005';
        $us4->id_rol = 2;
        $us4->password = Hash::make('123456789'); // password
        $us4->remember_token = Str::random(10);
        $us4->estado = 1;
        $us4->save();
    }
}
