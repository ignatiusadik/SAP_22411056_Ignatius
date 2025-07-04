<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class perusahaan extends Model
{
    protected $fillable = ['nama_perusahaan', 'email', 'no_tlp', 'alamat'];

    public function divisions()
    {
        return $this->hasMany(devisi::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
