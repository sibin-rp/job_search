<?php

namespace App\Http\Controllers\User;


use App\StudentQualification;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Http\Controllers\Controller;

class QualificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $qualifications = $user->normal_qualification();
        return view('user_edit.qualification.index',compact(['user','qualifications']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        //
        $qualification = $request->get('internship')['qualification'];
        $qualification  = array_filter($qualification);
        if(is_array($qualification)){
          $type = key($qualification);
          $qualification = $qualification[$type];
          $qualification['type'] = $type;
          try{
            $user->student_qualifications()->create($qualification);
            return redirect()->route('qualification.index',['user'=>$user]);
          }catch (\Exception $e){
            dd($e->getMessage());
          }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, StudentQualification $qualification)
    {
        //
      return view('user_edit.qualification.edit',compact(['user','qualification']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, StudentQualification $qualification)
    {
        $qualification_data = $request->get('qualification');
        $qualification->update($qualification_data);
        return redirect()->back();
    }

  /**
   * @param User $user
   * @param StudentQualification $qualification
   * @return \Illuminate\Http\RedirectResponse
   */
    public function destroy(User $user, StudentQualification $qualification)
    {
        //
        try{
          if($qualification){
            $qualification->delete();
            return redirect()->back()->with(['message'=>'Successfully deleted','class'=>'alert-success']);
          }
        }catch (\Exception $e){
          return redirect()->back()->with([
            'message' => $e->getMessage(),
            'class'   => 'alert-danger'
          ]);
        }
    }
}
