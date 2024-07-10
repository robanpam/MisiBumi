<?php

namespace App\Http\Controllers;
use App\Models\Kalkulator;
use App\Models\Emisi;

use Illuminate\Http\Request;

class KalkulatorController extends Controller
{
    public function items ($jenis){
        // dd($jenis);
        if($jenis == 'kendaraan'){
            $items = Kalkulator::join('emisis', 'emisis.id', '=', 'kalkulators.emisi_id')
                            ->where('emisis.id', '=', '1')
                            ->get();
        }

        // dd($item);
        return view('kalkulator.kalkulator_form', compact('jenis', 'items'));
    }
}
