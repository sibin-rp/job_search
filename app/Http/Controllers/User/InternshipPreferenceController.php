<?php

namespace App\Http\Controllers\User;

use App\InternshipField;
use App\InternshipPreference;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InternshipPreferenceController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(User $user)
  {
    //
    $preferences = $user->internship_preferences();

    return view('user_edit.preference.index', compact(['preferences', 'user']));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(User $user)
  {
    //
    $internship_fields = InternshipField::all();
    return view('user_edit.preference.create', compact(['user', 'internship_fields']));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(User $user, Request $request)
  {
    //
    if($request->get('preference') &&
      sizeof(array_filter($request->get('preference')))){
      $form_data = $request->get('preference');
      $preferences_only = array_except($form_data,'skill');
      $skills = ($form_data['skill']);
      try{
        $user_preferences = $user->internship_preferences()->create($preferences_only);
        if(is_array(array_filter($skills)) && sizeof(array_filter($skills))){
          foreach(array_filter($skills) as $skill => $expert){
            $user_preferences->skills()->attach($skill,['expertise'=>$expert]);
          }
        }
        return redirect()->route('preference.index',['user'=> $user])
          ->with(['class'=>'alert-danger','message'=>'Internship saved successfully']);
      }catch (\Exception $e){
        dd($e->getMessage());
      }
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function show(User $user, InternshipPreference $preference)
  {
    //
    return view('user_edit.preference.show', compact(['user', 'preference']));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function edit(User $user, InternshipPreference $preference)
  {
    //
    $internship_fields = InternshipField::all();
    $available_skills =  InternshipField::find($preference->internship_field_id)
      ->skills()->get();
    return view('user_edit.preference.edit',compact(['user','preference','internship_fields','available_skills']));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, User $user, InternshipPreference $preference)
  {
    //
    if($request->get('preference') &&
      sizeof(array_filter($request->get('preference')))){
      $form_data = $request->get('preference');
      $preferences_only = array_except($form_data,'skill');
      $skills = ($form_data['skill']);
      try{
        $user_preferences = $preference->update($preferences_only);
        if(is_array(array_filter($skills)) && sizeof(array_filter($skills))){
          if(count($preference->skills) > 0){
            $preference->skills()->detach();
          }
          foreach(array_filter($skills) as $skill => $expert){
            $preference->skills()->attach($skill,['expertise'=>$expert]);
          }
        }
        return view('user_edit.preference.show',['user'=> $user,'preference'=> $preference])
          ->with(['class'=>'alert-danger','message'=>'Internship updated successfully']);
      }catch (\Exception $e){
        dd($e->getMessage());
      }
    }

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
