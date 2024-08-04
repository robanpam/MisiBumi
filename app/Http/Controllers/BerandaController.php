<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Donasi;
use App\Models\Kampanye;
use Illuminate\Support\Facades\DB;
use App\Models\Pohon;

class BerandaController extends Controller
{
    public function show()
    {
        $total_donasi = Donasi::select(Donasi::raw('sum(nilai_donasi) as total_donasi'))
            ->where('status', '=', '1')
            ->get();

        if ($total_donasi->isEmpty()) {
            $donasi = 0;
        } else {
            $donasi = $total_donasi[0]->total_donasi;
        }

        $donasi = formatNumber($donasi);

        $total_kampanye = Kampanye::select(Kampanye::raw('count(id) as total_kampanye'))
            ->get();

        if ($total_kampanye->isEmpty()) {
            $kampanye = 0;
        } else {
            $kampanye = $total_kampanye[0]->total_kampanye;
        }

        $kampanye = formatNumber($kampanye);

        $total_pohon = Kampanye::where('status', 0)
            ->select(Kampanye::raw('sum(jumlah_pohon) as total_pohon'))
            ->get();

        if ($total_pohon->isEmpty()) {
            $pohon = 0;
        } else {
            $pohon = $total_pohon[0]->total_pohon;
        }

        $pohon = formatNumber($pohon);

        $emisi = Kampanye::join('pohons', 'pohons.id', '=', 'kampanyes.pohon_id')
                ->select('kampanyes.status' , DB::raw('sum(jumlah_pohon * serapan_karbon * ABS(DATEDIFF(kampanyes.updated_at, CURDATE()))) as Serapan'))
                ->where('kampanyes.status', '=', 0)
                ->groupBy('kampanyes.status')
                ->get();
        
        // $cekdiff = Kampanye::select(DB::raw('DATEDIFF(updated_at, CURDATE()) as sum'))
        //     ->where('kampanyes.status', 0)
        //     ->get();

        // dd($cekdiff[2]->sum);

        if ($emisi->isEmpty()){
            $emisi = 0;
        } else{
            $emisi = formatEmission($emisi[0]->Serapan);
        }
        
        $kampanyes = Kampanye::all();
        // $kampanyes = Kampanye::join('donasis', 'kampanyes.id', '=', 'donasi')

        return view('beranda', compact('pohon', 'donasi', 'kampanye','emisi', 'kampanyes'));
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

        $donasi = formatNumber($donasi);

        $total_kampanye = Kampanye::select(Kampanye::raw('count(id) as total_kampanye'))
            ->get();

        if ($total_kampanye->isEmpty()) {
            $kampanye = 0;
        } else {
            $kampanye = $total_kampanye[0]->total_kampanye;
        }

        $kampanye = formatNumber($kampanye);

        $total_pohon = Kampanye::select(Kampanye::raw('sum(jumlah_pohon) as total_pohon'))
            ->get();

        $total_pohon = Kampanye::where('status', 0)
            ->select(Kampanye::raw('sum(jumlah_pohon) as total_pohon'))
            ->get();

        if ($total_pohon->isEmpty()) {
            $pohon = 0;
        } else {
            $pohon = $total_pohon[0]->total_pohon;
        }

        $pohon = formatNumber($pohon);

        return view('landing_page', compact('pohon', 'donasi', 'kampanye'));
    }

    public function leaderboard(){
        $leader = Donasi::join('users', 'donasis.user_id', '=', 'users.id')
                    ->select('users.name', DB::raw('sum(donasis.nilai_donasi) as donasi'))
                    ->groupBy('users.name')
                    ->orderBy('donasi', 'desc')
                    ->get();
        
        return view('leaderboard', compact('leader'));
    }
}
