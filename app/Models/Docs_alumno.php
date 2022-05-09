<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;

class Docs_alumnos extends Model
{
    use HasFactory;

    protected $table = 'docs_alumnos';

    protected function ine(): Attribute
    {
        return new Attribute(
            set: fn ($value) => trim($value)
        );
    }

    protected function acta_nac(): Attribute
    {
        return new Attribute(
            set: fn ($value) => trim($value)
        );
    }

    protected function carta_aut(): Attribute
    {
        return new Attribute(
            set: fn ($value) => trim($value)
        );
    }
}
