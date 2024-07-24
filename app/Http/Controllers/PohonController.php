<?php

namespace App\Http\Controllers;

use App\Models\Kampanye;
use App\Models\Pohon;
use Illuminate\Http\Request;

class PohonController extends Controller
{
    public function show($id){
        $kampanyes = Kampanye::all();
        $pohon = Pohon::find($id);
        return view('pohon.pohon', compact('pohon', 'kampanyes'));
    }
}
