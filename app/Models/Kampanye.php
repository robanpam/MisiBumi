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

    public function pohon()
    {
        return $this->belongsTo(Pohon::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function donasis()
    {
        return $this->hasMany(Donasi::class);
    }
}
