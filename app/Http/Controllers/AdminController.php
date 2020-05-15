<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Software;
use App\Instansi;
use App\Pengembang;
use App\Basis;
use App\Jenis_Layanan;
use App\Jumlah_Pemakai;
use App\Pengguna;
use App\Ruang_Lingkup;
use App\Sistem_Operasi;

// nanti role dicomentarin aja ya kalo dah kelar testingnya
use App\Role;

use Auth;

class AdminController extends Controller
{

    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function index()
    {
        $software_blm_disetujui = Software::all()->where('status_id',1);
        $software_disetujui = Software::all()->where('status_id',2);
        $software_dipertimbangkan = Software::all()->where('status_id',3);
        $software_ditolak = Software::all()->where('status_id',4);

        return view('admin/home',[
            'software_blm_disetujui'=>$software_blm_disetujui,
            'software_disetujui'=>$software_disetujui,
            'software_dipertimbangkan'=>$software_dipertimbangkan,
            'software_ditolak'=>$software_ditolak
        ]);
    }

    public function tampilkanPengajuanBerdasarkanStatusId($status_software)
    {
        $decrypted_status_software = $status_software; //NANTI DIENCRYPT YA STATUS IDNYA decrypt($status_software);
        $softwares = Software::all()->where('status_id', $decrypted_status_software)->where('progres_id',0)->where('pengembanganUmum',0);

        $software_blm_disetujui = Software::all()->where('status_id',1);
        $software_disetujui = Software::all()->where('status_id',2);
        $software_dipertimbangkan = Software::all()->where('status_id',3);
        $software_ditolak = Software::all()->where('status_id',4);

        return view('/admin/pengajuan-list',[
            'softwares' => $softwares,
            'status_software'=> $decrypted_status_software,
            'software_blm_disetujui'=>$software_blm_disetujui,
            'software_disetujui'=>$software_disetujui,
            'software_dipertimbangkan'=>$software_dipertimbangkan,
            'software_ditolak'=>$software_ditolak
        ]);
    }

    public function DetailPengajuan($software_id)
    {
        $software = Software::find($software_id);

        return view('/admin/pengajuan-detail',[
            'software'=>$software
        ]);
    }

    public function ProsesPengajuan(Request $data, $software_id)
    {
        $software = Software::find($software_id);
        $software->status_id = $data->status_software;
        $software->alasan_ditolak = $data->alasan_ditolak;
        $software->save();

        return redirect('/admin/listpengajuan/'.$data->status_software);
    }

    public function ProgresPengajuan($id, $progres_id)
    {
        $software = Software::find($id);
        $software->progres_id = $progres_id;
        $software->save();

        return redirect('/admin');
    }

    public function showFormInputSoftware()
    {
        $user=Auth::user();

        $basis = Basis::all();
        $jenis_layanan = Jenis_Layanan::all();
        $jumlah_pemakai = Jumlah_Pemakai::all();
        $pengguna_layanan = Pengguna::all();
        $ruang_lingkup = Ruang_Lingkup::all();
        $sistem_operasi = Sistem_Operasi::all();

        return view('admin/inputsoftware',[
            'user' => $user,
            'basis'=>$basis,
            'jenis_layanan'=>$jenis_layanan,
            'jumlah_pemakai'=>$jumlah_pemakai,
            'pengguna'=>$pengguna_layanan,
            'ruang_lingkup'=>$ruang_lingkup,
            'sistem_operasi'=>$sistem_operasi
        ]);
    }

    public function inputSoftware(Request $data)
    {
        // cuma buat ngambil id dari users
        $user = Auth::user();

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
            'user_id'=>$user->id,
            'status_id'=>$data->status,
            'progres_id'=>$data->progres_id,
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

        return redirect('/admin/listsoftware');

    }

    public function tampilkanSoftware()
    {
        $software = Software::all()->where('progres_id',2);
        $user=Auth::user();
        return view('/admin/listsoftware',[
            'software' => $software,
            'user' => $user
        ]);
    }

    public function MasukanKePengembangan($software_id)
    {
        $software = Software::find($software_id);
        $software->pengembanganUmum = 2;
        $software->pengembangs()->attach($id,[
            'pengembang_id'=>0,
            'status'=>0
        ]);
        $software->save();
        return redirect('/admin');
    }

    public function tampilkanNavPengembangan()
    {
        return view('/admin/pengembangan');
    }

    public function tampilkanPengembanganUmum()
    {
        $user=Auth::user();
        $software = Software::all()->where('pengembanganUmum',2);

        return view('/admin/listpengembangan-umum',[
            'software' => $software,
            'user'=>$user
        ]);
    }

    public function DetailPUmum($id)
    {
        $software=Software::find($id);
        // dd($software->pengembangs);
        
        return view('/admin/pu-detail',[
            'software'=>$software
        ]);
    }

    public function SetujuiJadiPengembang($idsoftware, $idpengembang)
    {
        $software = Software::find($idsoftware);
        $software->pengembangs()->updateExistingPivot($idpengembang, [
            'status'=>1
        ]);
        return redirect('/admin/pengembangan-umum');
    }

    public function tampilkanPengembanganDinkominfo()
    {
        $user=Auth::user();
        $softwarePengembangan = Software::all()->where('pengembanganUmum',1);

        return view('/admin/listpengembangan-dinkominfo',[
            'softwarePengembangan' => $softwarePengembangan,
            'user'=>$user
        ]);
    }
    
    public function test()
    {
        $software = Software::get()->where('pengembanganUmum',2);
        return view('/admin/test',[
            'software' => $software
        ]);
    }

    public function testlagi()
    {
        $software = Software::find(1);
        $software->users()->create([
            'user_id' => 1,
        ]);
    }

}