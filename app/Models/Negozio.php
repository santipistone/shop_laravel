<?php

use Illuminate\Database\Eloquent\Model;

class Negozio extends Model {

    protected $table = "negozio";
    public $timestamps = false;


    public function magazzino() {
        return $this->belongsTo('Magazzino', 'codice', 'sede');
    }


}


?>