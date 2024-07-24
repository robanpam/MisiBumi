<?php

namespace App\Http\Controllers;

use App\Models\Pohon;
use Illuminate\Http\Request;

class PohonController extends Controller
{
    public function show($id){
        $pohon = Pohon::find($id);
        return view('pohon.pohon', compact('pohon'));
    }
}
