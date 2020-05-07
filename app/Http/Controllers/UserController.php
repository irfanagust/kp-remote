<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Basis;
use App\Jenis_Layanan;
use App\Jumlah_Pemakai;
use App\Pengguna;
use App\Ruang_Lingkup;
use App\Sistem_Operasi;
use App\Software;
use App\Instansi;
use Auth;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $user = Auth::user();
        $instansi = Instansi::get()->where('user_id',$user->id)->first();

        return view('user/home',[
            'instansi' => $instansi
        ]);
    }

    public function pengajuan()
    {
        $basis = Basis::all();
        $jenis_layanan = Jenis_Layanan::all();
        $jumlah_pemakai = Jumlah_Pemakai::all();
        $pengguna_layanan = Pengguna::all();
        $ruang_lingkup = Ruang_Lingkup::all();
        $sistem_operasi = Sistem_Operasi::all();
        
        // INI BUAT ISIAN DROPDOWN
        return view('user/pengajuan',[
            'basis'=>$basis,
            'jenis_layanan'=>$jenis_layanan,
            'jumlah_pemakai'=>$jumlah_pemakai,
            'pengguna'=>$pengguna_layanan,
            'ruang_lingkup'=>$ruang_lingkup,
            'sistem_operasi'=>$sistem_operasi
        ]);
        
    }

    public function input(Request $data)
    {
        // cuma buat ngambil id dari users
        $user = Auth::user();
        $instansi = Instansi::get()->where('user_id',$user->id)->first();

        // //VALIDASI UNTUK STANDARAISASI ATURAN INPUT PENGAJUAN APLIKASI
        $pesan = [
            'required' => ':attribute tidak boleh dikosongkan!',
            'min' => ':attribute minimal :min karakter!',
            'max' => ':attribute maksimal :max karakter!'
        ];
        $this->validate($data , [
            'progres_id',
            'nama_perangkat_lunak' => 'required',
            'fileSOP' => 'required',
            'fungsi' => 'required',
            'deskripsi' => 'required',
            'jenis_layanan_id' => 'required',
            'jumlah_pemakai_id' => 'required',
            'basis_id' => 'required',
            'sistem_operasi_id' => 'required',
            'pengguna_id' => 'required',
            'ruang_lingkup_id' => 'required',
            'jenis_database' => 'required'
        ] , $pesan);
        
        Software::create([
            'instansi_id'=>$instansi->id,
            'status_id'=>$data->status,
            'progres_id'=>$data->progres_id,
            'pengembanganUmum'=>$data->pengembanganUmum,
            'pengembang_id'=>0,
            'nama_perangkat_lunak' => $data->nama_perangkat_lunak,
            'fileSOP' => $data->fileSOP,
            'fungsi' => $data->fungsi,
            'deskripsi' => $data->deskripsi,
            'jenis_layanan_id' => $data->jenis_layanan_id,
            'jumlah_pemakai_id' => $data->jumlah_pemakai_id,
            'basis_id' => $data->basis_id,
            'sistem_operasi_id' => $data->sistem_operasi_id,
            'pengguna_id' => $data->pengguna_id,
            'ruang_lingkup_id' => $data->ruang_lingkup_id,
            'jenis_database' => $data->jenis_database
        ]);

        return redirect('/user');

    }

    public function ubah($software_id)
    {
        $basis = Basis::all();
        $jenis_layanan = Jenis_Layanan::all();
        $jumlah_pemakai = Jumlah_Pemakai::all();
        $pengguna_layanan = Pengguna::all();
        $ruang_lingkup = Ruang_Lingkup::all();
        $sistem_operasi = Sistem_Operasi::all();

        $software = Software::find($software_id);
        return view('/user/ubah-pengajuan',[
            'software'=>$software,
            'basis'=>$basis,
            'jenis_layanan'=>$jenis_layanan,
            'jumlah_pemakai'=>$jumlah_pemakai,
            'pengguna'=>$pengguna_layanan,
            'ruang_lingkup'=>$ruang_lingkup,
            'sistem_operasi'=>$sistem_operasi
        ]);
    }

    public function update(Request $data)
    {

        $pesan = [
            'required' => ':attribute tidak boleh dikosongkan!',
            'min' => ':attribute minimal :min karakter!',
            'max' => ':attribute maksimal :max karakter!'
        ];
        $this->validate($data , [
            'nama_perangkat_lunak' => 'required',
            'fungsi' => 'required',
            'deskripsi' => 'required',
            'jenis_layanan_id' => 'required',
            'jumlah_pemakai_id' => 'required',
            'basis_id' => 'required',
            'sistem_operasi_id' => 'required',
            'pengguna_id' => 'required',
            'ruang_lingkup_id' => 'required',
            'jenis_database' => 'required',
            'id' => 'required'
        ] , $pesan);

        $decrypted_id = decrypt($data->id);

        $software = Software::find($decrypted_id);

        $software->nama_perangkat_lunak = $data->nama_perangkat_lunak;
        $software->fungsi = $data->fungsi;
        $software->jenis_layanan_id = $data->jenis_layanan_id;
        $software->deskripsi = $data->deskripsi;
        $software->jumlah_pemakai_id = $data->jumlah_pemakai_id;
        $software->basis_id = $data->basis_id;
        $software->sistem_operasi_id = $data->sistem_operasi_id;
        $software->pengguna_id = $data->pengguna_id;
        $software->ruang_lingkup_id = $data->ruang_lingkup_id;
        $software->jenis_database = $data->jenis_database;
        $software->save();

        return redirect('/user');
        
    }

    public function tampilkanPengajuan()
    {
        $user = Auth::user();
        $instansi = Instansi::get()->where('user_id',$user->id)->first();
        $software = Software::all()->where('instansi_id',$instansi->id);
        
        return view('/user/list-pengajuan',[
            'software' => $software
        ]);
    }

    public function detailPengajuan($software_id)
    {
        $software = Software::find($software_id);

        return view('user/detail-pengajuan',[
            'software'=> $software
        ]);
    }


}
