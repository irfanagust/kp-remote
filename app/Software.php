<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    protected $table="software";

    // GUARDED, jangan pake fillable kalo atribut yg kudu diisinya banyak
    protected $fillable=[
        'status_id',
        'instansi_id',
        'nama_perangkat_lunak',
        'pengembanganUmum',
        'pengembang_id',
        'fileSOP',
        'fungsi',
        'deskripsi',
        'jenis_layanan_id',
        'jumlah_pemakai_id',
        'basis_id',
        'sistem_operasi_id',
        'pengguna_id',
        'ruang_lingkup_id',
        'jenis_database',
        'alasan_ditolak',
        'progres_id',
    ];
    
    public function basis()
    {
        return $this->belongsTo('App\Basis');
    }
    
    public function jenis_layanan()
    {
        return $this->belongsTo('App\Jenis_Layanan');
    }

    public function jumlah_pemakai()
    {
        return $this->belongsTo('App\Jumlah_Pemakai');
    }

    public function pengguna()
    {
        return $this->belongsTo('App\Pengguna');
    }

    public function ruang_lingkup()
    {
        return $this->belongsTo('App\Ruang_Lingkup');
    }

    public function sistem_operasi()
    {
        return $this->belongsTo('App\Sistem_Operasi');
    }

    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    public function instansi()
    {
        return $this->belongsTo('App\Instansi','instansi_id');
    }

    public function pengembangs()
    {
        return $this->belongsToMany('App\Pengembang','pengembang_software','software_id','pengembang_id')
                    ->withPivot('id','software_id','pengembang_id','status');
    }
}