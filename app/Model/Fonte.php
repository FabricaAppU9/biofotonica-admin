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
    ];

    public function getAll(Array $colums = []) {
        if(count($colums)){
            return $this->all($colums);
        }

        return $this->all();
    }

}
