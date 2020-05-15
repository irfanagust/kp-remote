<?php

namespace App\Http\Controllers;

use App\User;
use App\Instansi;
use App\Pengembang;

use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function showFormRegister()
    {
        return view('register');
    }

    public function register(REQUEST $request)
    {
        $message = [
            'required' => 'Field ini tidak boleh kosong',
            'min' => 'Terlalu pendek, lebih lengkap lagi',
            'max'=>'Ukuran terlalu besar',
            'confirmed' => 'Kata sandi dan Konfirmasi tidak cocok',
            'email' => 'email tidak valid',
            'mimes' => 'Portfolio harus berbentuk PDF'
        ];

        $this->validate($request,[
            'nama' => 'required|min:5',
            'nik' => 'required',
            'email'=>'unique:users|email|required',
            'password'=>'required|min:5|confirmed',
            'deskripsi' => 'required|min:50',
            'portfolio' => 'required|mimes:pdf|max:1999',
            'alamat' => 'required|min:5',
            'no_hp'=>'required'
        ], $message);

        if ($request->hasFile('portfolio')) {
            $filenameWithExt = $request->file('portfolio')->getClientOriginalName();
            $FileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extFile = $request->file('portfolio')->getClientOriginalExtension();
            $FileNameToStore = $FileName.'_'.time().'.'.$extFile;
            $path = $request->file('portfolio')->storeAs('public/file/pengembang/document', $FileNameToStore);
        }

        $user = new User;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role;
        $user->save();

        $pengembang = new Pengembang([
            'nama' => $request->nama,
            'alamat'=>$request->alamat,
            'portfolio' => $FileNameToStore,
            'deskripsi'=>$request->deskripsi,
            'nik'=>$request->nik,
            'no_hp'=>$request->no_hp
        ]);
        $user->pengembang()->save($pengembang);

        return redirect('/login');
    }
}
