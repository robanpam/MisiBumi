<?php

namespace App\Http\Controllers;

use App\Models\Kampanye;
use App\Models\Pohon;
use App\Models\Donasi;
use App\Models\User;
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

    //detail kampanye
    public function show($id)
    {
        $kampanye = Kampanye::join('pohons', 'kampanyes.pohon_id', '=', 'pohons.id')
            ->join('users', 'kampanyes.user_id', '=', 'users.id')
            ->leftJoin('donasis', 'kampanyes.id', '=', 'donasis.kampanye_id')
            ->select(
                'kampanyes.*',
                'pohons.nama as pohon_nama',
                'users.name as user_name',
                'donasis.nilai_donasi',
                'donasis.metode_pembayaran_id'
            )
            ->where('kampanyes.id', $id)
            ->firstOrFail();

        return view('kampanye.detailkampanye', compact('kampanye'));
    }

    public function terima($id)
    {
        $kampanye = Kampanye::find($id);
        if ($kampanye) {
            $kampanye->status = 1; // Change status to 'process'
            $kampanye->save();
        }
        return redirect()->route('kelolakampanye')->with('success', 'Kampanye diterima.');
    }

    public function tolak($id)
    {
        $kampanye = Kampanye::find($id);
        if ($kampanye) {
            $kampanye->status = 2; // Change status to 'reject'
            $kampanye->save();
        }
        return redirect()->route('kelolakampanye')->with('success', 'Kampanye ditolak.');
    }
}
