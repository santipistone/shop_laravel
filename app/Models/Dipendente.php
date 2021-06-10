<?php

use Illuminate\Database\Eloquent\Model;
use App\Lavora;

class Dipendente extends Model {

    protected $table = "dipendente";
    public $timestamps = false;


    public function lavora() {
        return $this->hasOne("Lavora", "codice_c", "codice");
    }
}


?>