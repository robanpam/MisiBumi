<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class SessionController extends Controller
{
    public function init(){
        return view('sign.sign');
    }

    public function login(Request $request){
        $request->session()->flash('email', $request->email);
        $request->session()->flash('form', 'login');

        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $messages = [
            'email' => 'Isi field dengan email yang benar',
            'required' => 'Field harus diisi',
        ];

        $request->validate($rules, $messages);

        if(auth()->attempt($request->only(['email', 'password']))){
            $user = auth()->user();
            
            if($user->jenis_user_id == 1){
                return redirect()->route('beranda.show');
            }
        }

        return redirect()->back()->withErrors([
            'credentials' => 'Please input the correct email or password',
        ]);
    }

    public function register(Request $request){
        $request->session()->flash('email', $request->email);
        $request->session()->flash('nama', $request->nama);
        $request->session()->flash('phone', $request->phone);
        $request->session()->flash('form', 'register'); 

        $rules = [
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric',
            'password' => 'required|min:8|confirmed',
        ];

        $messages = [
            'email' => 'Isi field dengan email yang benar',
            'unique' => 'Isi field dengan email yang belum digunakan',
            'required' => 'Field harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Ketikkan ulang password anda',
            'numeric' => 'Isi field dengan nomor telepon yang benar',
        ];

        $request->validate($rules, $messages);

        $user = new User;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->nomor_telepon = $request->phone;
        $user->password = Hash::make($request->password);
        $user->profile_photo = 'tes.png';
        $user->jenis_user_id = 1;
        $user->remember_token = Str::random(10);
        $user->email_verified_at = now();

        $user->save();


        auth()->login($user);
            
        if($user->jenis_user_id == 1){
            return redirect()->route('beranda.show');
        }

        return redirect()->back()->withErrors([
            'credentials' => 'Please input the correct email or password',
        ]);
    }

    public function showPasswordResetForm () {
        return view('sign.passwordreset');
    }

    public function passwordReset (Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan di dalam database kami.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('session.init')->with('status', 'Password berhasil diubah.');
    }
}