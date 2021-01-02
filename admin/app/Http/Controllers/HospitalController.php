<?php

namespace App\Http\Controllers;

use App\Models\hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
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
        return view('hospital_create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res=new hospital;
        $res->h_name=$request->input('name');
        $res->h_latitude=$request->input('lat');
        $res->h_longitude=$request->input('long');
        $res->save();
        $request->session()->flash('msg','Data successfully entered');
        echo 'érr';
        return redirect('hospital_show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function show(hospital $hospital)
    {
        return view('hospital_show')->with('hosp',hospital::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function edit(hospital $hospital,$id)
    {
        return view('hospital_edit')->with('hosp',hospital::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hospital $hospital)
    {
        $res=hospital::find($request->id);
        $res->h_name=$request->input('name');
        $res->h_latitude=$request->input('lat');
        $res->h_longitude=$request->input('long');
        $res->save();
        $request->session()->flash('msg','updated');
        return redirect('hospital_show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,hospital $hospital,$id)
    {
        hospital::destroy(array('id',$id));
        $request->session()->flash('msg','Deleted successfully');
        return redirect('hospital_show');
    }
}
