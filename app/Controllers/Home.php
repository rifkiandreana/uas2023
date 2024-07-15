<?php

namespace App\Controllers;

class Home extends BaseController
{

    public function homepage(){
        return view('home');
    }
}
