<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class SessionController extends Controller
{
    public function init() {
        return view('sign.sign');
    }

    public function login(Request $request) {
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

        if (auth()->attempt($request->only(['email', 'password']))) {
            $user = auth()->user();

            if ($user->jenis_user_id == 1) {
                return redirect()->route('beranda.show');
            }
        }

        return redirect()->back()->withErrors([
            'credentials' => 'Please input the correct email or password',
        ]);
    }

    public function register(Request $request) {
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

        if ($user->jenis_user_id == 1) {
            return redirect()->route('beranda.show');
        } else if($user->jenis_user_id == 2){
            return redirect()->route('dashboard.show');
        }

        return redirect()->back()->withErrors([
            'credentials' => 'Please input the correct email or password',
        ]);
    }

    public function showPasswordResetRequestForm() {
        return view('sign.passwordreset_request');
    }

    public function sendPasswordResetLink(Request $request) {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan di dalam database kami.']);
        }

        $token = Str::random(60);
        $user->remember_token = $token;
        $user->token_expires_at = Carbon::now()->addMinutes(30);
        $user->save();

        $link = url('/passwordreset/' . $token . '?email=' . urlencode($user->email));

        Mail::send('sign.passwordreset_email', ['link' => $link], function($message) use ($user) {
            $message->to($user->email);
            $message->subject('Password Reset Request');
        });

        return back()->with('status', 'Link reset password telah dikirim ke email Anda.');
    }

    public function showPasswordResetFormWithToken($token, Request $request) {
        $email = $request->query('email');

        return view('sign.passwordreset', ['token' => $token, 'email' => $email]);
    }

    public function passwordReset(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed'
        ]);

        $user = User::where('email', $request->email)
            ->where('remember_token', $request->token)
            ->first();

        if (!$user || $user->token_expires_at->isPast()) {
            return back()->withErrors(['email' => 'Token tidak valid atau telah kedaluwarsa.']);
        }

        $user->password = Hash::make($request->password);
        $user->remember_token = null;
        $user->token_expires_at = null;
        $user->save();

        return redirect()->route('session.init')->with('status', 'Password berhasil diubah.');
    }
}