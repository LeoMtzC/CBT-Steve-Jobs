<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doc_alumno>
 */
class Docs_AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ine' => 'https://wallpaperaccess.com/full/5750684.jpg',
            'acta_nac' => 'https://cdn.dribbble.com/users/1778913/screenshots/6562748/dribbble-machucado1.jpg?compress=1&resize=800x600&vertical=top',
            'estado' => 1
        ];
    }
}
