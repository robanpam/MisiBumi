<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Donasi;
use App\Models\Kampanye;
use App\Models\Pohon;

class BerandaController extends Controller
{
    public function show()
    {
        $kampanyes = Kampanye::all();
        $total_donasi = Donasi::select(Donasi::raw('sum(nilai_donasi) as total_donasi'))
            ->get();

        if ($total_donasi->isEmpty()) {
            $donasi = 0;
        } else {
            $donasi = $total_donasi[0]->total_donasi;
        }

        $total_kampanye = Kampanye::select(Kampanye::raw('count(id) as total_kampanye'))
            ->get();

        if ($total_kampanye->isEmpty()) {
            $kampanye = 0;
        } else {
            $kampanye = $total_kampanye[0]->total_kampanye;
        }

        $total_pohon = Kampanye::select(Kampanye::raw('sum(jumlah_pohon) as total_pohon'))
            ->get();

        if ($total_pohon->isEmpty()) {
            $pohon = 0;
        } else {
            $pohon = $total_pohon[0]->total_pohon;
        }

        // dd($total_kampanye);

        return view('beranda', compact('pohon', 'donasi', 'kampanye', 'kampanyes'));
    }

    public function landingPage()
    {

        $total_donasi = Donasi::select(Donasi::raw('sum(nilai_donasi) as total_donasi'))
            ->get();

        if ($total_donasi->isEmpty()) {
            $donasi = 0;
        } else {
            $donasi = $total_donasi[0]->total_donasi;
        }

        $total_kampanye = Kampanye::select(Kampanye::raw('count(id) as total_kampanye'))
            ->get();

        if ($total_kampanye->isEmpty()) {
            $kampanye = 0;
        } else {
            $kampanye = $total_kampanye[0]->total_kampanye;
        }

        $total_pohon = Kampanye::select(Kampanye::raw('sum(jumlah_pohon) as total_pohon'))
            ->get();

        if ($total_pohon->isEmpty()) {
            $pohon = 0;
        } else {
            $pohon = $total_pohon[0]->total_pohon;
        }

        return view('landing_page', compact('pohon', 'donasi', 'kampanye'));
    }
}