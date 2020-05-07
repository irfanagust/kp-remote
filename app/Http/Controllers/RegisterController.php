<?php

namespace App\Http\Controllers;

use App\User;
use App\Instansi;
use App\Pengembang;

use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function index()
    {
        return view('register');
    }

    public function register(REQUEST $request)
    {
        $message = [
            'required' => 'Kolom ini tidak boleh kosong',
            'min' => 'Isi kolom harus lebih dari 5 karakter',
            'confirmed' => 'Kata sandi dan Konfirmasi tidak cocok',
            'email' => 'email tidak valid'
        ];

        $this->validate($request,[
            'name' => 'required|min:5',
            'email'=>'unique:users|email|required',
            'password'=>'required|min:5|confirmed',
            'alamat' => 'required|min:5',
            'no_hp'=>'numeric|min:12'
        ], $message);

        
        $email = $request->email;
        $nama = $request->name;
        $role = $request->role;

        // $user = new User;
        // $user->email = $request->email;
        // $user->password = bcrypt($request->password);
        // $user->role_id = $request->role;
        // $user->save();

        if ($role == 1) {

            $user = new User;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role_id = $request->role;
            $user->save();

            $intansi = new Instansi([
                'nama' => $nama,
                'alamat'=>$request->alamat,
                'no_hp'=>$request->no_hp
            ]);
            $user->instansi()->save($intansi);
        
        }
        else if ($role == 2) {

            $user = new User;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role_id = $request->role;
            $user->save();

            $pengembang = new Pengembang([
                'nama' => $nama,
                'alamat'=>$request->alamat,
                'no_hp'=>$request->no_hp
            ]);
            $user->pengembang()->save($pengembang);

        }

        return redirect()->back();
    }
}
