<?php

namespace App\Http\Controllers\User;

use App\Experience;
use App\Internship;
use App\InternshipField;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user, Request $request)
    {
        $experience = null;
        if($request->get('exp_type')){
            $experience = $user->experiences()->where(['experience_type'=> $request->get('exp_type')])->get();
        }
        return view('user_edit.experience.index',compact(['user','experience']));
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
        return view('user_edit.experience.create',compact(['user','internship_fields']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user,Request $request)
    {
        //
        try{
            $experience = $request->get('experience');
            $experience = array_filter($experience);

            //dd($experience);
            $user->experiences()->create($experience);

            return redirect()->route('experience.index',[
                'user' => $user
            ])->with(['class'=>'alert-success','message' => 'Experience added successfully']);
        }catch (\Exception $e){
            var_dump($e->getLine());
            dd($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user,Experience $experience)
    {
        //

        return view('user_edit.experience.show',compact(['user','experience']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user,Experience $experience)
    {
        //
        $internship_fields = InternshipField::all();
        return view('user_edit.experience.edit',compact([
            'user','experience','internship_fields'
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user, Experience $experience)
    {
        //
        try{
            $experience_data = $request->get('experience');
            $experience_data = array_filter($experience_data);
            $experience->update($experience_data);
            return redirect()->route('experience.show',['user'=> $user,'experience'=> $experience])
              ->with(['class'=>'alert-success','Experience updated successfully']);
        }catch (\Exception $e){
            dd($e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user,$id)
    {
        //
    }
}
