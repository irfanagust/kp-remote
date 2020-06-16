<?php

namespace App\Http\Controllers;

use App\Pengembang;

use App\Basis;
use App\Jenis_Layanan;
use App\Jumlah_Pemakai;
use App\Pengguna;
use App\Ruang_Lingkup;
use App\Sistem_Operasi;
use App\Software;
use App\User;
use Auth;

use Illuminate\Http\Request;

class PengembangController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth','isPengembang']);
    }

    public function index()
    {
        $user_id = Auth::user()->id;
        $pengembang = Pengembang::where('user_id',$user_id)->first();
        $softwareSelesai = $pengembang->softwares()->where('progres_id',1)->get();
        $softwareBelumSelesai = $pengembang->softwares()->where('progres_id','!=',1)->get();
        return view('pengembang/home',[
            'pengembang'=>$pengembang,
            'softwareSelesai'=>$softwareSelesai,
            'softwareBelumSelesai' => $softwareBelumSelesai
        ]);
    }

    public function tampilkanProfil()
    {
        return view('pengembang/profil');
    }

    public function tampilkanFormProfil()
    {
        return view('pengembang/profil-form');
    }

    public function ubahProfil(Request $data)
    {
        
    }

    public function daftarPengembang($software_id, $user_id)
    {
        $software = Software::find($software_id);
        
        $user = Pengembang::find($user_id);
        $tes = $software->pengembangs; //nyari dipivot yang software_id = $software_id
        
        $software->pengembangs()->attach($user->id,['status'=>0]);
        return redirect('/pengembang/list-pengembangan/'.$software_id.'/detail');

    }

    public function tampilkanPengembangan()
    {
        $software = Software::all()->where('pengembanganUmum',1)->where('progres_id',0)->where('status_id',2)->where('pengembang_id',0);

        return view('/pengembang/list-aplikasi',[
            'software' => $software,
        ]);
    }

    public function DetailPengembangan($software_id)
    {
        $software = Software::find($software_id);
        $user_id = Auth::user()->id;
        $pengembang_id = Pengembang::where('user_id',$user_id)->first();

        return view('pengembang/detail-aplikasi',[
            'software'=>$software,
            'pengembang'=>$pengembang_id
        ]);
    }

    public function tampilkanPengembanganDiikuti()
    {
        $pengembang_id = Auth::user()->id;
    
        $pengembang = Pengembang::where('user_id',$pengembang_id)->first();
    
        $softwareYangDikembangkan = $pengembang->softwares()->where('status',1)->get();
        return view('/pengembang/pengembangan-disetujui',[
            'softwareYangDikembangkan' => $softwareYangDikembangkan
        ]);
    }

    public function DetailPengembanganDiikuti($software_id)
    {
        $software = Software::find($software_id);
        $user_id = Auth::user()->id;

        return view('pengembang/detail-pengembangan',[
            'software'=>$software,
        ]);
    }

    public function updateProgress($software_id)
    {
        $software = Software::find($software_id);
        
        $software->progres_id = 2;
        $software->save();
        return redirect('/pengembang/pengembangan-saya');
    }

}
