<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Trata extends Model {

    protected $fillable = [
        'cid',
        'nm_fonte',
        'nm_equip',
        'tempo',
        'sessoes',
        'freq'
    ];

}
