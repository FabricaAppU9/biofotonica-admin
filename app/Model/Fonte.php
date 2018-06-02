<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Fonte extends Model {

    protected $primaryKey = 'id_fonte';
    protected $fillable = [
        'id_fonte',
        'nm_fonte',
        'fabricante',
        'modelo',
        'enabled'
    ];

}
