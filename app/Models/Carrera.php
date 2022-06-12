<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;

class Carrera extends Model
{
    use HasFactory;

    protected $table = 'carreras';

    protected function nombre(): Attribute
    {
        return new Attribute(
            set: fn ($value) => strtolower(trim($value)),
            get: fn ($value) => ucwords($value)
        );
    }

    protected function clave(): Attribute
    {
        return new Attribute(
            set: fn ($value) => strtoupper(trim($value)),
            get: fn ($value) => strtoupper($value)
        );
    }

}
