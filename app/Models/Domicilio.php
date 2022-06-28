<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;

class Domicilio extends Model
{
    use HasFactory;

    protected $table = 'domicilios';

    protected $cast = [
        'created_at' => 'datetime:d/m/Y',
        'updated_at' => 'datetime:d/m/Y',
    ];

    protected function calle(): Attribute
    {
        return new Attribute(
            set: fn ($value) => strtolower($value),
            get: fn ($value) => ucwords($value)
        );
    }

    protected function colonia(): Attribute
    {
        return new Attribute(
            set: fn ($value) => strtolower($value),
            get: fn ($value) => ucwords($value)
        );
    }

    protected function cp(): Attribute
    {
        return new Attribute(
            set: fn ($value) => trim($value)
        );
    }

    protected function no_ext(): Attribute
    {
        return new Attribute(
            set: fn ($value) => trim($value)
        );
    }

    protected function no_int(): Attribute
    {
        return new Attribute(
            set: fn ($value) => trim($value)
        );
    }
}
