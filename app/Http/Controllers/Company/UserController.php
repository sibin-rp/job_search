<?php

namespace App\Http\Controllers\Company;

use App\Helpers;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
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
        //
        return view('company.user.show',compact(['user']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $states = Helpers::getStates();
        return view('company.user.edit',compact(['user','states']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user,Request $request)
    {
        //
        try{
            $company_user = $request->get('company');
            $company_user = array_filter($company_user);
            $user->update($company_user);
            return redirect()->route('company_user.show',['user'=> $user])->with(['class'=>'alert-success',
            'messsage'=> "User data updated successfully"]);
        }catch (\Exception $e){
            dd($e->getMessage());
            return back()->with(['class'=>'alert-warning','message'=> $e->getMessage()]);
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

    public function profile_upload(User $user, Request $request){
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
