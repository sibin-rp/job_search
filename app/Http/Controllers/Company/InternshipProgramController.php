<?php

namespace App\Http\Controllers\Company;

use App\Company;
use App\Helpers;
use App\Internship;
use App\InternshipField;
use App\QualificationType;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

use Carbon;

class InternshipProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        //
        $internships = $user->getAllCompaniesInternships($user);
        return view('company.internship_program.index',compact(['user','internships']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        //
        $states = Helpers::getStates();
        $internship_fields = InternshipField::all();
        $companies = $user->company()->get();

        $qualifications = QualificationType::all()->groupBy('qualification')->toArray();
        return view('company.internship_program.create',compact(['user','states','internship_fields','companies','qualifications']));
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
            $internship = $request->get('internship');
            $company = Company::find($internship['company_id']);
            $internshipObject = $company->internships()->create($internship);
            if(isset($internship['skills']) && sizeof($internship['skills']) >0){
                $internshipObject->skills()->detach();
                foreach($internship['skills'] as $skill => $expertise){
                    try{
                        $internshipObject->skills()->attach($skill,[
                          'expertise_level' => $expertise
                        ]);
                    }catch (\Exception $e){
                        dd($e->getMessage());
                    }
                }
            }

            if(isset($internship['qualification'])){
                $qualifications = array_filter($internship['qualification']);
                if($internship['min_qualification']!="any"){
                    try{
                        $qualification_array = $qualifications[$internship['min_qualification']];
                        $qualification_array['qualification'] = $internship['min_qualification'];
                        $internshipObject->qualification()->create($qualification_array);
                    }catch (\Exception $e){
                        dd($e->getMessage());
                    }

                }
            }
            return redirect()->route('internships_program.show',['user'=> $user,
            'internship_program'=> $internshipObject])->with([
              'class'=>'alert-info',
              'message' => 'Internship created successfully.'
            ]);
        }catch (\Exception $e){
            dd($e->getMessage());
        }




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Internship $internship)
    {
        //

        return view('company.internship_program.show',['user'=> $user,'internship'=> $internship])
          ->with(['class'=>'alert-success','message'=>'Internship created successfully']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user,Internship $internship)
    {
        //
        $internship_fields = InternshipField::all();
        $internship_skills = InternshipField::find($internship->internship_field_id)->skills()->get();
        $companies = $user->company->get();
        $states = Helpers::getStates();

        return view('company.internship_program.edit',
          compact(['internship','user','internship_fields','companies','states','internship_skills']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user,Internship $internshipObject, Request $request)
    {
        //
        try{
            $internship = $request->get('internship');

            $internshipObject->update($internship);

            // add skills
            if(isset($internship['skills'])){
                $internshipObject->skills()->detach();
                foreach($internship['skills'] as $key => $value){
                    try{
                        $internshipObject->skills()->attach($key,[
                          'expertise_level' => $value
                        ]);
                    }catch (\Exception $e){
                        dd($e->getMessage());
                    }
                }
            }
            // add qualification
            if(isset($internship['qualification'])){

                $qualifications = array_filter($internship['qualification']);

                if($internship['min_qualification']!="any"){

                    try{
                        $internshipObject->qualification()->delete();
                        $qualification_array = $qualifications[$internship['min_qualification']];
                        $qualification_array['qualification'] = $internship['min_qualification'];
                        $internshipObject->qualification()->create($qualification_array);
                    }catch (\Exception $e){
                        dd($e->getMessage());
                    }

                }
            }
            return redirect()->route('internships_program.show',[
                'user' => $user,
                'internship_program' => $internshipObject
            ])->with([
                'class' => 'alert-success',
                'message' => 'Internship updated successfully'
            ]);
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
    public function destroy(User $user,Internship $internship)
    {
        //

        try{
            $internship->delete();
            return back();
        }catch(\Excepion $e){
            dd($e->getMessage());
            return back();
        }

    }

    private function validateDateString($value){
        $checkDate = Carbon::createFromFormat('Y-m-d',$value);
        $checkDate = $checkDate->format('Y-m-d');
        return ($checkDate == $value)?$value:null;
    }
}
 