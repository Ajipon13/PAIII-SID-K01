<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    //
    public function index(){
        if ($user = Auth::user()){
            if ($user->level == '1') {
                return redirect()->intended('Dashboard/admin');
            }elseif ($user->level == '2') {
                return redirect()->intended('Dashboard/desa');
            }
            // elseif ($user->level == '3') {
            //     return redirect()->intended('Dashboard/bedahara');
            // }
        }
        return view('auth.login');
    }

    public function login_action(Request $request){
                $request->validate([
                    'username' => 'required',
                    'password' => 'required'
                ]
        );

        $kredesial = $request->only('username','password');
        if (Auth::attempt($kredesial)){
            $request->session()->regenerate();
            $user = Auth::user();  
                if ($user->level == '1') {
                    return redirect()->intended('Dashboard/admin');
                }elseif ($user->level == '2') {
                    return redirect()->intended('Dashboard/desa');
                }elseif ($user->level == '3') {
                    return redirect()->intended('Dashboard/bedahara');
                }elseif ($user->level == '4') {
                    return redirect('404');
                }
                return redirect()->intended('/login');
        }

     return back()->withErrors([ 'username' => 'Maaf username dan password anda tidak valid!'])->onlyInput('username');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }

    
}
