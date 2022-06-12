<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;

class Escenarios extends Model
{
    use HasFactory;

    protected $table = 'escenarios';

    protected function nombreEsc(): Attribute
    {
        return new Attribute(
            set: fn ($value) => trim($value)
        );
    }

    protected function direccion(): Attribute
    {
        return new Attribute(
            set: fn ($value) => trim($value)
        );
    }

    protected function nombreResp(): Attribute
    {
        return new Attribute(
            set: fn ($value) => strtolower(trim($value)),
            get: fn ($value) => ucwords($value)
        );
    }

    protected function apPatResp(): Attribute
    {
        return new Attribute(
            set: fn ($value) => strtolower(trim($value)),
            get: fn ($value) => ucwords($value)
        );
    }

    protected function apMatResp(): Attribute
    {
        return new Attribute(
            set: fn ($value) => strtolower(trim($value)),
            get: fn ($value) => ucwords($value)
        );
    }

    protected function telefono(): Attribute
    {
        return new Attribute(
            set: fn ($value) => trim($value)
        );
    }

}
