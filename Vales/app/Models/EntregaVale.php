<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntregaVale  extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'numero_solicitud',
        'programa',
        'suministra',
        'solicita',
        'depto_solicita',
        'tipo_fondo',
        'mision',
        'fecha_reserva',
        'fecha_vence',
        'destino',
        'departamento',
        'proyecto',
        'autoriza',
        'combustible',
        'cantidad_combustible',
        'conversion',
        'serie',
        'no_requisicion',
        'precio_compra',
        'precio_actual',
        'autorizados',
        'digitados',
        'serie_vale',
    ];
}
