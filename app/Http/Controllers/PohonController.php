<?php

namespace App\Http\Controllers;

use App\Models\Kampanye;
use App\Models\Pohon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PohonController extends Controller
{
    public function show($id){
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
        $pohon = Pohon::find($id);
        return view('pohon.pohon', compact('pohon', 'kampanyes'));
    }
}
