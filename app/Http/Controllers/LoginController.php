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
            'email'=>'required',
            'password'=>'required|min:5'
        ], $message);

        $email = $request->email;
        $data = User::where('email',$email)->first();

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->role_id==1) {
                return redirect('/user');
            }if (Auth::user()->role_id==2) {
                return redirect('/pengembang');
            }if (Auth::user()->role_id==3) {
                return redirect('/admin');
            } else {
                return redirect()->back();
            }
        }
    }
}
