<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;




class LoginController extends Controller
{
    /*
  |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }

    
    public function daftar(){
      return view('auth.register');
    }

   public function register(){
    return view('auth.register');
  }

  public function register_acti(Request $request){
    $userrequest = $request->validate([
          'username' => 'required',
          'email' => 'required',
          'image' => 'image|file|max:2048',
          'level' => 'required',
          'password' => 'required',
          'password_confirm' => 'required|same:password',
    ]);
     if ($request->file('image')) {
            $userrequest['image'] = $request->file('image')->store('/public/image');
     } 
      $userrequest['password'] = Hash::make($userrequest['password']);

     User::create($userrequest);
     return redirect('getuser')->with('success', 'Registration berasil!');

       }
  


  public function login(){
   if (Auth::check()) {
     return redirect('dashboard');
   }else{
     return view('auth.login');
   }
 }


 public function login_action(Request $request){

   Session::flash('username'.$request->username);
   
   $request->validate([
     'username'=>'required',
     'password'=>'required',
   ]);

    $data = $request->only('username','password');

    if(Auth::attempt($data)) {
       return redirect('dasboard');
     }
    return redirect('login')->withSuccess('username & password tidak valid!');  
 }


 public function logout(){
   Auth::logout();
   return redirect('login');
 } 


 public function passwordEdit(){
   return view('auth.password');
 }


 public function password_action(Request $request)
 {
  dd($request);
     $request->validate([
         'old_password' => 'required|current_password',
         'new_password' => 'required|confirmed',
     ]);
     $user = User::find(Auth::id());
     $user->password = Hash::make($request->new_password);
     $user->save();
     $request->session()->regenerate();
     return back()->with('success', 'Password changed!');
 }


 public function index() {
   $post   = User::all();
   return view('layouts.master')->with('post', $post);
 }

 public function getUser() {
  $datauser = User::all();
  return view('auth.user',compact('datauser'));
}

 public function main() {
   $post   = User::all();
   return view('layouts.content')->with('post', $post);
 }

 
}
