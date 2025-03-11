<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalisisKeuanganController extends Controller
{
    public function index(){
        return view('/menus/analisiskeuangan');
    }
}
