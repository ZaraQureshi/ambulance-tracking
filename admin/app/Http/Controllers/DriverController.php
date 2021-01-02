<?php

namespace App\Http\Controllers;

use App\Models\driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard')->withArticles(driver::my_complex_query());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('driver_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res=new driver;
        $res->d_name=$request->input('name');
        $res->d_email=$request->input('email');
        $res->d_contact=$request->input('contact');
        $res->d_latitude=$request->input('lat');
        $res->d_longitude=$request->input('long');
        $res->d_password=$request->input('password');
        $res->save();
        return redirect('driver_show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(driver $driver)
    {
        return view('driver_show')->with('driverArr',driver::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(driver $driver,$id)
    {
        return view('driver_edit')->with('driverArr',driver::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, driver $driver)
    {
        $res=driver::find($request->id);
        $res->d_name=$request->input('name');
        $res->d_email=$request->input('email');
        $res->d_contact=$request->input('contact');
        $res->d_latitude=$request->input('lat');
        $res->d_longitude=$request->input('long');
        
        $res->save();
        
        $request->session()->flash('msg','updated');
        return redirect('driver_show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(driver $driver,Request $request,$id)
    {
        driver::destroy(array('id',$id));
        $request->session()->flash('msg','Deleted');
        return redirect('driver_show');
    }
}
