<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class APIController extends Controller
{
    //
  public function __construct(){

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
}
