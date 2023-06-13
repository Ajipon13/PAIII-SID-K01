<?php

namespace App\Http\Controllers\auth;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests;
use Auth;
class AkunController extends Controller
{


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
        $userrequest['image'] = $request->file('image')->store('/public/img');
      } 

      $userrequest['id'] = auth()->user()->id;
      $userrequest['excerpt'] = Str::limit(strip_tags($request->body, 200));
      $userrequest['password'] = Hash::make($userrequest['password']);
      User::create($userrequest);
      return redirect('user')->with('success', 'Registration gagal!');

        }


   public function login(){
    if (Auth::check()) {
      return redirect('dasboard');
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

  public function main() {
    $post   = User::all();
    return view('layouts.content')->with('post', $post);
    // return view('',compact('user',$user));
  }

  public function updateProfile(Request $request, User $user)
{
    $validatedData = $request->validate([
        'image' => 'required'
    ]);
    
    if ($request->file('image')) {
        Storage::delete($user->image); // Hapus gambar profil yang lama
        $validatedData['image'] = $request->file('image')->store('/public/image');
    }
    
    dd($user);
    
    return redirect()->back()->with('success', 'Profile picture updated successfully.');
}


}
