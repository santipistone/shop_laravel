<?php

use Illuminate\Routing\Controller as BaseController;

class Reg extends BaseController
{
    

    public function Registra() {
        if ($this->checkEmail(request('mail')) == False) {
            $acc = new User();
            $acc->nome = request('name');
            $acc->email = request('mail');
            $acc->password = Hash::make(request('passw'));
            $acc->indirizzo = request('ind');
            $acc->data = request('data');
            $acc->save();
            if ($acc) {
                return view('home')->with('page', 'success')->with("success", "reg");
            } else
                return view('home')->with('page', 'error')->with("error", "reg");
        } else

        return view('home')->with('page', 'error')->with("error", "reg");
    }

    public function checkEmail($email) {
        $user = User::where('email', $email)->first();
        if (isset($user)) {
            return True;
        } return False;
    }

    public static function showReg() {
        return view('reg')->with('csrf_token', csrf_token());
    }


}
