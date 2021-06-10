<?php

use Illuminate\Database\Eloquent\Model;

class Magazzino extends Model {

    protected $table = "magazzino";
    public $timestamps = false;


    public function negozio() {
        return $this->hasMany('Negozio', 'codice_m', 'sede');
    }


}


?>