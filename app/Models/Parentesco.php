<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;

class Parentesco extends Model
{
    use HasFactory;

    protected $table = 'parentescos';

    protected $cast = [
        'created_at' => 'datetime:d/m/Y',
        'updated_at' => 'datetime:d/m/Y',
    ];

    protected function nombre(): Attribute
    {
        return new Attribute(
            set: fn ($value) => strtolower($value),
            get: fn ($value) => ucfirst($value)
        );
    }

}
