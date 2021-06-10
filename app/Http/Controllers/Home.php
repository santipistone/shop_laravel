<?php

use Illuminate\Routing\Controller as BaseController;

class Home extends BaseController
{
    public function home($q = "") {
        return view('home');
    }

    public function music() {
        return view("home")->with("page", "music");
    }

}
