<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gajipokok extends Model
{
    use HasFactory;

    protected $fillable = ['perusahaan_id', 'id_devisi', 'gaji_pokok'];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'perusahaan_id');
    }

    public function devisi()
    {
        return $this->belongsTo(Devisi::class, 'id_devisi');
    }
}
