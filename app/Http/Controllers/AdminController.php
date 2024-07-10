<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function admin($id)
    {
        $item = User::select('*')
            ->where('jenis_user_id', '=', '2')
            ->where('id', '=', $id)
            ->get();

        // dd($item);

        return view('admin.profiladmin', compact('item'));
    }


    //update nama
    public function gantinama($id)
    {
        $user = User::where('jenis_user_id', '=', '2')
            ->where('id', '=', $id)
            ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        return view('admin.gantiganti.gantinama', compact('user'));
    }

    public function updateNama(Request $request, $id)
    {
        $user = User::where('jenis_user_id', '=', '2')
            ->where('id', '=', $id)
            ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        $user->name = $request->input('gantiUname');
        $user->save();

        return redirect()->back()->with('success', 'Nama updated successfully.');
    }

    //update password
    public function showChangePasswordForm($id)
    {
        $user = User::where('jenis_user_id', '=', '2')
            ->where('id', '=', $id)
            ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        return view('admin.gantiganti.gantisandi', compact('user'));
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::where('jenis_user_id', '=', '2')
            ->where('id', '=', $id)
            ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }



        $user->password = $request->input('password');
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully.');
    }

    //update email
    public function showChangeEmailForm($id)
    {
        $user = User::where('jenis_user_id', '=', '2')
            ->where('id', '=', $id)
            ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        return view('admin.gantiganti.gantiemail', compact('user'));
    }

    public function updateEmail(Request $request, $id)
    {
        $user = User::where('jenis_user_id', '=', '2')
            ->where('id', '=', $id)
            ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // $request->validate([
        //     'Email' => 'required|email|max:255',
        //     'password_confirmation' => 'required|string', // Add validation for password confirmation if needed
        // ]);

        // Optional: Add logic to check if the provided password matches the user's current password
        // if (!Hash::check($request->input('password_confirmation'), $user->password)) {
        //     return redirect()->back()->with('error', 'Current password is incorrect.');
        // }

        $user->email = $request->input('Email');
        $user->save();

        return redirect()->back()->with('success', 'Email updated successfully.');
    }

    //update telpon
    public function showChangeTelponForm($id)
    {
        $user = User::where('jenis_user_id', '=', '2')
            ->where('id', '=', $id)
            ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        return view('admin.gantiganti.gantitelp', compact('user'));
    }

    public function updateTelpon(Request $request, $id)
    {
        $user = User::where('jenis_user_id', '=', '2')
            ->where('id', '=', $id)
            ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // $request->validate([
        //     'telpnum' => 'required|regex:/[0-9]{10,15}/',
        //     'password_confirmation' => 'required|string', // Add validation for password confirmation if needed
        // ]);

        // Optional: Add logic to check if the provided password matches the user's current password
        // if (!Hash::check($request->input('password_confirmation'), $user->password)) {
        //     return redirect()->back()->with('error', 'Current password is incorrect.');
        // }

        $user->nomor_telepon = $request->input('telpnum');
        $user->save();

        return redirect()->back()->with('success', 'Nomor telepon updated successfully.');
    }
}
