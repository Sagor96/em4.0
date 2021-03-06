<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['venues'] = \App\Models\Venue::with('service')->select('id','service_id','v_addr')->orderBy('id')->get();
             return view('venues.venue', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $slug='venue';
        $data['services'] = \App\Models\Service::where('slug',$slug)->get();
        return view('venues.venue', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //validate 
        $rules = [

            'service_id'    => 'required',
            'v_addr'         => 'required'

        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        
        \App\Models\Venue::create([
            'service_id'    => $request->input('service_id'),
            'v_addr' => $request->input('v_addr'),
        ]);

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Venue added Successfully');

        return redirect()->back();
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
        $slug='venue';
        $data = [];
        $data['services'] = \App\Models\Service::where('slug',$slug)->get();

        $data['venues'] = \App\Models\Venue::select('id','service_id', 'v_addr')->find($id);

        return view('venues.venueEdit', $data);
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
        //validate
        $rules = [
            'service_id'       => 'required',
            'v_addr'       => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //insert to database
        $fl = \App\Models\Venue::find($id);
        $fl->update([
            'service_id'          => $request->input('service_id'),
            'v_addr'               => $request->input('v_addr'),
        ]);

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Venue Updated Successfully.');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Venue = \App\Models\Venue::find($id);
        $Venue->delete();

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Venue Deleted Successfully.');

        return redirect()->back();
    }
}
