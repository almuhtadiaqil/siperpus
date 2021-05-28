<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class AuthController extends Controller
{
    public function index() 
    {
        
        return view('auth.login');
    }

    public function _login(Request $request) 
    {
        
        request()->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]);
            $kredensil = $request->only('username', 'password');

            if (Auth::attempt($kredensil)){
                $user = Auth::user();
                if ($user->role == 'super_admin') {
                    Session::put('id_user', $user->id);
                    return redirect()->intended('superadmin');
                }
                elseif ($user->role == 'admin') {
                    Session::put('id_user', $user->id);
                    return redirect()->intended('admin');
                }
                elseif ($user->role == 'visitor') {
                    Session::put('id_user', $user->id);
                    return redirect()->intended('visitor');
                }
                return redirect()->intended('login')->with('pesan', 'Anda tidak memiliki akses');
            }
            return redirect('login')->with('pesan', 'Akun anda tidak terdaftar');
    }

    public function logout(Request $request){
        $request->session()->flush();
        Session::forget('id_user');
        Auth::logout();
        return redirect('login');
    }
}
