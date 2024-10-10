<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Riwayat extends Controller
{
    public function index(){
        return view('views.riwayat');
    }
}
