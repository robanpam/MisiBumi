<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

    public function gantinama($id)
    {
        $item = User::select('*')
            ->where('jenis_user_id', '=', '2')
            ->where('id', '=', $id)
            ->first();

        if (!$item) {
            return redirect()->back()->with('error', 'User not found.');
        }

        return view('admin.gantiganti.gantinama', compact('item'));
    }
}
