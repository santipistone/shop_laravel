<?php

use Illuminate\Routing\Controller as BaseController;

class Admin extends BaseController
{
    public static function isAdmin() {
        if (session("mark") != "worker")
            return header("Location: /home");
    }
    public static function getMansione() {
        Admin::isAdmin();
        $mansione = Dipendente::where('codice', session('id'))->first();
        return $mansione->mansione;
    }

    public static function getMoney() {
        Admin::isAdmin();
        $money = Dipendente::where('codice', session('id'))->first();
        return ceil($money->salario/12);
    }

    public static function OnOff() {
        Admin::isAdmin();
        Admin::lastDay(1);
        if (session('enter') === 1 && session('exit') === 0) {
            return True;
        } else
            return False;
    }

    public static function lastDay($stampa) {
        Admin::isAdmin();
        $q1 = Orario::all()->where('codice_c', session('id'))->sortBy('data')->reverse()->first();
        if ($q1) {
            if ($q1->o_fine == "00:00:00") {
                Session::put('enter', 1);
                Session::put('exit', 0);
                Session::put('o_inizio', $q1->o_inizio);
                Session::put('data', $q1->data);
            }
            else if ($q1->o_fine != "00:00:00") {
                Session::put('enter', 0);
                Session::put('exit', 1);
                Session::put('o_inizio', $q1->o_inizio);
                Session::put('data', $q1->data);
            }

            if ($stampa == 1) {
                echo "<p>Ultimo ingresso<br>Giorno : ".$q1->data."  Orario ingresso : ".$q1->o_inizio." Orario uscita : ".$q1->o_fine."</p>";

            }
        }
    }

    
    function newEnter() {
        Admin::isAdmin();
        $qx = Lavora::where('codice_c', session('id'))->first()->codice_n;
        if (isset($qx)) {
            $q1 = new Orario();
            $q1->codice_c = session('id');
            $q1->codice_n = $qx;
            $q1->o_inizio = Carbon\Carbon::now()->addHours(2)->toTimeString();
            $q1->o_fine = "0000:00:00";
            $q1->data = Carbon\Carbon::now()->addHours(2)->toDateString();
            $q1->save();
            Admin::lastDay(0);
            return redirect("home/admin");
        }   
     }

    function newExit() {
        Admin::isAdmin();
        $q1 = Orario::where('codice_c', session('id'))->update( ['o_fine' => Carbon\Carbon::now()->addHours(2)->toTimeString()]);
        Admin::lastDay(0);
        return redirect("home/admin");
    }

    public static function getOrderClient() {
        Admin::isAdmin();
        if (request('list-order-id') != null) {
            $q1 = Ordini::all()->where('codice_cliente', request('list-order-id'))->sortBy('data_')->reverse()->take(10);
            return view("home")->with("page", "list-order")->with("q1", $q1);
        }
        elseif (request('list-order-name') != null) {
            $cod = User::where('nome', 'LIKE', '%'.request('list-order-name').'%')->first()->id;
            $q1 = Ordini::all()->where('codice_cliente', '=' , $cod)->sortBy('data_')->reverse()->take(10);
            return view("home")->with("page", "list-order")->with("q1", $q1);
        }
    } 


}
