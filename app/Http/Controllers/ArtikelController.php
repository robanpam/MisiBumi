<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\User;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    //kelola artikel 
    public function kelolaartikel()
    {
        $item = Artikel::join('users', 'artikels.admin_id', '=', 'users.id')
            ->select('artikels.*', 'users.name')
            ->get();

        // dd($item);
        return view('artikel.kelolaartikel', compact('item'));
    }

    //upload artikel
    public function showUploadForm()
    {
        $admins = User::where('jenis_user_id', 2)->get(); // Assuming jenis_user_id 2 is for admins
        return view('artikel.uploadartikel', compact('admins'));
    }
    public function store(Request $request)
    {
        // $request->validate([
        //     'judul' => 'required|string|max:255',
        //     'isiartikel' => 'required|string',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'admin_id' => 'required|exists:users,id',
        // ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('asset/artikel'), $imageName);

        $artikel = new Artikel();
        $artikel->judul_artikel = $request->input('judul');
        $artikel->isi_artikel = $request->input('isiartikel');
        $artikel->admin_id = $request->input('admin_id');
        $artikel->gambar_artikel = $imageName;
        $artikel->save();

        return redirect()->route('kelolaartikel')->with('success', 'Artikel uploaded successfully.');
    }


    //edit artikel
    public function edit($id)
    {
        $artikel = Artikel::find($id);
        $admins = User::where('jenis_user_id', 2)->get(); // Assuming jenis_user_id 2 is for admins

        if (!$artikel) {
            return redirect()->route('kelolaartikel')->with('error', 'Artikel not found.');
        }

        return view('editartikel', compact('artikel', 'admins'));
    }

    public function update(Request $request, $id)
    {
        $artikel = Artikel::find($id);

        if (!$artikel) {
            return redirect()->route('kelolaartikel')->with('error', 'Artikel not found.');
        }

        // $request->validate([
        //     'judul' => 'required|string|max:255',
        //     'isiartikel' => 'required|string',
        //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'admin_id' => 'required|exists:users,id',
        // ]);

        $artikel->judul_artikel = $request->input('judul');
        $artikel->isi_artikel = $request->input('isiartikel');
        $artikel->admin_id = $request->input('admin_id');

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('asset/artikel'), $imageName);
            $artikel->gambar_artikel = $imageName;
        }

        $artikel->save();

        return redirect()->route('kelolaartikel')->with('success', 'Artikel updated successfully.');
    }

    //delete artikel
    public function destroy($id)
    {
        $artikel = Artikel::find($id);

        if (!$artikel) {
            return redirect()->route('kelolaartikel')->with('error', 'Artikel not found.');
        }

        $artikel->delete();

        return redirect()->route('kelolaartikel')->with('success', 'Artikel deleted successfully.');
    }
}
