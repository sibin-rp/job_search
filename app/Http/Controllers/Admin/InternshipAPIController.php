<?php

namespace App\Http\Controllers\Admin;

use App\Internship;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InternshipAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{
            $pagination = json_decode($request->get('pagination'));
            $internship_count = Internship::all()->count();
            $internship = Internship::skip($pagination->start)
              ->take($pagination->number)->get()->toArray();
            return response()->json([
              'status' => 200,
              'totalItemCount' => $internship_count,
              'numberOfPages'  => ceil($internship_count/$pagination->number),
              'data' => $internship
            ]);
        }catch (\Exception $e){
            return response()->json([
                'status' => 405,
                'data' => [],
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Internship $internship)
    {

      try{
          $internship_data = Internship::with('internship_field','skills','company','company.user')->find($internship->id);
          return response()->json([
            'status' => 200,
            'data'   => $internship_data
          ]);
      }catch (\Exception $e){
          return response()->json([
              'status' => 405,
              'message' => $e->getMessage(),
              'data'=> []
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
}
