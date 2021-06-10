<?php


use Illuminate\Database\Eloquent\Model;

class Ordini extends Model {
    protected $table = "ordini";
    public $timestamps = false;

    public function user() {
        return $this->belongTo('User', 'id');
    }

    public function prodotto() {
        return $this->belongTo('Prodotto', 'codice');
    }

    public function negozio() {
        return $this->belongTo('Negozio', 'codice');
    }
}


?>
