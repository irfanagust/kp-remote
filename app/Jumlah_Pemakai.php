<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jumlah_Pemakai extends Model
{
    protected $table="jumlah_pemakai";

    public function software()
    {
        return $this->hasMany('App\Software');
    }
}
