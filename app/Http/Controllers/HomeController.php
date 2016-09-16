<?php

namespace App\Http\Controllers;

use App\Company;
use App\Helpers;
use App\Internship;
use App\InternshipField;
use App\InternshipPreference;
use App\Mail\ConfirmationMail;
use App\Qualification;
use App\StudentQualification;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


use Illuminate\Support\Facades\File;
use League\Flysystem\Exception;

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
//        dd($qM);
        return redirect()->route('home')->with(['class'=>'alert-warning','message'=>"User already created"]);
      }catch(\Exception $e){
        $eM = $e->getMessage();
//        dd($eM);
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
          $get_fields = InternshipField::all()->toArray();
          return view('register.student',compact(['states','get_fields']));
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

    public function saveStudentInternshipPreferenceData(Request $request){
      try{
        $internships = $request->get('internship');
        $token = $request->session()->get('register_token');
        $user = User::where('token',$token)->get()->first();

        foreach ($internships as $field_id => $internship){
          $internship['internship_field_id'] = $field_id;
          $internship['user_id'] = $user->id;
          if($internship['from_date']=="") $internship = array_except($internship,'from_date');
          if($internship['to_date']=="") $internship = array_except($internship,'to_date');
          if(isset($internship['city'])){
            $internship['city'] = array_filter($internship['city'], function($value){
              return $value !="";
            });
          }
          $internshipTableOne = array_except($internship,'skill');
          $internship_insert = InternshipPreference::create($internshipTableOne);
          if(isset($internship['skill'])){
            foreach ($internship['skill'] as $skill_id => $skill){
              $internship_insert->skills()->attach($skill_id,['expertise'=> $skill]);
            }
          }
        }
        return response()->json([
          'status' => 200,
          'message' => 'Fields updated'
        ]);
      }catch (\Exception $e){
        return response()->json([
          'message' => $e->getMessage(),
          'line'    => $e->getLine()
        ]);
      }
    }
    public function saveStudentQualificationData(Request $request){
      try{
        $qualifications = $request->get('internship');
        $token = $request->session()->get('register_token');
        $user = User::where('token',$token)->get()->first();
        if($qualifications['qualification']){
          $regular_q =  array_except($qualifications['qualification'],'others');
          foreach ($regular_q as $key=>$value){
            if($key && !empty(array_filter($value))){
              $value['type'] = $key;
              $user->student_qualifications()->create(array_filter($value));
            }
          }
          $other_section = array_only($qualifications['qualification'],'others');
          if(isset($other_section) && isset($other_section['others'])){
            foreach ($other_section['others'] as $key => $other){
              if(isset($other) && array_filter($other)){
                foreach ($other as $other_key => $other_value){
                  if(array_filter($other_value)){
                    $other_value['type'] = $key;
                    $user->student_qualifications()->create(array_filter($other_value));
                  }
                }
              }
            }
          }
        }
        return response()->json([
          'status' => 200,
          'message' => 'Qualification details saved'
        ]);
      }catch (\Exception $e){
        return response()->json([
          'status' => 405,
          'message' => $e->getMessage(),
          'line'    => $e->getLine(),
          'code'    => $e->getCode()
        ]);
      }
    }

    public function saveStudentExperienceData(Request $request){
      try{
        $experiences = $request->get('experience');
        $token = $request->session()->get('register_token');
        $user = User::where('token',$token)->get()->first();
        if(isset($experiences) && array_filter($experiences)){
          $main_experience = array_only($experiences,['internship','job']);
          if($main_experience && sizeof($main_experience)>0 && array_filter($main_experience)){
            foreach ($main_experience as $exp_key => $exp_value){
              if(sizeof(array_filter($exp_value)) > 0){
                foreach ($exp_value as $key2 => $exp2){
                  try{
                    if(sizeof(array_filter($exp2)) > 0){
                      $exp2['experience_type'] = $exp_key;
                      if($exp2['company_name']!="" && $exp2['internship_field_id']){
                        $user->experiences()->create(array_filter($exp2));
                      }
                    }
                  }catch (\Exception $ea){
                    return response()->json([
                      'status' => 405,
                      'message' => $ea->getMessage(),
                      'line'    => $ea->getLine()
                    ]);
                  }
                }
              }
            }
          }
          $secondary_experience = array_only($experiences,['project','freelance','training','other']);
          if(isset($secondary_experience) && array_filter($secondary_experience)){
            foreach ($secondary_experience as $s_key => $s_value){
              if(sizeof(array_filter($s_value)) > 0){
                if(isset($s_value['title']) && $s_value['title']!="" && $s_value['job_description']!=""){
                  $s_value['experience_type'] = $s_key;
                  $user->experiences()->create(array_filter($s_value));
                }
              }

            }
          }
        }
        return response()->json([
          'status' => 200,
          'message' => 'Experience data saved successfully'
        ]);
      }catch (\Exception $e){

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
      $states = Helpers::getStates();
      return view('register.company_internship',compact(['internship_fields','states']));
    }

    public function saveCompanyInternshipForm(Request $request){
      try{
        $reg_token = $request->session()->get('register_token');
        $getUser = User::where('token',$reg_token)->get()->first();
        $getCompany = $getUser->company()->get()->first();
        $internshipDetails = $request->get('internship');
        $internshipDefault = $internshipDetails['default'];
        if($internshipDetails['duration_start'] && $internshipDetails['duration_end']){
          if($this->validateDateString($internshipDetails['duration_start']) &&
          $this->validateDateString($internshipDetails['duration_end'])){
            $d_start  = Carbon::createFromFormat('Y-m-d',$internshipDetails['duration_start']);
            $d_end    = Carbon::createFromFormat('Y-m-d',$internshipDetails['duration_end']);

            $diff_month = abs($d_end->diffInMonths($d_start));

            if($diff_month > 0 && $diff_month < 3){
              $internshipDefault['duration'] = "0_3";
            }else if($diff_month >= 3 && $diff_month < 6){
              $internshipDefault['duration'] = "3_6";
            }else if($diff_month >=6 && $diff_month < 9){
              $internshipDefault['duration'] = "6_9";
            }else if($diff_month >=9 && $diff_month < 12){
              $internshipDefault['duration'] = "9_12";
            }else{
              $internshipDefault['duration'] = "1+";
            }
          }
        }
        if($getCompany->internships()->count() == 0){
          $internshipRow = $getCompany->internships()->create($internshipDefault);
        }else{
          $internshipRow = $getCompany->internships()->first()->update($internshipDefault);
        }
        if(isset($internshipDetails['skills']) && sizeof($internshipDetails['skills']) > 0){
          $internship = $getCompany->internships()->get()->first();
          $internship->skills()->detach();
          foreach ($internshipDetails['skills'] as $skill_id => $expertise){
            try{
              $internship->skills()->attach($skill_id,[
                'expertise_level' => $expertise
              ]);
            }catch (\Exception $es){

            }
          }
        }
        if(isset($internshipDetails['qualification']) && sizeof($internshipDetails['qualification']) > 0){
          $qualificationData = $internshipDetails['qualification'];
          $internship = $getCompany->internships()->get()->first();

          $qualification = $internship->qualification()->get()->first();
          if($qualification){
            $qualification->update($qualificationData);
          }else{}
            $internship->qualification()->create($qualificationData);
        }
        return redirect()->route('home');

      }catch (QueryException $q){
        return back()->with(['class'=>'alert-danger','message'=>$q->getMessage()]);

      }catch (\Exception $e){
        return back()->with(['class'=>'alert-danger','message'=>'Unknown errors occured']);
      }

    }



    public function showThanksPage(){
      return view('home.thanks');
    }

    public function showLoginPage(){
    return view('home.login_page');
    }
    public function listInternship(Request $request){
      $internship_fields = InternshipField::all()->toArray();
      $states = Helpers::getStates();
      $internships = [];
      $search_params = array_filter($request->all());
      if($search_params){
        $search_params = array_except($search_params,'stipend');
        if($search_params['type']=='any'){
          $search_params = array_except($search_params,'type');
        }
        if(isset($search_params['duration']) && $search_params['duration']=='any'){
          $search_params = array_except($search_params,'duration');
        }
        $internships = Internship::where($search_params);
        $stipend = explode(",",$request->get('stipend'));
        if(isset($stipend[0]) && isset($stipend[1])){
          $internships = $internships->where('stipend_from','<=', $stipend[1]);
          $internships = $internships->where('stipend_to','>=', $stipend[0]);
        }
        $internships = $internships->paginate(12);
      }else{
        $internships = Internship::paginate(12);
      }

      $min_and_max_stipend = DB::table('internships')
        ->select(DB::raw('MIN(stipend_from) as min_s'), DB::raw('MAX(stipend_to) as max_s'))
        ->first();
      return view('home.internship_list',compact(['internships','internship_fields','states','min_and_max_stipend']));
    }

    public function showInternship($id){
      $internship = Internship::find($id);
      $internship_fields = InternshipField::all()->toArray();
      $states = Helpers::getStates();
      $min_and_max_stipend = DB::table('internships')
        ->select(DB::raw('MIN(stipend_from) as min_s'), DB::raw('MAX(stipend_to) as max_s'))
        ->first();
      return view('home.show_internship',compact(['internship','internship_fields',
      'states','min_and_max_stipend']));
    }


    /* AJAX CALLS FORM REGISTER FORMS */

    public function getSkillsFromId(Request $request){
      try{
        $id = $request->get('id');
        $skills =  InternshipField::find($id)->skills()->get()->toJson();
        $skills = json_decode($skills);
        return response()->json([
          'status' => 200,
          'data'   => $skills?$skills:[]
        ]);
      }catch(\Exception $e){
        return response()->json([
          'status' => 404,
          'data'   => [],
          'error_line' => $e->getLine(),
          'message'    => $e->getMessage()
        ]);
      }
    }

    public function getFieldJson(){
      try{
        $fields = InternshipField::all()->toJson();
        $fields = json_decode($fields);
        return response()->json($fields);
      }catch (\Exception $e){
        return response()->json([]);
      }
    }



  private function validateDateString($value){
    $checkDate = Carbon::createFromFormat('Y-m-d',$value);
    $checkDate = $checkDate->format('Y-m-d');
    return ($checkDate == $value)?$value:null;
  }


}
