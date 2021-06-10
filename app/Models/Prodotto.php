<?php


use Illuminate\Database\Eloquent\Model;

class Prodotto extends Model {
    protected $table = "prodotto";
    public $timestamps = false;
    protected $fillable = ['stock'];

    public function magazzino() {
        return $this->belongsTo('Magazzino', 'codice_m', 'sede');
    }

    public static function getInfo($id) {
        return Prodotto::where('codice', $id)->first();
    }

    public static function aggiorna($id, $column, $value) {
        return Prodotto::where('codice', $id)->first()->update($column, $value);
    }
}


?>
