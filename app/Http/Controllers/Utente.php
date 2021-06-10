

<?php

use Illuminate\Routing\Controller as BaseController;

class Utente extends BaseController
{


    public static function getPrivacy() {
        $id = session('id');
        $q1 = User::where('id', $id)->first();
        $q2 = Dipendente::where('codice', $id)->first();
        if ($q2 === null) {
            if ($q1 != null) {
                Session::put('mark', 'user');
            }
            else
                return;
        } elseif (isset($q2)) {
            if ($q2->lavora()->first()->where('data_fine', '0000-00-00')->first()) {
                Session::put('mark', 'worker');
            }
        } else 
            return;
    }

    public function getPage() {
        $this->getPrivacy();
        if (session('mark') === "user") {
            return view("home")->with("page", "orders");
        }elseif (session('mark') === "worker") {
            return view("home")->with("page", "admin");
        } else {
            return view("home");
        }
    }



    public static function getOrderClient($id) {
        $q1 = Ordini::all()->where('codice_cliente', $id)->sortBy('data_')->reverse()->take(10);
        echo "<table>";
        echo "<tr><td>Nome prodotto</td><td>Codice Cliente</td><td>Data</td><td>Quantità</td><td>Orario</td><td>Indirizzo</td><td>Negozio</td><td>Spedito</td></tr>";
        foreach ($q1 as $x) {
            $name = Prodotto::where('codice', $x->codice_prodotto)->first()->nome;
            $x->codice_m = Negozio::where("codice", $x->codice_neg)->first()->codice_m;
            if ($x->spedito == '1') {
                $img = "<img src=/img/ok.png' style='height: 20px; margin-right: 5px;'>";
            }else
            $img = "<img src='/img/no.png' style='height: 30px;'>";
            echo "<tr><td>".$name."</td><td>".$x->codice_cliente."</td><td>".$x->data_."</td><td>".$x->stock."</td><td>".$x->orario."</td><td>".$x->indirizzo_sped."</td><td>".$x->codice_m."</td><td>".$img."</td></tr>";
        }
        echo "</table>";
    } 

}

