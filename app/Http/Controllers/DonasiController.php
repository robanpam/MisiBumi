<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Donasi;
use App\Models\Kampanye;
use App\Models\Testimoni;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DonasiController extends Controller
{

    public function mainDonasi()
    {
        // Jumlah kampanye
        $total_kampanye = Kampanye::select(Kampanye::raw('count(id) as total_kampanye'))
            ->get();

        if ($total_kampanye->isEmpty()) {
            $kampanye = 0;
        } else {
            $kampanye = $total_kampanye[0]->total_kampanye;
        }

        // Total pohon
        $total_pohon = Kampanye::select(Kampanye::raw('sum(jumlah_pohon) as total_pohon'))
            ->get();

        if ($total_pohon->isEmpty()) {
            $pohon = 0;
        } else {
            $pohon = $total_pohon[0]->total_pohon;
        }

        // Donasi terkumpul
        $total_donasi = Donasi::select(Donasi::raw('sum(nilai_donasi) as total_donasi'))
            ->get();

        if ($total_donasi->isEmpty()) {
            $donasi = 0;
        } else {
            $donasi = $total_donasi[0]->total_donasi;
        }


        // Ambil data artikel
        $artikels = Artikel::inRandomOrder()->take(5)->get();

        // Format tanggal untuk setiap artikel
        foreach ($artikels as $artikel) {
            $artikel->formatted_created_at = Carbon::parse($artikel->created_at)->translatedFormat('j F Y');
        }

        $admins1 = User::where('jenis_user_id', 2)->get();


        $testimonis = Testimoni::all();


        // Kirim data artikel ke view
        return view('donasi.mainDampakDonasi', compact('artikels', 'admins1', 'kampanye', 'pohon', 'donasi', 'testimonis'));
    }
}
