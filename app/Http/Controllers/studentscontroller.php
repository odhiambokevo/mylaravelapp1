<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request\Request;
use App\Models\students;
class studentscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = students::OrderBy('id','ASC')->get(); //OR Contact::all()  //get fetches an array of data
        return response()->json($students);
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
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'phone_no'=>'required',
            'email'=>'required',
            'DOB'=>'required',

        ]);

        $store_data=new students;
        $store_data->first_name=$request->first_name;
        $store_data->last_name=$request->last_name;
        $store_data->phone_no=$request->phone_no;
        $store_data->email=$request->email;
        $store_data->DOBs=$request->DOB;
        

        try{
            $store_data->save();
            return response()->json($store_data);
        }catch(\Illuminate\Database\QueryException $e){
            return response()->json(['status'=>'error','message'=>$e->getMessage()]);
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
        $store_data=students::Find('id'); //fetches first record
        $store_data=students::FindorFail('id'); //fetches first record
        $store_data=students::where('id',$request->id)->first(); //fetches first record
        //Use one of the methods above

        $store_data->first_name=$request->last_name;
        $store_data->last_name=$request->last_name;

        $store_data->phone_no=$request->phone_no;
        $store_data->email=$request->email;
        $store_data->DOB=$request->DOB;
        $store_data->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $store_data=students::Find('id');
        $store_data=students::FindorFail('id');
        $store_data=students::where('id',$id)->first();
        $store_data->delete;
    }
}
