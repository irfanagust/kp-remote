<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis_Layanan extends Model
{
    protected $table = "jenis_layanan";

    // // PIKIRIN LAGI MENGENAI RELASI
    public function software()
    {
        return $this->hasMany('App\Software');
    }
}
