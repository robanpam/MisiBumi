<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kampanye extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nama_kampanye',
        'lokasi_kampanye',
        'pohon_id',
        'status',
        'jumlah_pohon',
        'batas_donasi',
        'deskripsi',
        'gambar_kampanye',
        'total_donatur',
    ];
}
