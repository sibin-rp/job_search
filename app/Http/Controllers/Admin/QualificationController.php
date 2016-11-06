<?php

namespace App\Http\Controllers\Admin;


use App\StudentQualification;
use App\Http\Controllers\Controller;
use App\User;

class QualificationController extends Controller
{
    //

  public function index(User $user){
    try{
      return StudentQualification::where(['user_id'=> $user->id])->get();
    }catch (\Exception $e){
      return response()->json([]);
    }
  }
}
