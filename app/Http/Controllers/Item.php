<?php

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Item extends BaseController
{
    public static function show_all_() {
        if (request('num1') != null) {
            $num1 = request('num1');
        } else $num1 = 10;
        if (request('num2') != null) {
            $num2 = request('num2');
        } else $num2 = 10;
        if (request('list-item-id') != null) {
            $q1 = Prodotto::all()->where('codice_rep', request('list-item-id'))->take($num1);
            return view("home")->with("page", "item-list")->with("q1", $q1);
        }
        elseif (request('list-item-name') != null) {
            $q1 = Prodotto::where('nome', 'LIKE', '%'.request('list-item-name').'%')->get()->take($num2);
            return view("home")->with("page", "item-list")->with("q1", $q1);
        }
        else {
            return redirect ("home/user");
        }   
    }

    public function getItemAdder() {
        return view("home")->with("page", "add_item");
    }

    public static function showHidden($id) {
        return( Prodotto::where('codice', $id)->first()->hidden);
    }

    public static function showHome($id) {
        return( Prodotto::where('codice', $id)->first()->home);
    }

    public static function updateStock($id, $stock) {
        $x = Prodotto::where('codice', $id)->first()->stock;
        $stock = $x+$stock;
        Prodotto::where('codice', $id)->update(["stock" => $stock]);
    }

    public static function delete($id) {
        $x = Prodotto::where('codice', $id)->delete('codice', $id);
    }

    public static function updateHome($id) {
        if (Item::showHome($id) == 1) {
            $x = Prodotto::where('codice', $id)->update(["home" => "0" ]);
        } else
        $x = Prodotto::where('codice', $id)->update(["home" => "1" ]);
    }

    public static function updateHidden($id) {
        if (Item::showHidden($id) == 1) {
            Prodotto::where('codice', $id)->update(["hidden" => "0" ]);
        } else
        Prodotto::where('codice', $id)->update(["hidden" => "1" ]);
        
    }

    public static function formManager() {
        if (request('update-stock') != null) {
            Item::updateStock(request('update-num'), request('update-stock'));
        }
        if (request('delete-item') != null) {
            Item::delete(request('delete-item'));
        }
        if (request('update-home') != null) {
            Item::updateHome(request('update-home'));
        }
        if (request('update-hidden') != null) {
            Item::updateHidden(request('update-hidden'));
        }
        return redirect ("home/user");
    }


    public static function item_add_(Request $request) {
        $file = $request->file('photo');
        $err = 0;
        if ($file->getSize() > 1984320) {
            return view("home")->with("page", "fail_item");
        }
        if (($file->getClientOriginalExtension() != "png") && ($file->getClientOriginalExtension() != "jpg")) {
            return view("home")->with("page", "fail_item");
        }
        if (file_exists("upload_img/".$file->getClientOriginalName())) {
            return view("home")->with("page", "fail_item");
        }
        $q = new Prodotto();
        $q->codice_rep = request('codice-rep');
        $q->image = $file->getClientOriginalName();
        $q->nome = request('name');
        $q->descrizione = request('desc');
        $q->prezzo = request('prezzo');
        $q->stock = request('stock');
        $q->codice_m = request('codice-m');
        $q->home = request('home');
        $q->hidden = request('hidden');
        $q->save();
        $file->move("upload_img/",$file->getClientOriginalName());
        return view("home")->with("page", "success_item");
    }

    public static function getMagazine() {
        $q = Magazzino::all();
        echo "<select required=\"\" class=\"input-box3\" name=\"codice-m\">";
        echo "<option value=\"\" disabled selected>Negozio</option>";
        foreach ($q as $x) {
            echo "<option value=".$x->sede.">".$x->sede."</option>";
        }
        echo "</select>";
    } 
        
}
