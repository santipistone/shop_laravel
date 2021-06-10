<?php

use Illuminate\Routing\Controller as BaseController;

class Login extends BaseController
{
    public static function login() {
        if (session('id') != null) { 
            return view('logged'); 
        } else {
            return view('login')->with('csrf_token', csrf_token());
        }
    }

    public function checkLogin() {
        $user = User::where('email', request('email'))->first();
        if (isset($user)) {
            if(Hash::check(request('passw'), $user->password)) {
                Session::put('id', $user->id);
                Session::put('name',$user->nome);
                return view('home')->with('page', 'success')->with("success", "login");
            }else {
                return view('home')->with('page', 'fail')->with("fail", "login");
            }
        }else {
            return view('home')->with('page', 'fail')->with("fail", "login");
        }
    }

    public function logout() {
        Session::flush();
        return redirect('home');
    }
}
