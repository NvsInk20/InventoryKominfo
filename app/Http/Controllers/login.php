<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class login extends Controller
{
    public function index(){
        return view('Login.index' , [
            'title' => 'login',
            'active' => 'login'
        ]);
    }
}
