<?php

namespace App\Http\Controllers;

use App\Models\Kampanye;
use Illuminate\Http\Request;

class KampanyeController extends Controller
{
    //kelola kampanye
    public function index()
    {
        $kampanyes = Kampanye::whereIn('status', [0, 1, 2])
            ->join('pohons', 'kampanyes.pohon_id', '=', 'pohons.id')
            ->join('users', 'kampanyes.user_id', '=', 'users.id')
            ->select('kampanyes.*', 'pohons.nama as pohon_nama', 'users.name as user_name')
            ->get();

        return view('kampanye.kelolakampanye', compact('kampanyes'));
    }

    //request kampanye
    public function fetchPendingKampanyes()
    {
        $pendingKampanyes = Kampanye::where('status', 3)
            ->join('pohons', 'kampanyes.pohon_id', '=', 'pohons.id')
            ->join('users', 'kampanyes.user_id', '=', 'users.id')
            ->select('kampanyes.*', 'pohons.nama as pohon_nama', 'users.name as user_name')
            ->get();

        return response()->json($pendingKampanyes);
    }
}
