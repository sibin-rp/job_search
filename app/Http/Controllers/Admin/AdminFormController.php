<?php

namespace App\Http\Controllers\Admin;

use App\InternshipField;
use App\Skill;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminFormController extends Controller
{
    //


  public function saveSkillsByField(Request $request){
    try{

      if($request->get('id')==null && is_array($request->get('data')==false)) throw new \Exception("Required params are missing");

      $get_internship = InternshipField::find($request->get('id'));
      foreach($request->get('data') as $data){
        $get_internship->skills()->create(['name' => $data['text']]);
      }
      return response()->json([
        'status' => 200,
        'message' => 'Skills saved successfully'
      ]);
    }catch (\Exception $e){
      return response()->json(['status'=> 405,'message'=> $e->getMessage()]);
    }

  }

  public function deleteSkillById(Request $request){
    try{
      if(!$request->get('id')) throw new \Exception("Skill ID required");
      $skill = Skill::destroy($request->get('id'));
      if($skill){
        return response()->json(['status'=> 200,'message'=>'Skill deleted']);
      }else{
        return response()->json(['status'=> 405,'message'=>'Skill may be already deleted']);
      }
    }catch (\Exception $e){
      return response()->json(['status'=> 405,'message'=> $e->getMessage()]);
    }
  }

}
