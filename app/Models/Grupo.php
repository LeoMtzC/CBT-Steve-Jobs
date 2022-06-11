<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;

class Grupo extends Model
{
    use HasFactory;

    protected $table = 'grupos';

    protected function clave(): Attribute
    {
        return new Attribute(
            set: fn ($value) => trim($value),
        );
    }

    protected function grado(): Attribute
    {
        return new Attribute(
            set: fn ($value) => trim($value),
        );
    }

    protected function aula(): Attribute
    {
        return new Attribute(
            set: fn ($value) => strtoupper(trim($value)),
        );
    }
}
