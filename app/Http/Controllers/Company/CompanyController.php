<?php

namespace App\Http\Controllers\Company;

use App\Company;
use App\Helpers;
use App\InternshipField;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use League\OAuth1\Client\Server\User;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $companies = $user->company()->get();
        return view('company.company.index',compact(['companies','user']));
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
    public function show(Company $company)
    {
        //
        $user = Auth::user();
        return view('company.company.show',compact(['company','user']));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $user = Auth::user();

        $states = Helpers::getStates();
        $fields = InternshipField::all();
        return view('company.company.edit',compact(['user','company','states','fields']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Company $company,Request $request)
    {
        //
        try {
            $company_update = $request->get('company');
            $company_data_update = $company->update($company_update);

            // File Upload

            $c_logo = $request->file('company_logo');
            if(isset($c_logo) && $c_logo->isValid()){
                $c_logo_ext = $c_logo->getClientOriginalExtension();
                if(!(Storage::disk('local')->exists('public/company'))){
                    Storage::makeDirectory('public/company');
                }
                $c_logo_name = "company-$company->id-logo.$c_logo_ext";
                Storage::putFileAs('public/company',$c_logo,$c_logo_name,'public');
                $company->update([
                   'logo' => asset('storage/company/'.$c_logo_name)
                ]);
            }


            return redirect()->route('company.show',['company'=>$company]);
        } catch (\Exception $e) {
            dd($e->getMessage());

            return back()->withInput()->with(['class'=>'alert-danger','message'=>$e->getMessage()]);
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {

        //
        try{
            $company->delete();
        }catch (\Exception $e){
            return back()->with(['class'=>'alert alert-danger','message'=>'Company deleted successfully']);
        }

    }

    public function logo_upload(Request $request){

    }
}
