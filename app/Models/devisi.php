<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class devisi extends Model
{
    protected $fillable = ['nama_devisi'];


    public function devisi()
    {
        return $this->belongsTo(Devisi::class, 'devisi_id');
    }

    public function gajipokok()
    {
        return $this->hasOne(GajiPokok::class, 'id_devisi');
    }
}
