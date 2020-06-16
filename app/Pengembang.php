<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengembang extends Model
{
    protected $fillable = [
        'user_id','nama','alamat','no_hp','nik','portfolio','deskripsi'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function softwares()
    {
        return $this->belongsToMany('App\Software','pengembang_software','pengembang_id','software_id')
                    ->withPivot('id','software_id','pengembang_id','status');
    }
}