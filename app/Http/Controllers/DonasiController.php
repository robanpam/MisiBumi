<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Donasi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DonasiController extends Controller
{

    public function mainDonasi()
    {
        // Ambil data artikel
        $artikels = Artikel::take(5)->get();

        // Format tanggal untuk setiap artikel
        foreach ($artikels as $artikel) {
            $artikel->formatted_created_at = Carbon::parse($artikel->created_at)->translatedFormat('j F Y');
        }

        $admins1 = User::where('jenis_user_id', 2)->get();

        // Kirim data artikel ke view
        return view('donasi.mainDampakDonasi', compact('artikels', 'admins1'));
    }
}
