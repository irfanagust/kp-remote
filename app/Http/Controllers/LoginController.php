<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {

        $message = [
            'required' => 'Kolom ini tidak boleh kosong',
            'email' => 'email tidak valid'
        ];

        $this->validate($request,[
            'email'=>'email|required',
            'password'=>'required|min:5'
        ], $message);

        $email = $request->email;
        $data = User::where('email',$email)->first();

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            
            if ($data->role_id==1) {
                return redirect()->intended('/user');
            } elseif ($data->role_id==2) {
                return redirect()->intended('/pengembang');
            } elseif ($data->role_id==3) {
                return redirect()->intended('/admin');
            } else {
                return redirect()->back();
            }
        }
    }
}
