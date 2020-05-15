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

// USER
Route::get('/user','UserController@index')->name('instansi')->middleware('isInstansi');;
Route::get('/user/pengajuan','UserController@tampilkanPengajuan');
Route::get('/user/pengajuan/{software_id}/detail','UserController@detailPengajuan');
Route::get('/user/pengajuan/create','UserController@showFormPengajuan')->name('form-create');
Route::post('/user/pengajuan/create/proses','UserController@input')->name('create');
Route::get('/user/pengajuan/{id}/ubah','UserController@ubah');
Route::post('/user/pengajuan/{id}/update','UserController@prosesUbah');


// ADMIN
Route::get('/admin','AdminController@index')->name('admin');//->middleware('isAdmin');

// MENAMPILKAN PENGAJUAN
Route::get('/admin/listpengajuan/{status_software}','AdminController@tampilkanPengajuanBerdasarkanStatusId');
// AKSI ADMIN TERHADAP PENGAJUAN SOFTWARE
Route::get('/admin/listpengajuan/{software_id}/detail','AdminController@DetailPengajuan');
Route::post('/admin/listpengajuan/{software_id}/proses-status','AdminController@ProsesPengajuan');
Route::get('/admin/listpengajuan/{software_id}/{progres_id}/progrespengajuan','AdminController@ProgresPengajuan');
Route::get('/admin/listpengajuan/masukkankepengembangan/{software_id}','AdminController@MasukanKePengembangan'); 

// MENAMPILKAN FORM INPUT SOFTWARE
Route::get('/admin/input-software','AdminController@showFormInputSoftware');

Route::post('/admin/input-software/proses','AdminController@InputSoftware');

// MENAMPILKAN SOFTWARE YANG SELESAI
Route::get('/admin/list-software','AdminController@tampilkanSoftware');

// MENAMPILKAN SOFTWARE YANG DIMASUKKAN KE PENGEMBANGAN
Route::get('/admin/pengembangan/umum','AdminController@tampilkanPengembanganUmum')->name('pengembangan-umum');
Route::get('/admin/pengembangan/umum/{id}/detail','AdminController@DetailPUmum');
Route::get('/admin/pengembangan/umum/{idsoftware}/{idpengembang}','AdminController@SetujuiJadiPengembang');
Route::get('/admin/pengembangan/dinkominfo','AdminController@tampilkanPengembanganDinkominfo')->name('pengembangan-dinkominfo');;
Route::get('/admin/pengembangan/dinkominfo/{id}/detail','AdminController@DetailPDinkominfo');



// PENGEMBANG
Route::get('/pengembang','PengembangController@index')->name('pengembang')->middleware('isPengembang');;
Route::get('/pengembang/list-pengembangan','PengembangController@tampilkanPengembangan');//List baru
Route::get('/pengembang/list-pengembangan/{software_id}/detail','PengembangController@DetailPengembangan');
Route::get('/pengembang/list-pengembangan/{software_id}/{user_id}/daftar','PengembangController@daftarPengembang');
Route::get('/pengembang/pengembangan-saya','PengembangController@tampilkanPengembanganDiikuti');
Route::get('/pengembang/pengembangan-saya/{software_id}/detail','PengembangController@DetailPengembanganDiikuti');




// PENGEMBANG UMUM
Route::get('/tesportal', function ()
{
   return view('/admin/home');
});