<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use App\Models\Kampanye;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function show()
    {
        // Total Users with jenis_users_id 1

        $startYear = 2021;
        $endYear = 2024;

        $totalUsers = User::where('jenis_user_id', 1)->count();

        // Total Kampanye with status 0 or 1
        $totalKampanye = Kampanye::whereIn('status', [0, 1])->count();

        // Total Donasi (sum of nilai_donasi)
        $totalDonasi = Donasi::sum('nilai_donasi');

        // Total Pending Kampanye with status 3
        $totalPending = Kampanye::where('status', 3)->count();

        $donasiTahunan = [];

        foreach(range($startYear, $endYear) as $year){
            $donasiTahunan[$year] = Donasi::select(DB::raw('YEAR(created_at) as tahun'),DB::raw('MONTH(created_at) as bulan'), DB::raw('sum(nilai_donasi) as total_donasi'))
                            ->whereYear('created_at', '=', $year)
                            ->groupBy('tahun', 'bulan')
                            ->get();
        }

        
        // dd($donasiTahunan);

        return view('admin.dashboardadmin', compact('totalUsers', 'totalKampanye', 'totalDonasi', 'totalPending', 'donasiTahunan', 'startYear', 'endYear'));
    }

    public function admin()
    {
        $item = auth()->user();

        // dd($item);

        return view('admin.profiladmin');
    }


    //update nama
    public function gantinama()
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        return view('admin.gantiganti.gantinama');
    }

    public function updateNama(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        $user->name = $request->input('gantiUname');
        $user->save();

        return redirect()->route('profileadmin')->with('success', 'Nama updated successfully.');
    }

    //update password
    public function showChangePasswordForm()
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        return view('admin.gantiganti.gantisandi');
    }

    public function updatePassword(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        $user->password = $request->input('password');
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully.');
    }

    //update email
    public function showChangeEmailForm()
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        return view('admin.gantiganti.gantiemail');
    }

    public function updateEmail(Request $request)
    {
        $user = auth()->user();

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
    public function showChangeTelponForm()
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        return view('admin.gantiganti.gantitelp');
    }

    public function updateTelpon(Request $request)
    {
        $user = auth()->user();

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

    //update profile
    public function showUpdateProfileForm()
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        return view('admin.gantiganti.gantiprofile');
    }

    public function updateProfilePicture(Request $request,)
    {
        $request->validate([
            'profilePicture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = auth()->user();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        $imageName = time() . '.' . $request->profilePicture->extension();
        $request->profilePicture->move(public_path('profile_pictures'), $imageName);

        $user->profile_photo = $imageName;
        $user->save();

        return redirect()->route('profileadmin')->with('success', 'Profile picture updated successfully.');
    }
}
