<?php

namespace App\Http\Controllers;

use App\College;
use App\Company;
use App\Helpers;
use App\User;
use App\Internship;
use Illuminate\Http\Request;

use App\Http\Requests;

class APIController extends Controller
{
    //
  public function __construct(){

  }

  public function getInternshipListJson(){
    try{
      $internships = Internship::take(10)->with('internship_field','skills','company')->get();
      if($internships->count() > 0){
        return response()->json([
          'status' => 200,
          'data'   => json_decode($internships)
        ]);
      }else{
        return response()->json([
          'status' => 400,
          'data'    => []
        ]);
      }
    }catch (\Exception $e){
      return response()->json([
        'status' => 405,
        'message' => $e->getMessage()
      ]);
    }
  }

  public function getUsers(){
    $users = User::where('admin','!=',true)->orderBy('created_at','DESC')->get();
    return response()->json($users);
  }

  public function getCompanies(){
    $companies = Company::all()->toJson();
    if($companies){
      return $companies;
    }else{
      return [];
    }
  }


  public function getInternshipFields(){
    $internship_fields = [];
    try{
      $internship_fields =  InternshipField::all();
      return response()->json([
        'status' => 200,
        'data'    => $internship_fields
      ]);
    }catch(\Exception $e){
      return response()->json([
        'status' => 401,
        'data'   => []
      ]);
    }
  }


  public function getStates(){
    try{
      $states = Helpers::getStates();
      return response()->json([
        'status' => 200,
        'data'   => $states
      ]);
    }catch (\Exception $e){
      return response()->json([
        'status' => 405,
        'data'   => [],
        'message' => $e->getMessage()
      ]);
    }
  }

  public function companyName ($search=null){
    $search = trim($search);
    try{
      if($search){
        $colleges = College::orderBy('name','ASC')->where('name','like','%'.$search.'%')->take(20)->get();
      }else{
        $colleges = College::orderBy('name','ASC')->take(20)->get();
      }

      return response()->json($colleges);
    }catch (\Exception $e){
      return response()->json([]);
    }
  }
}
