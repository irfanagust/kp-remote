<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruang_Lingkup extends Model
{
    protected $table="ruang_lingkup";

    public function software()
    {
        return $this->hasMany('App\Software');
    }
}
