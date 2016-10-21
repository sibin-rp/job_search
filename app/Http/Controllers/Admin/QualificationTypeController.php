<?php

namespace App\Http\Controllers\Admin;

use App\QualificationType;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class QualificationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return QualificationType::all()->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        return response()->json($request->all());
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
        try{
            QualificationType::create($request->all());
            return response()->json([
                'status' => 200,
                'message' => 'Qualification type created successfully'
            ]);
        }catch (\Exception $e){
            return response()->json([
                'status'   => 405,
                'message'  => $e->getMessage(),
                'line'     => $e->getLine()
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
        //
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
        //
        try{
            $qualification_type = QualificationType::find($id);
            $qualification_type->update($request->all());
            return response()->json([
              'status' => 200,
              'message' => 'Hello'
            ]);
        }catch (\Exception $e){
            return response()->json([
              'status'  => 405,
              'message' =>  $e->getMessage(),
              'line'    => $e->getLine()
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
            QualificationType::destroy($id);
            return response()->json([
              'status' => 200,
              'message' => "Qualification Type deleted successfully"
            ]);
        }catch (\Exception $e){
            return response()->json([
                'status' => 405,
                'message' => $e->getMessage(),
                'line'    => $e->getLine()
            ]);
        }
    }
}
