<?php

use Illuminate\Database\Eloquent\Model;

class User extends Model {
    protected $hidden = ["password"];
    protected $fillable = ['nome'];

    public function ordini() {
        return $this->hasMany('Ordini', 'codice_cliente');
    }

    public function dipendente() {
        return $this->belongTo('Dipendente', 'codice');
    }
}


?>