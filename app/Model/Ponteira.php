<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ponteira extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'comprimento_onda',
        'modo_operacao',
        'area',
        'potencia_max',
        'polarizacao',
        'perfil',
        'id_fl'
    ];
}
