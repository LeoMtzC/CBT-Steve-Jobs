<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;


class Municipio extends Model
{
    use HasFactory;

    protected $table = 'municipios';

    protected function nombre(): Attribute
    {
        return new Attribute(
            set: fn ($value) => strtolower($value),
            get: fn ($value) => ucwords($value)
        );
    }

}
