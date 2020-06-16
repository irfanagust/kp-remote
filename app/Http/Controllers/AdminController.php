<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\User;
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
        return $this->middleware(['auth','isAdmin']);
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

    public function DeletePengajuan($software_id)
    {
        $software = Software::find($software_id);
        $software->delete();
        return redirect('/admin/listpengajuan/'.$software->status_id);
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

        $basis = Basis::all();
        $jenis_layanan = Jenis_Layanan::all();
        $jumlah_pemakai = Jumlah_Pemakai::all();
        $pengguna_layanan = Pengguna::all();
        $ruang_lingkup = Ruang_Lingkup::all();
        $sistem_operasi = Sistem_Operasi::all();

        return view('admin/software-repositori-form',[
            'basis'=>$basis,
            'jenis_layanan'=>$jenis_layanan,
            'jumlah_pemakai'=>$jumlah_pemakai,
            'pengguna'=>$pengguna_layanan,
            'ruang_lingkup'=>$ruang_lingkup,
            'sistem_operasi'=>$sistem_operasi
        ]);
    }

    public function showFormInputInstansi()
    {
        return view('admin/instansi-create-form',[
            
        ]);
    }

    public function showInstansi()
    {
        $instansis = Instansi::all();
        return view('admin/list-instansi',[
            'instansis' => $instansis
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
            'max' => ':attribute maksimal :max karakter!',
            'mimes'=> 'File harus PDF/Word'
        ];
        $this->validate($data , [
            'nama_perangkat_lunak' => 'required|min:6|max:100',
            'fileSOP' => 'required|mimes:pdf,docx,doc|max:1999',
            'fungsi' => 'required|min:15|max:100',
            'deskripsi' => 'required|min:100|max:500',
            'jenis_layanan_id' => 'required',
            'jumlah_pemakai_id' => 'required',
            'basis_id' => 'required',
            'sistem_operasi_id' => 'required',
            'pengguna_id' => 'required',
            'ruang_lingkup_id' => 'required',
            'jenis_database' => 'required|min:4|max:100'
        ] , $pesan);

        if ($data->hasFile('fileSOP')) {
            $filenameWithExt = $data->file('fileSOP')->getClientOriginalName();
            $FileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extFile = $data->file('fileSOP')->getClientOriginalExtension();
            $FileNameToStore = $FileName.'_'.time().'.'.$extFile;
            $path = $data->file('fileSOP')->storeAs('public/file/instansi/document', $FileNameToStore);
        }
        
        Software::create([
            'instansi_id'=>0,
            'status_id'=>2,
            'pengembanganUmum'=>0,
            'pengembang_id'=>0,
            'progres_id'=>1,
            'nama_perangkat_lunak' => $data->nama_perangkat_lunak,
            'fileSOP' => $FileNameToStore,
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

        return redirect()->route('repositori');

    }

    public function showRepositori()
    {
        $softwares = Software::all()->where('progres_id',1);
        return view('/admin/software-repositori',[
            'softwares' => $softwares,
        ]);
    }

    public function detailRepositori($software_id)
    {
        $software = Software::find($software_id);
        return view('/admin/software-repositori-detail',[
            'software'=>$software
        ]);
    }

    public function MasukanKePengembanganUmum($software_id, $optionPengembang)
    {
        $software = Software::find($software_id);
        $software->pengembanganUmum = $optionPengembang;
        $software->save();
        if ($optionPengembang==1) {
            return redirect('/admin/pengembangan/umum/status-dikembangkan/0');
        } elseif($optionPengembang==2) {
            return redirect('/admin/pengembangan/dinkominfo');
        }
        
    }

    public function MasukanKePengembanganDinkominfo($software_id)
    {
        $software = Software::find($software_id);
        $software->pengembanganUmum = 2;
        $software->save();
        return redirect('/admin/pengembangan/dinkominfo');
    }

    public function updateProgressPUmum($software_id)
    {
        $software = Software::find($software_id);
        $software->progres_id = 1;
        $software->save();
        return redirect('/admin/pengembangan/umum/status-dikembangkan/'.$software->progres_id);
    }

    public function updateProgressPDinkominfo($software_id)
    {
        $software = Software::find($software_id);
        $software->progres_id = 1;
        $software->save();
        return redirect('/admin/pengembangan/dinkominfo');
    }

    public function tampilkanPengembanganUmum($adaPengembang)
    {
        if ($adaPengembang == 0) {
            $softwares = Software::all()->where('pengembanganUmum',1)->where('pengembang_id',0);
        } else {
            $softwares = Software::all()->where('pengembanganUmum',1)->where('pengembang_id','!=',0);
        }

        return view('/admin/pengembangan-umum',[
            'softwares' => $softwares,
            'h1' => $adaPengembang
        ]);

    }

    public function detailPengembanganUmum($software_id)
    {
        $software=Software::find($software_id);
        // dd($software->pengembangs);
        
        return view('/admin/pengembangan-umum-detail',[
            'software'=>$software
        ]);
    }

    public function SetujuiJadiPengembang($software_id, $pengembang_id)
    {
        $software = Software::find($software_id);
        $software->pengembangs()->updateExistingPivot($pengembang_id, [
            'status'=>1
        ]);
        $software->pengembang_id = $pengembang_id;
        $software->save();

        return redirect('/admin/pengembangan/umum/'.$software_id.'/detail');
    }

    public function tampilkanPengembanganDinkominfo()
    {
        $softwares = Software::all()->where('pengembanganUmum',2);

        return view('/admin/pengembangan-dinkominfo',[
            'softwares' => $softwares
        ]);
    }

    public function inputInstansi(REQUEST $request)
    {
        $message = [
            'required' => 'Field ini tidak boleh kosong',
            'min' => 'Terlalu pendek, lebih lengkap lagi',
            'max'=>'Ukuran terlalu besar',
            'confirmed' => 'Kata sandi dan Konfirmasi tidak cocok',
            'email' => 'email tidak valid',
        ];

        $this->validate($request,[
            'nama' => 'required|min:5',
            'email'=>'unique:users|email|required',
            'password'=>'required|min:5|confirmed',
            'alamat' => 'required|min:5',
            'no_hp'=>'required'
        ], $message);
    
        $user = new User;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = 1;
        $user->save();

        $instansi = new Instansi([
            'nama' => $request->nama,
            'alamat'=>$request->alamat,
            'no_hp'=>$request->no_hp
        ]);
        $user->instansi()->save($instansi);

        return redirect('/admin/instansi');
    }
}