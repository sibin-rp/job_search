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
        $companies = $user->company->get();

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
        $companies = $user->company->get();
        $states = Helpers::getStates();

        return view('company.internship_program.edit',
          compact(['internship','user','internship_fields','companies','states']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    private function validateDateString($value){
        $checkDate = Carbon::createFromFormat('Y-m-d',$value);
        $checkDate = $checkDate->format('Y-m-d');
        return ($checkDate == $value)?$value:null;
    }
}
