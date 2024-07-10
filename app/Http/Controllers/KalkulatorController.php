<?php

namespace App\Http\Controllers;
use App\Models\Kalkulator;
use App\Models\Emisi;

use Illuminate\Http\Request;

class KalkulatorController extends Controller
{
    public function index (){
        $jenis = Emisi::all();
        return view('kalkulator.kalkulator', compact('jenis'));
    }

    public function items ($jenis){
        // dd($jenis);
        $items = Kalkulator::join('emisis', 'emisis.id', '=', 'kalkulators.emisi_id')
                        ->where('emisis.nama', '=', $jenis)
                        ->get();

        // dd($items);
        return view('kalkulator.kalkulator_form', compact('jenis', 'items'));
    }
}
