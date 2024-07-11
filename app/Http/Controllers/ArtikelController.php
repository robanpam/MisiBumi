<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    //kelola artikel 
    public function kelolaartikel()
    {
        $item = Artikel::join('users', 'artikels.admin_id', '=', 'users.id')
            ->select('*')
            ->get();

        // dd($item);
        return view('artikel.kelolaartikel', compact('item'));
    }

    //upload artikel

}
