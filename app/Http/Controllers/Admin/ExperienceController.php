<?php

namespace App\Http\Controllers\Admin;

use App\Experience;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExperienceController extends Controller
{
    //
  public function index(User $user){
    try{
      return Experience::with('internship_field')->where(['user_id'=>$user->id])->get();
    }catch (\Exception $e){
      return response()->json([]);
    }
  }
}
