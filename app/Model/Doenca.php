<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Doenca extends Model {

    protected $primaryKey = 'cid';
    protected $fillable = [
        'cid',
        'nome_doenca',
        'enabled'
    ];

}
