<?php

namespace App\Http\Controllers;

use App\Models\Kampanye;
use App\Models\Pohon;
use App\Models\Donasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class KampanyeController extends Controller
{
    public function index()
    {
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

        return view('kampanye.mainKampanye', compact('kampanyes'));
    }

    public function blmSelesai()
    {
        $kampanyes = Kampanye::where('kampanyes.status', 1)
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
            ->paginate(12);

        return view('kampanye.blmSelesaiKampanye', compact('kampanyes'));
    }

    public function udhSelesai()
    {
        $kampanyes = Kampanye::where('kampanyes.status', 0)
            ->join('pohons', 'kampanyes.pohon_id', '=', 'pohons.id')
            ->join('users', 'kampanyes.user_id', '=', 'users.id')
            ->leftJoin('donasis', 'kampanyes.id', '=', 'donasis.kampanye_id')
            ->select(
                'kampanyes.*',
                'pohons.nama as pohon_nama',
                'users.name as user_name',
                'pohons.harga_pohon as harga_pohon',
                'donasis.nilai_donasi',
                'donasis.metode_pembayaran_id',
                DB::raw('ROUND(IFNULL(SUM(donasis.nilai_donasi), 0) / IF(pohons.harga_pohon > 0, pohons.harga_pohon, 1)) as pohon_terkumpul'),
                DB::raw('ROUND(LEAST(100, (IFNULL(SUM(donasis.nilai_donasi), 0) / IF(pohons.harga_pohon > 0, pohons.harga_pohon, 1)) / kampanyes.jumlah_pohon * 100)) as persentase_terkumpul')
            )
            ->inRandomOrder()
            ->groupBy('kampanyes.id', 'pohons.id', 'users.id', 'donasis.nilai_donasi', 'donasis.metode_pembayaran_id', 'pohons.harga_pohon')
            ->paginate(12);

        return view('kampanye.telahSelesaiKampanye', compact('kampanyes'));
    }

    // Kelola kampanye
    public function kelola()
    {
        $kampanyes = Kampanye::whereIn('kampanyes.status', [0, 1, 2])
            ->join('pohons', 'kampanyes.pohon_id', '=', 'pohons.id')
            ->join('users', 'kampanyes.user_id', '=', 'users.id')
            ->select('kampanyes.*', 'pohons.nama as pohon_nama', 'users.name as user_name')
            ->orderBy('status', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('kampanye.kelolakampanye', compact('kampanyes'));
    }

    // Request kampanye
    public function fetchPendingKampanyes()
    {
        $pendingKampanyes = Kampanye::where('kampanyes.status', 3)
            ->join('pohons', 'kampanyes.pohon_id', '=', 'pohons.id')
            ->join('users', 'kampanyes.user_id', '=', 'users.id')
            ->select('kampanyes.*', 'pohons.nama as pohon_nama', 'users.name as user_name')
            ->get();

        return response()->json($pendingKampanyes);
    }

    // Detail request kampanye (admin)
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

    // Detail kampanye (user)
    public function showDetailKampanye($id)
    {
        $kampanye = Kampanye::join('pohons', 'kampanyes.pohon_id', '=', 'pohons.id')
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
            ->with(['user', 'donasis.user'])
            ->where('kampanyes.id', $id)
            ->firstOrFail();

        $startYear = $kampanye->created_at->format('Y');
        $endYear = 2024;
        $donasiTahunan = [];

        foreach (range($startYear, $endYear) as $year) {
            $donasiTahunan[$year] = Donasi::select(DB::raw('YEAR(created_at) as tahun'), DB::raw('MONTH(created_at) as bulan'), DB::raw('sum(nilai_donasi) as total_donasi'))
                ->whereYear('created_at', '=', $year)
                ->where('donasis.kampanye_id', '=', $kampanye->id)
                ->groupBy('tahun', 'bulan')
                ->get();
        }

        return view('kampanye.detailkampanye2', compact('kampanye', 'donasiTahunan', 'startYear', 'endYear'));
    }

    public function terima($id)
    {
        $kampanye = Kampanye::find($id);
        if ($kampanye) {
            $kampanye->status = 1;
            $kampanye->save();
        }
        return redirect()->route('kelolakampanye')->with('success', 'Kampanye diterima.');
    }

    public function tolak($id)
    {
        $kampanye = Kampanye::find($id);
        if ($kampanye) {
            $kampanye->status = 2;
            $kampanye->save();
        }
        return redirect()->route('kelolakampanye')->with('success', 'Kampanye ditolak.');
    }

    public function terimaSemua()
    {
        Kampanye::where('kampanyes.status', 3)
            ->update(['status' => 1]);
        return redirect()->route('kelolakampanye')->with('success', 'Semua kampanye diterima.');
    }

    public function tolakSemua()
    {
        Kampanye::where('kampanyes.status', 3)
            ->update(['status' => 2]);
        return redirect()->route('kelolakampanye')->with('success', 'Semua kampanye ditolak.');
    }

    public function sendRequest()
    {
        $dataPohon = Pohon::all();
        return view('kampanye.send_request', compact('dataPohon'));
    }

    public function addRequest(Request $request)
    {
        $rules = [
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
        ];

        $messages = [
            'required' => 'Field harus diisi',
            'judul.max' => 'Judul tidak boleh melebihi 255 karakter',
            'jalan.max' => 'Judul tidak boleh melebihi 255 karakter',
            'gambar.mimes' => 'Extension gambar harus berupa jpg, png, atau jpeg',
            'gambar.max' => 'Maksimal ukuran gambar adalah 2 MB',
        ];

        $request->validate($rules, $messages);

        if (!auth()->check()) {
            return redirect()->back()->with('error', 'Tolong lakukan login sebelum mengajukan campaign.');
        }

        $lokasi = $request->input('jalan') . ', Kel. ' . $request->input('kel') . ', Kec. ' . $request->input('kec') . ', ' . $request->input('kab_kota') . ', ' . $request->input('provinsi');

        $gambar = $request->file('gambar');
        $namaGambar = time() . "." . $gambar->getClientOriginalExtension();
        $pathGambarKampanye = Storage::disk('public')->putFileAs('kampanye', $gambar, $namaGambar);

        Kampanye::create([
            'user_id' => auth()->user()->id,
            'nama_kampanye' => $request->judul,
            'lokasi_kampanye' => $lokasi,
            'pohon_id' => $request->jenisPohon,
            'status' => 3,
            'jumlah_pohon' => $request->jumlah,
            'batas_donasi' => $request->batasDonasi,
            'deskripsi' => $request->deskripsi,
            'gambar_kampanye' => $namaGambar,
        ]);

        return redirect()->route('kampanye.request')->with('success', 'Kampanye kamu berhasil diajukan!');
    }
}
