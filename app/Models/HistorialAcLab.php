<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;

class HistorialAcLab extends Model
{
    use HasFactory;

    protected $table = 'hist_ac_lab';

    protected function url(): Attribute
    {
        return new Attribute(
            set: fn ($value) => trim($value)
        );
    }
}
