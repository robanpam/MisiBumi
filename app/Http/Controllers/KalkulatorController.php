<?php

namespace App\Http\Controllers;
use App\Http\Requests\KalkulatorRequest;
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

    public function result (KalkulatorRequest $request){
        $request->validated();

        $item = Kalkulator::find($request->option);
        $jenises = Emisi::all();
        $jenis = $jenises->where('id', '=', 'item->emisi_id');

        $emisi = $item->faktor_emisi * $request->frekuensi * $request->jarak;
        $frekuensi = $request->frekuensi;
        $jarak = $request->jarak;
        // dd($emisi);

        return view('kalkulator.kalkulator_hasil', compact('item', 'emisi', 'jarak', 'frekuensi', 'jenis'));
    }
}
