<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vale extends Model
{
    use HasFactory;

    

    protected $fillable = [
        'corr',
        'tipo_combustible',
        'tipo_fondo',
        'programa',
        'fecha_fac',
        'nocompra',
        'feini',
        'fefin',
        'nfactura',
        'proveedor',
        'valorvale',
        'precio_referencia',
        'serie_vale',
        'observacion',
    ];
}
