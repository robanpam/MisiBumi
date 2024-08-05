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

        if ($emisi->isEmpty()){
            $emisi = 0;
        } else{
            $emisi = formatEmission($emisi[0]->Serapan);
        }
        
        $kampanyes = Kampanye::whereIn('kampanyes.status', [0, 1, 2])
            ->join('pohons', 'kampanyes.pohon_id', '=', 'pohons.id')
            ->join('users', 'kampanyes.user_id', '=', 'users.id')
            ->leftJoin('donasis', 'kampanyes.id', '=', 'donasis.kampanye_id')
            ->select(
                'kampanyes.id',
                'kampanyes.user_id',
                'kampanyes.pohon_id',
                'kampanyes.status',
                'kampanyes.jumlah_pohon',
                'kampanyes.nama_kampanye',
                'kampanyes.gambar_kampanye',
                'kampanyes.lokasi_kampanye',
                'kampanyes.deskripsi',
                'kampanyes.created_at',
                'kampanyes.updated_at',
                'pohons.nama as pohon_nama',
                'users.name as user_name',
                'pohons.harga_pohon as harga_pohon',
                DB::raw('ROUND(IFNULL(SUM(donasis.nilai_donasi), 0) / IF(pohons.harga_pohon > 0, pohons.harga_pohon, 1)) as pohon_terkumpul'),
                DB::raw('ROUND(LEAST(100, (IFNULL(SUM(donasis.nilai_donasi), 0) / IF(pohons.harga_pohon > 0, pohons.harga_pohon, 1)) / kampanyes.jumlah_pohon * 100)) as persentase_terkumpul')
            )
            ->groupBy(
                'kampanyes.id',
                'kampanyes.user_id',
                'kampanyes.pohon_id',
                'kampanyes.status',
                'kampanyes.jumlah_pohon',
                'kampanyes.nama_kampanye',
                'kampanyes.gambar_kampanye',
                'kampanyes.lokasi_kampanye',
                'kampanyes.deskripsi',
                'kampanyes.created_at',
                'kampanyes.updated_at',
                'pohons.nama',
                'users.name',
                'pohons.harga_pohon'
            )
            ->inRandomOrder()
            ->get();

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

        $emisi = Kampanye::join('pohons', 'pohons.id', '=', 'kampanyes.pohon_id')
                ->select('kampanyes.status' , DB::raw('sum(jumlah_pohon * serapan_karbon * ABS(DATEDIFF(kampanyes.updated_at, CURDATE()))) as Serapan'))
                ->where('kampanyes.status', '=', 0)
                ->groupBy('kampanyes.status')
                ->get();

        if ($emisi->isEmpty()){
            $emisi = 0;
        } else{
            $emisi = formatEmission($emisi[0]->Serapan);
        }

        $pohon = formatNumber($pohon);

        return view('landing_page', compact('pohon', 'donasi', 'kampanye', 'emisi'));
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
