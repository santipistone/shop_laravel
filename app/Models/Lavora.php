<?php

use Illuminate\Database\Eloquent\Model;

class Lavora extends Model {

    protected $table = "lavora";
    public $timestamps = false;


    public function dipendente() {
        return $this->belongsTo("Dipendente", "codice", "codice_c");
    }
}


?>