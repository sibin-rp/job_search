<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
  //
  public function login(){

  }


  public function logout(){
    Auth::logout();
    if(!Auth::user()){
      return redirect()->route('home');
    }

  }

  public function admin_login(){
    return view('home.admin_login');
  }

  public function login_admin(Request $request){
    // Form validation
    $this->validate($request,[
      'email' => 'required|email',
      'password' => 'required'
    ]);
    $auth_try = Auth::attempt([
      'email'     => $request->get('email'),
      'password'  => $request->get('password')
    ]);
    if($auth_try){
      return redirect()->route('admin.index');
    }else{
      return redirect()->route('admin_login')->
        with(['class'=>'alert-danger','message' => 'Incorrect Login credentials']);
    }

  }
  public function admin_logout(){
    if(Auth::user()){
      Auth::logout();
      return redirect()->route('home')
        ->with(['class'=>'alert-warning','message' => "User logout successfully"]);
    }
  }
}
