<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;


class Roles extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected function nombre(): Attribute
    {
        return new Attribute(
            set: fn ($value) => strtolower($value),
            get: fn ($value) => ucfirst($value)
        );
    }

    protected function desc(): Attribute
    {
        return new Attribute(
            set: fn ($value) => strtolower($value),
            get: fn ($value) => ucfirst($value)
        );
    }
}
