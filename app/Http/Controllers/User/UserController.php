<?php

namespace App\Http\Controllers\User;

use App\Helpers;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        return view('user.show',compact(['user']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $states = Helpers::getStates();
        return view('user.edit',compact(['user','states']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)

    {
        try{
            $user_fields = $request->get('user');
            $user_fields = array_filter($user_fields);
            $user->update($user_fields);
            return redirect()->route('user.show',$user->id)
              ->with(['class'=>'alert-success','message'=>'User updated successfully']);
        }catch (\Exception $e){
            dd($e);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function user_profile_upload(User $user, Request $request){
        try{
            if(!$request->hasFile('logo') && !$request->file('logo')->isValid()) throw new \Exception("FIle not supplied");
            $logo_file = $request->file('logo');

            $logo_ext = $logo_file->getClientOriginalExtension();

            if(!(Storage::disk('local')->exists('public/profile-images'))){
                Storage::makeDirectory('public/profile-images');
            }

            $logo_name = "profile-$user->id.$logo_ext";
            Storage::putFileAs('public/profile-images',$logo_file,$logo_name,'public');
            $user->update([
              'profile_image' => asset('storage/profile-images/'.$logo_name)
            ]);
            return response()->json([
              'status' => 200,
              'message' => 'Profile image saved successfully'
            ]);
        }catch (\Exception $e){
            return response()->json([
              'status' => 405,
              'message' => $e->getMessage()
            ]);
        }
    }
}
