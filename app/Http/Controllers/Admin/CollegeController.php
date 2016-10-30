<?php

namespace App\Http\Controllers\Admin;

use App\College;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $colleges = College::orderBy('name','ASC')->get()->toJson();
            return $colleges;
        }catch (\Exception $e){
            return response()->json($e);
        }
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
        try{
            $college = $request->all();
            College::create($college);
            return response()->json([
                'status' => 200,
                'message' => 'College added successfully'
            ]);
        }catch (\Exception $e){
            return response()->json([
               'status' => 200,
               'message' => $e->getMessage()
            ]);
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
        try{
            $college = College::find($id);
            if($college){
                return response()->json([
                  'status' => 200,
                  'data'   => $college
                ]);
            }else{
                throw new \Exception("Selected College not found");
            }
        }catch (\Exception $e){
            return response()->json([
                'status' => 405,
                'data'   => [],
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        try{
            $college = $request->except('id');
            $college_obj = College::find($id)->update($college);
            if($college_obj){
                return response()->json([
                   'status' => 200,
                    'message' => 'College updated successfully'
                ]);
            }else{
                throw new \Exception("College update failed");
            }
        }catch (\Exception $e){
            return response()->json([
                'status' => 405,
                'message' => $e->getMessage()
            ]);
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

        try{
            College::destroy($id);
            return response()->json([
                'status' => 200,
                'message' => 'College deleted successfully'
            ]);
        }catch (\Exception $e){
            return response()->json([
                'status' => 405,
                'message' => $e->getMessage()
            ]);
        }
    }
}
