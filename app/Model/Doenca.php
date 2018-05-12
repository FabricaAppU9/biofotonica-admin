<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Doenca extends Model {

    protected $primaryKey = 'cid';
    protected $fillable = [
        'cid',
        'nome_doenca'
    ];

    public function getAll(Array $colums = []) {
        if(count($colums)){
            return $this->all($colums);
        }

        return $this->all();
    }
}
