<?php

namespace App\Http\Controllers;

use App\Models\Kampanye;
use App\Models\Pohon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KampanyeController extends Controller
{
    public function index()
    {
        $kampanyes = Kampanye::whereIn('status', [0, 1, 2])
            ->join('pohons', 'kampanyes.pohon_id', '=', 'pohons.id')
            ->join('users', 'kampanyes.user_id', '=', 'users.id')
            ->select('kampanyes.*', 'pohons.nama as pohon_nama', 'users.name as user_name')
            ->get();

        return view('kampanye.mainKampanye', compact('kampanyes'));
    }

    // kelola kampanye
    public function kelola()
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

    // detail request kampanye (admin)
    public function showDetailRequestKampanye($id)
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

    // detail kampanye (user)
    public function showDetailKampanye($id)
    {
        $kampanye = Kampanye::join('pohons', 'kampanyes.pohon_id', '=', 'pohons.id')
            ->join('users', 'kampanyes.user_id', '=', 'users.id')
            ->leftJoin('donasis', 'kampanyes.id', '=', 'donasis.kampanye_id')
            ->select(
                'kampanyes.*',
                'pohons.nama as pohon_nama',
                'users.name as user_name',
                'donasis.nilai_donasi',
                'donasis.metode_pembayaran_id',
                'pohons.harga_pohon as pohon_harga'
            )
            ->where('kampanyes.id', $id)
            ->firstOrFail();

        return view('kampanye.detailkampanye2', compact('kampanye'));
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

    public function terimaSemua()
    {
        Kampanye::where('status', 3)->update(['status' => 1]); // Change status to 'process'
        return redirect()->route('kelolakampanye')->with('success', 'Semua kampanye diterima.');
    }

    public function tolakSemua()
    {
        Kampanye::where('status', 3)->update(['status' => 2]); // Change status to 'reject'
        return redirect()->route('kelolakampanye')->with('success', 'Semua kampanye ditolak.');
    }

    public function sendRequest()
    {
        $dataPohon = Pohon::all();
        return view('kampanye.send_request', compact('dataPohon'));
    }

    public function addRequest(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->back()->with('error', 'Tolong lakukan login sebelum mengajukan campaign.');
        }

        $request->validate([
            // 'first_name' => 'required|string|max:255',
            // 'last_name' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'jalan' => 'required|string|max:255',
            'kel' => 'required',
            'kec' => 'required',
            'kab_kota' => 'required',
            'provinsi' => 'required',
            'jenisPohon' => 'required',
            'jumlah' => 'required|integer',
            'batasDonasi' => 'required|date',
            'deskripsi' => 'required',
            'gambar' => 'required|mimes:jpg,png,jpeg|max:2048',
        ]);

        $lokasi = $request->input('jalan') .', Kel. '. $request->input('kel').', Kec. '. $request->input('kec').', '. $request->input('kab_kota').', '. $request->input('provinsi');

        $gambar = $request->file('gambar');
            $namaGambar = time().".".$gambar->getClientOriginalExtension();
            $pathGambarKampanye = Storage::disk('public')->putFileAs('asset/kampanye', $gambar, $namaGambar);


        $newKampanye = Kampanye::create([
            'user_id' => auth()->user()->id,
            'nama_kampanye' => $request->judul,
            'lokasi_kampanye' => $lokasi,
            'pohon_id' => $request->jenisPohon,
            'status' => 0,
            'jumlah_pohon' => $request->jumlah,
            // 'nominal' => $request->nominal,
            'batas_donasi' => $request->batasDonasi,
            'deskripsi' => $request->deskripsi,
            'gambar_kampanye' => $namaGambar,
            'total_donatur' => 0
        ]);

        return redirect()->route('kampanye.send_request')->with('success', 'Kampanye kamu berhasil diajukan!');
    }
}