<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gaji extends Model
{
    protected $fillable = [
        'user_id',
        'bulan',
        'tahun',
        'gaji_pokok',
        'tunjangan',
        'transport',
        'bonus',
        'total_gaji',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
