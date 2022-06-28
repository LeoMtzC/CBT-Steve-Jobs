<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;

class HistorialAcLab extends Model
{
    use HasFactory;

    protected $table = 'hist_ac_lab';

    protected $cast = [
        'fecha_ini' => 'date:d/m/Y',
        'fecha_term' => 'date:d/m/Y',
        'fecha_exp' => 'date:d/m/Y',
        'created_at' => 'datetime:d/m/Y',
        'updated_at' => 'datetime:d/m/Y',
    ];

    protected function url(): Attribute
    {
        return new Attribute(
            set: fn ($value) => trim($value)
        );
    }
}
