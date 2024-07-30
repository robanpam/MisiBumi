<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Donasi extends Model
{
    use HasFactory;
    protected $guarded=[];

    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->id) {
                $model->id = 'D-' . strtoupper(Str::random(3)) . rand(1, 9);
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kampanye()
    {
        return $this->belongsTo(Kampanye::class);
    }
}
