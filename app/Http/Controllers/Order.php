<?php

use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;

class Order extends BaseController
{
    

    public function ordina(Request $request) {
        if (session('id') == "") {
            return view("home")->with("page", "fail")->with("fail", "order"); 
        }
        for ($var=0; $var < $request->num; $var++) {
            $codice_cliente = session('id');  
            if ($request->stock != null) {
                $stock = $request->stock;
            } else {
                $stock = 1;
            }
            $q = new Ordini();
            $q->codice_neg = Prodotto::where("codice", $request->cod2[$var])->first()->magazzino()->first()->negozio()->first()->codice;
            $q->codice_prodotto = $request->cod2[$var];
            $q->codice_cliente = session('id');
            $q->stock = $stock;
            $y = Carbon\Carbon::now();
            $x = $y->addHours(2);
            $q->data_ = $x->toDateString();
            $q->orario = $x->toTimeString();
            $q->indirizzo_sped = $request->indirizzo;
            $q->cf = $request->cf;
            $q->spedito = "0";
            $q->save();
            $x = Prodotto::where('codice', $request->cod2[$var])->first()->stock;
            $stock = $x-$stock;
            Prodotto::where('codice', $request->cod2[$var])->update(["stock" => $stock]);
            if (!$q) {
                return view("home")->with("page", "fail")->with("fail", "order"); 
            }
        }
        return view("home")->with("page", "success")->with("success", "order");
    }

    public function showOrdini() {
        return view('home')->with('page', 'orders');
    }

    public function showOrdini2() {
        if (session('id') != null)
            return view("home")->with("page", "order/info");
        else 
            return view("home")->with("page", "fail")->with("fail", "order"); 
    }

    public function showAll() {
        return view("home")->with("page", "order");
    }
    
    



}
