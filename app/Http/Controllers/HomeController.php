<?php

namespace App\Http\Controllers;

use App\Company;
use App\Helpers;
use App\InternshipField;
use App\Mail\ConfirmationMail;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Mail;


use Illuminate\Support\Facades\File;

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
          try{
            Mail::to($request->email)->send(new ConfirmationMail($user));
          }catch (\Exception $e2){

          }
          return redirect()->route('complete_confirmation')->with(['status'=> 200,'class'=>'alert-success',
          'message' =>'Confirmation send']);
        }else{
          return redirect()->route('home')->with(['status' => 401,'message' => 'Unknown errors']);
        }
      }catch (QueryException $q){
        $qM = $q->getMessage();
        return redirect()->route('home')->with(['class'=>'alert-warning','message'=>"User already created"]);
      }catch(\Exception $e){
        $eM = $e->getMessage();
        return redirect()->route('home')-with(['class'=>'alert-warning','message'=> $eM]);
      }
    }

    public function completeConfirmation(){
      return view('home.complete_confirmation');
    }


    public function continueRegistration($token=null, Request $request){
      $getUser = User::where('token',$token);
      if($getUser->count()> 0){
        $getUser = $getUser->get()->first();
        $request->session()->put('register_token',$token);
        $states = Helpers::getStates();
        if($getUser->type==1){// company user
          return view('register.company',compact(['states']));
        }else{ // student
          return view('register.student',compact(['states']));
        }
      }else{
        return redirect()->route('home');
      }
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

  /**
   * Company Logo Upload
   *
   * @param Request $request
   * @return \Illuminate\Http\JsonResponse
   */
    public function companyLogoUpload(Request $request){
      if($request->session()->exists('register_token')){
        if($request->hasFile('logo') && $request->file('logo')->isValid()){
          try{
            $file = $request->file('logo');
            $file_ext = $file->extension();
            $token = $request->session()->get('register_token');
            $user =  User::where('token',$token)->get()->first();
            $check_company_user = Company::where('user_id',$user->id);
            if($check_company_user->count() > 0){
              $company = $check_company_user->get()->first();
            }else{
              $company = Company::create([
                'user_id'=>$user->id,
                'email' => $user->email
              ]);
            }
            try{

              $companyId = $company->id;
              $logo_name = "logo-$companyId.$file_ext";
              if(!file_exists(public_path("images/company/$companyId"))){
                File::makeDirectory(public_path("images/company/$companyId"),0777);
              }
              $file_path = $file->storePubliclyAs("public/company/$companyId",$logo_name);
              $company->update([
                'logo' => asset("storage/company/$companyId/$logo_name")
              ]);
              return response()->json([
                'status' => 200,
                'message' => 'Logo saved successfully',
                'logo'    => $file_path
              ]);
            }catch (QueryException $e){
              return response()->json([
                'status' => 200,
                'message' => $e->getMessage(),
                'line'    => $e->getLine()
              ]);
            }

          }catch (\Exception $e){
            return response()->json([
              'status' => 405,
              'message' => $e->getMessage(),
              'line' => $e->getLine(),
              'code' => $e->getCode()
            ]);
          }
        }
      }
    }

    public function saveCompanyInfo(Request $request){
      try{
        $user = $request->get('user');
        $get_f_l_name = explode(' ',$user['name']);
        if(isset($get_f_l_name[0]) && isset($get_f_l_name[1])){
          $user['first_name'] = $get_f_l_name[0];
          $user['last_name'] = $get_f_l_name[1];
        }else{
          $user['first_name'] = $user['name'];
        }
        $user = array_except($user,'name');
        $company = $request->get('company');

        $token = $request->session()->get('register_token');
        $get_user = User::where('token',$token)->get()->first();
        $get_user->update($user);
        $get_user->company()->update($company);

        return redirect()->route('company_internship_form');
      }catch (\Exception $e){
        dd($e);
        return redirect()->back();
      }
    }

    public function companyInternshipForm(){
      $internship_fields = InternshipField::all()->toArray();

      return view('register.company_internship',compact(['internship_fields']));
    }

}
