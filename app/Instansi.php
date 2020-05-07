<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    protected $fillable = [
        'user_id','nama','alamat','no_hp'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function softwares()
    {
        return $this->hasMany('App\Software','instansi_id');
    }
}
