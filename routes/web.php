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
Route::get('/register','RegisterController@index')->name('register');
Route::post('/register/proses','RegisterController@register');

Route::get('/login','LoginController@index')->name('login');
Route::post('/login/auth','LoginController@authenticate')->name('auth');

// USER
Route::get('/user','UserController@index')->name('instansi');
Route::get('/user/pengajuan','UserController@tampilkanPengajuan');
Route::get('/user/pengajuan/{software_id}/detail','UserController@detailPengajuan');
Route::post('/user/pengajuan/create','UserController@input');
Route::get('/user/pengajuan/{id}/ubah','UserController@ubah');
Route::post('/user/pengajuan/{id}/update','UserController@update');


// ADMIN
Route::get('/admin','AdminController@index');

// MENAMPILKAN PENGAJUAN
Route::get('/admin/listpengajuan/{status_id}','AdminController@tampilkanPengajuan');

// MENAMPILKAN FORM INPUT SOFTWARE
Route::get('/admin/input-software','AdminController@formInputSoftware');

Route::post('/admin/input-software/proses','AdminController@InputSoftware');

// MENAMPILKAN SOFTWARE YANG SELESAI
Route::get('/admin/list-software','AdminController@tampilkanSoftware');

// MENAMPILKAN SOFTWARE YANG DIMASUKKAN KE PENGEMBANGAN UMUM
Route::get('/admin/pengembangan-umum','AdminController@tampilkanPengembanganUmum');
Route::get('/admin/pengembangan-umum/{id}/detail','AdminController@DetailPUmum');
Route::get('/admin/pengembangan-umum/{idsoftware}/{idpengembang}','AdminController@SetujuiJadiPengembang');

Route::get('/admin/pengembangan-dinkominfo','AdminController@tampilkanPengembanganDinkominfo');

// AKSI ADMIN TERHADAP PENGAJUAN SOFTWARE
Route::get('/admin/listpengajuan/proses/{id}/{status_id}','AdminController@ProsesPengajuan');
Route::get('/admin/listpengajuan/progrespengajuan/{id}/{progres_id}','AdminController@ProgresPengajuan');
Route::get('/admin/listpengajuan/masukkankepengembangan/{id}','AdminController@MasukKePengembangan'); 

// PENGEMBANG
Route::get('/pengembang','PengembangController@index')->name('pengembang');
Route::get('/pengembang/list-pengembangan','PengembangController@tampilkanPengembangan');//List baru
Route::get('/pengembang/list-pengembangan/{software_id}/detail','PengembangController@DetailPengembangan');
Route::get('/pengembang/list-pengembangan/{software_id}/{user_id}/daftar','PengembangController@daftarPengembang');//DAFTAR BARU



// PENGEMBANG UMUM
Route::get('/tesportal', function ()
{
   return view('/pengembang/berita-detail');
});