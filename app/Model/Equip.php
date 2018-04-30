<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Equip extends Model
{
    protected $primaryKey = 'id_equip';
    protected $fillable = [
        'id_equip',
        'nm_equip',
        'nm_fabricante',
        'comprimento_onda',
        'modo_operacao',
        'area',
        'potencia_max',
        'polarizacao',
        'perfil',
        'id_fl'];
}
