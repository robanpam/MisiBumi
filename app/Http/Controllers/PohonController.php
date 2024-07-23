<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PohonController extends Controller
{
    public function show(){
        return view('pohon.pohon');
    }
}
