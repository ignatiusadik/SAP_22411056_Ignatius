<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'perusahaan_id',
        'devisi_id',
        'jenis_kelamin',
        'phone',
        'alamat',
        'tanggal_lahir'
    ];

    protected $hidden = ['password', 'remember_token'];


    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'perusahaan_id');
    }

    public function devisi()
    {
        return $this->belongsTo(Devisi::class, 'devisi_id');
    }
}
