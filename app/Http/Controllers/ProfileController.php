<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kampanye;
use App\Models\Donasi;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function history()
    {
        $kampanye_count = User::join('kampanyes', 'users.id', '=', 'kampanyes.user_id')
            ->select(Kampanye::raw('count(kampanyes.id) as kampanye_count'))
            ->groupBy('users.id')
            ->where('users.id', '=', auth()->user()->id)
            ->get();

        // dd($kampanye_count);
        if ($kampanye_count->isEmpty()) {
            $kcount = 0;
        } else {
            $kcount = $kampanye_count[0]->kampanye_count;
        }

        $donasi_count = User::join('donasis', 'users.id', '=', 'donasis.user_id')
            ->select(Donasi::raw('sum(nilai_donasi) as sum_donasi'))
            ->groupBy('users.id')
            ->where('users.id', '=', auth()->user()->id)
            ->get();

        if ($donasi_count->isEmpty()) {
            $dcount = 0;
        } else {
            $dcount = $donasi_count[0]->sum_donasi;
        }

        $pohon_count = User::join('kampanyes', 'users.id', '=', 'kampanyes.user_id')
            ->select(Kampanye::raw('sum(jumlah_pohon) as jumlah_pohon'))
            ->groupBy('users.id')
            ->where('users.id', '=', auth()->user()->id)
            ->get();

        if ($pohon_count->isEmpty()) {
            $pcount = 0;
        } else {
            $pcount = $pohon_count[0]->jumlah_pohon;
        }

        $dcount = formatNumber($dcount);
        $pcount = formatNumber($pcount);
        $kcount = formatNumber($kcount);

        // dd($pohon_count);
        $donasis = Kampanye::join('donasis', 'kampanyes.id', '=', 'donasis.kampanye_id')
            ->join('users', 'donasis.user_id', '=', 'users.id')
            ->join('metode_pembayarans', 'donasis.metode_pembayaran_id', '=', 'metode_pembayarans.id')
            ->where('users.id', '=', auth()->user()->id)
            ->select(['nama_kampanye', 'donasis.created_at', 'nilai_donasi', 'nama_metode'])
            ->paginate(10);
        // dd($donasis);
        return view('profile.profile_history', compact('kcount', 'dcount', 'pcount', 'donasis'));
    }

    public function kampanye()
    {
        $kampanye_count = User::join('kampanyes', 'users.id', '=', 'kampanyes.user_id')
            ->select(Kampanye::raw('count(kampanyes.id) as kampanye_count'))
            ->groupBy('users.id')
            ->where('users.id', '=', auth()->user()->id)
            ->get();

        // dd($kampanye_count);
        if ($kampanye_count->isEmpty()) {
            $kcount = 0;
        } else {
            $kcount = $kampanye_count[0]->kampanye_count;
        }

        $donasi_count = User::join('donasis', 'users.id', '=', 'donasis.user_id')
            ->select(Donasi::raw('sum(nilai_donasi) as sum_donasi'))
            ->groupBy('users.id')
            ->where('users.id', '=', auth()->user()->id)
            ->get();

        if ($donasi_count->isEmpty()) {
            $dcount = 0;
        } else {
            $dcount = $donasi_count[0]->sum_donasi;
        }

        $pohon_count = User::join('kampanyes', 'users.id', '=', 'kampanyes.user_id')
            ->select(Kampanye::raw('sum(jumlah_pohon) as jumlah_pohon'))
            ->groupBy('users.id')
            ->where('users.id', '=', auth()->user()->id)
            ->get();

        if ($pohon_count->isEmpty()) {
            $pcount = 0;
        } else {
            $pcount = $pohon_count[0]->jumlah_pohon;
        }
        // dd($pohon_count);

        // $kampanye_pending = Kampanye::select('*')
        //                         ->where('kampanyes.status', '=', 3)
        //                         ->where('kampanyes.user_id', '=', auth()->user()->id)
        //                         ->get();

        // $kampanye_rejected = Kampanye::select('*')
        //                         ->where('kampanyes.status', '=', 2)
        //                         ->where('kampanyes.user_id', '=', auth()->user()->id)
        //                         ->get();

        // $kampanye_progres = Kampanye::select('*')
        //                         ->where('kampanyes.status', '=', 1)
        //                         ->where('kampanyes.user_id', '=', auth()->user()->id)
        //                         ->get();

        // $kampanye_complete = Kampanye::select('*')
        //                         ->where('kampanyes.status', '=', 0)
        //                         ->where('kampanyes.user_id', '=', auth()->user()->id)
        //                         ->get();

        $kampanyes = Kampanye::select('*')->where('kampanyes.user_id', '=', auth()->user()->id)->paginate(10);
        $dcount = formatNumber($dcount);
        $pcount = formatNumber($pcount);
        $kcount = formatNumber($kcount);

        return view('profile.profile_kampanye', compact('kcount', 'dcount', 'pcount', 'kampanyes'));
    }

    public function pengaturan()
    {
        $kampanye_count = User::join('kampanyes', 'users.id', '=', 'kampanyes.user_id')
            ->select(Kampanye::raw('count(kampanyes.id) as kampanye_count'))
            ->groupBy('users.id')
            ->where('users.id', '=', auth()->user()->id)
            ->get();

        // dd($kampanye_count);
        if ($kampanye_count->isEmpty()) {
            $kcount = 0;
        } else {
            $kcount = $kampanye_count[0]->kampanye_count;
        }

        $donasi_count = User::join('donasis', 'users.id', '=', 'donasis.user_id')
            ->select(Donasi::raw('sum(nilai_donasi) as sum_donasi'))
            ->groupBy('users.id')
            ->where('users.id', '=', auth()->user()->id)
            ->get();

        if ($donasi_count->isEmpty()) {
            $dcount = 0;
        } else {
            $dcount = $donasi_count[0]->sum_donasi;
        }

        $pohon_count = User::join('kampanyes', 'users.id', '=', 'kampanyes.user_id')
            ->select(Kampanye::raw('sum(jumlah_pohon) as jumlah_pohon'))
            ->groupBy('users.id')
            ->where('users.id', '=', auth()->user()->id)
            ->get();

        if ($pohon_count->isEmpty()) {
            $pcount = 0;
        } else {
            $pcount = $pohon_count[0]->jumlah_pohon;
        }

        $dcount = formatNumber($dcount);
        $pcount = formatNumber($pcount);
        $kcount = formatNumber($kcount);
        // dd($pohon_count);

        return view('profile.profile_pengaturan', compact('kcount', 'dcount', 'pcount'));
    }

    public function update(Request $request)
    {

        $user = auth()->user();

        $request->session()->flash('name', $request->name);
        $request->session()->flash('email', $request->email);
        $request->session()->flash('nomor_telepon', $request->nomor_telepon);

        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'nomor_telepon' => 'required|numeric',
        ];

        $messages = [
            'email.required' => 'Isi field dengan email yang benar',
            'email.unique' => 'Isi field dengan email yang belum digunakan',
            'required' => 'Field harus diisi',
            'numeric' => 'Isi field dengan nomor telepon yang benar',
        ];

        // $user->update($request->validate($rules, $messages));
        $request->validate($rules, $messages);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->nomor_telepon = $request->nomor_telepon;
        $user->save();
        // dd($user);

        return redirect()->back()->with('success', 'Profile berhasil diupdate');
    }

    public function foto(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = auth()->user();

        // Handle the file upload
        if ($request->hasFile('profile_picture')) {
            // Get the file
            $file = $request->file('profile_picture');

            // Define the file name and path
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $filePath = 'profile_pictures/' . $fileName;
            // dd($fileName);
            // Store the file
            Storage::disk('public')->put($filePath, file_get_contents($file));

            // Save the file path to the user's profile
            $user->profile_photo = $fileName;
            $user->save();

            return back()->with('success', 'Profile picture updated successfully.');
        }

        return back()->with('error', 'Failed to upload profile picture.');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('beranda.landingPage');
    }
}
