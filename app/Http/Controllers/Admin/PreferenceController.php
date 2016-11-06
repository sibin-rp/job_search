<?php

namespace App\Http\Controllers\Admin;

use App\InternshipPreference;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PreferenceController extends Controller
{
    //
  public function index(User $user){
    try{
      return InternshipPreference::with('skills','internship_field')->where(['user_id'=>$user->id])
        ->get();
    }catch (\Exception $e){
      return response()->json([]);
    }
  }
}
