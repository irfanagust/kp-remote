<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sistem_Operasi extends Model
{
    protected $table="sistem_operasi";

    public function software()
    {
        return $this->hasMany('App\Software');
    }
}
