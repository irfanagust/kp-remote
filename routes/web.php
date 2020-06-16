<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// LOGOUT
use Illuminate\Support\Facades\Auth;
Route::get('/logout',function()
{
    Auth::logout();
    return redirect('');
})->name('logout');


// REGISTER/LOGIN
Route::get('/register','RegisterController@showFormRegister')->name('register');
Route::post('/register/proses','RegisterController@register')->name('registerProcess');

Route::get('/login','LoginController@index')->name('login');
Route::post('/login/auth','LoginController@authenticate')->name('auth');

use Illuminate\Support\Facades\DB;
use App\Software;
Route::get('/repositori', function()
{
    $softwares = Software::all()->where('progres_id',1);
    
    return view('repositori-software',[
        'softwares'=>$softwares
    ]);
});

// USER
Route::get('/user','UserController@index')->name('instansi');//->middleware('isInstansi');;
Route::get('/user/pengajuan','UserController@tampilkanPengajuan');
Route::get('/user/pengajuan/{software_id}/detail','UserController@detailPengajuan');
Route::get('/user/pengajuan/create','UserController@showFormPengajuan')->name('form-create');
Route::post('/user/pengajuan/create/proses','UserController@input')->name('create');
Route::get('/user/pengajuan/{id}/ubah','UserController@ubah');
Route::post('/user/pengajuan/{id}/update','UserController@prosesUbah');

Route::get('/user/repositori','UserController@tampilkanRepositori')->name('userShowRepositori');

// ADMIN
Route::get('/admin','AdminController@index')->name('admin');//->middleware('isAdmin');
// MENAMPILKAN PENGAJUAN
Route::get('/admin/listpengajuan/{status_software}','AdminController@tampilkanPengajuanBerdasarkanStatusId');
// AKSI ADMIN TERHADAP PENGAJUAN SOFTWARE
Route::get('/admin/listpengajuan/{software_id}/detail','AdminController@DetailPengajuan');
Route::get('/admin/listpengajuan/{software_id}/delete','AdminController@DeletePengajuan');
Route::post('/admin/listpengajuan/{software_id}/proses-status','AdminController@ProsesPengajuan');
Route::get('/admin/listpengajuan/{software_id}/{progres_id}/progrespengajuan','AdminController@ProgresPengajuan');
Route::get('/admin/listpengajuan/{software_id}/pengembangan/{optionPengembang}','AdminController@MasukanKePengembanganUmum'); 

//MADMIN KELOLA INSTANSI 
Route::get('/admin/instansi','AdminController@showInstansi')->name('show-instansi');
Route::get('/admin/instansi/create','AdminController@showFormInputInstansi')->name('show-form-instansi');
Route::post('/admin/instansi/create/proses','AdminController@InputInstansi')->name('create-instansi');

// MENAMPILKAN FORM INPUT SOFTWARE
Route::get('/admin/repositori','AdminController@showRepositori')->name('repositori');
Route::get('/admin/repositori/{software_id}/detail','AdminController@detailRepositori');
Route::get('/admin/repositori/create','AdminController@showFormInputSoftware')->name('show-form-repositori');
Route::post('/admin/repositori/create/proses','AdminController@InputSoftware')->name('create-repositori');

// MENAMPILKAN SOFTWARE YANG SELESAI
Route::get('/admin/list-software','AdminController@tampilkanSoftware');

// MENAMPILKAN SOFTWARE YANG DIMASUKKAN KE PENGEMBANGAN
Route::get('/admin/pengembangan/umum/status-dikembangkan/{adaPengembang}','AdminController@tampilkanPengembanganUmum');
Route::get('/admin/pengembangan/umum/{software_id}/detail','AdminController@detailPengembanganUmum');

Route::get('/admin/pengembangan/umum/{software_id}/update','AdminController@updateProgressPUmum');

Route::get('/admin/pengembangan/umum/{software_id}/{pengembang_id}','AdminController@SetujuiJadiPengembang');

Route::get('/admin/pengembangan/dinkominfo','AdminController@tampilkanPengembanganDinkominfo')->name('pengembangan-dinkominfo');;
Route::get('/admin/pengembangan/dinkominfo/{id}/detail','AdminController@DetailPengembanganDinkominfo');
Route::get('/admin/pengembangan/dinkominfo/{software_id}/update','AdminController@updateProgressPDinkominfo');


// PENGEMBANG
Route::get('/pengembang','PengembangController@index')->name('pengembang');//->middleware('isPengembang');
Route::get('/pengembang/profil','PengembangController@tampilkanProfil')->name('kelola-profil-pengembang');
Route::get('/pengembang/profil/kelola','PengembangController@tampilkanFormProfil')->name('form-kelola-pengembang');
Route::post('/pengembang/profil/ubah','PengembangController@ubahProfil')->name('ubah-profil');
Route::get('/pengembang/list-pengembangan','PengembangController@tampilkanPengembangan');//List baru
Route::get('/pengembang/list-pengembangan/{software_id}/detail','PengembangController@DetailPengembangan');
Route::get('/pengembang/list-pengembangan/{software_id}/{user_id}/daftar','PengembangController@daftarPengembang');
Route::get('/pengembang/pengembangan-saya','PengembangController@tampilkanPengembanganDiikuti');
Route::get('/pengembang/pengembangan-saya/{software_id}/detail-pengembangan','PengembangController@DetailPengembanganDiikuti');
Route::get('/pengembang/pengembangan-saya/{software_id}/progress','PengembangController@updateProgress');




// PENGEMBANG UMUM
Route::get('/tesportal', function ()
{
   return view('/admin/home');
});