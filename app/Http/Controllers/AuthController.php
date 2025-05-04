<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login_admin(Request $request)
    {
        $validate = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        // dd(Auth::attempt($validate));
        if(Auth::attempt($validate)){
            $request->session()->regenerate();

            return redirect()->intended('/admin/dashboard');

        }else{
            return redirect()->back()->with('error', 'Nama atau Password salah');
        }


    }

    public function logout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->route('adminLogin');
    }
}
