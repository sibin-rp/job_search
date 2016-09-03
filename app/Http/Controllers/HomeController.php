<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmationMail;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index(){
      return view('home.index');
    }

    public function sendStudentConfirmation(Request $request){
      try{
        $this->validate($request,[
          'email' =>  'required|email',
          'password'=> 'required',
          'type' => 'required'
        ]);

        $user_create = $request->only(['email','password','type']);
        $token = bcrypt("$request->email $request->password");
        $user_create = array_add($user_create,'token',$token);

        $user = User::create($user_create);
        if($user){
          Mail::to($request->email)->send(new ConfirmationMail($user));
          return response()->json(['status'=> 200,'message'=>'User created']);
        }
      }catch(\Exception $e){
        $eM = $e->getMessage();
        return response()->json(['status'=> 405,'message'=> $eM]);
      }
    }


    public function continueRegistration($token=null){
      //$getUser = User::where('token',$token);
      //if($getUser->count()> 0){
        //if($getUser->type==1){// company user
         // return view('register._company_register');
       // }else{ // student
          return view('register.register');
        //}
      //}else{
        //return redirect()->route('home');
      //}
    }
}
