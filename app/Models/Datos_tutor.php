<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;

class Datos_tutor extends Model
{
    use HasFactory;

    protected $table = 'datos_tutores';

    protected function nombre(): Attribute
    {
        return new Attribute(
            set: fn ($value) => strtolower(trim($value)),
            get: fn ($value) => ucwords($value)
        );
    }

    protected function apPat(): Attribute
    {
        return new Attribute(
            set: fn ($value) => strtolower(trim($value)),
            get: fn ($value) => ucwords($value)
        );
    }

    protected function apMat(): Attribute
    {
        return new Attribute(
            set: fn ($value) => strtolower(trim($value)),
            get: fn ($value) => ucwords($value)
        );
    }

    protected function correo(): Attribute
    {
        return new Attribute(
            set: fn ($value) => trim($value)
        );
    }

    protected function curp(): Attribute
    {
        return new Attribute(
            set: fn ($value) => strtoupper(trim($value)),
            get: fn ($value) => strtoupper($value)
        );
    }

    protected function telf_movil(): Attribute
    {
        return new Attribute(
            set: fn ($value) => trim($value)
        );
    }

    protected function telf_fijo(): Attribute
    {
        return new Attribute(
            set: fn ($value) => trim($value)
        );
    }

}
