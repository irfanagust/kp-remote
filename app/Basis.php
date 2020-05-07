<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basis extends Model
{
    protected $table="basis";

    public function software()
    {
        return $this->hasMany('App\Software');
    }
}
