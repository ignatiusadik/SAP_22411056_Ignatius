<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'alasan',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
