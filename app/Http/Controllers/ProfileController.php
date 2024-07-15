<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function history(){
        return view('profile.profile_history');
    }

    public function kampanye(){
        return view('profile.profile_kampanye');
    }

    public function pengaturan(){
        return view('profile.profile_pengaturan');
    }

    public function update(Request $request){

        $request->session()->flash('name', $request->name);
        $request->session()->flash('email', $request->email);
        $request->session()->flash('nomor_telepon', $request->nomor_telepon);

        $rules = [
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'nomor_telepon' => 'required|numeric',
        ];

        $messages = [
            'email' => 'Isi field dengan email yang benar',
            'unique' => 'Isi field dengan email yang belum digunakan',
            'required' => 'Field harus diisi',
            'numeric' => 'Isi field dengan nomor telepon yang benar',
        ];

        $validator = $request->validate($rules, $messages);

        auth()->user()->update($request->all());

        return redirect()->back()->with('success', 'Profile berhasil diupdate');
    }
}
