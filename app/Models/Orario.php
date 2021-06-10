<?php

use Illuminate\Database\Eloquent\Model;

class Orario extends Model {

    protected $table = "orario";
    public $timestamps = false;


    public function dipendente() {
        return $this->belongsTo("Dipendente", "codice", "codice_c");
    }

    public function negozio() {
        return $this->belongsTo("Negozio", "codice", "codice_n");
    }
}


?>