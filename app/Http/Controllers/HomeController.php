<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmationMail;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
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
      try {
        $this->validate($request, [
          'email' => 'required|email',
          'password' => 'required',
          'type' => 'required'
        ]);

        $user_create = $request->only(['email', 'password', 'type']);
        $token = bcrypt("$request->email $request->password");
        $token =str_replace("/","", $token);
        $user_create = array_add($user_create, 'token', $token);

        $user = User::create($user_create);
        if ($user) {
          Mail::to($request->email)->send(new ConfirmationMail($user));
          return response()->json(['status' => 200, 'message' => 'User created']);
        }
      }catch (QueryException $q){
        $qM = $q->getMessage();
        return response()->json(['status'=> 405,'message'=> "User already existed"]);
      }catch(\Exception $e){
        $eM = $e->getMessage();
        return response()->json(['status'=> 405,'message'=> $eM]);
      }
    }


    public function continueRegistration($token=null, Request $request){
      //$getUser = User::where('token',$token);
      //if($getUser->count()> 0){
        //if($getUser->type==1){// company user
         // return view('register._company_register');
       // }else{ // student
          $request->session()->put('register_token',$token);
          return view('register.register');
        //}
      //}else{
        //return redirect()->route('home');
      //}
    }

    public function saveStudentPersonalData(Request $request){
      $this->validate($request,[
        'first_name'    => 'required',
        'last_name'     => 'required',
        'dob'           => 'required',
        'home_address'  => 'required',
        'home_state'    => 'required',
        'phone_no'      => 'required'
      ]);
      if($request->session()->has('register_token')){// token exist
        $token = $request->session()->get('register_token');
        try{
          $userData = $request->except(['_token','_method']);
          $user = User::where('token', $token)->update($userData);
          if($user){
            return response()->json(['status'=> 200,'message'=>"Successfully update User information. Please Login to your Account"]);
          }
        }catch (ModelNotFoundException $m){
          $mM = $m->getMessage();
          return response()->json(['status'=> 405,'message'=> $mM]);
        }catch (QueryException $q) {
          $qM = $q->getMessage();
          dd($qM);
          return response()->json(['status' => 405, 'message' => "User not found. Please check your Confirmation email."]);
        }catch (\Exception $e){
          $eM = $e->getMessage();
          return response()->json(['status'=> 405,'message'=> $eM]);
        }
      }

    }
}
