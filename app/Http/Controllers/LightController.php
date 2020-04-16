<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models;

class LightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['lights'] = \App\Models\Light::with('service')->select('id','l_type','service_id')->orderBy('id')->get();
             return view('lights.light', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slug='light';
        $data = [];
        $data['services'] = \App\Models\Service::where('slug',$slug)->get();
        return view('flowers.flower', $data);
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

            'l_type'         => 'required',
            'service_id'    => 'required',

        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        
        \App\Models\Light::create([
            'l_type'        => $request->input('l_type'),
            'service_id'    => $request->input('service_id'),
            
        ]);

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Light added Successfully');

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
         $slug='light';
        $data = [];
        $data['services'] = \App\Models\Service::where('slug',$slug)->get();

        $data['lights'] = \App\Models\Light::select('id','l_type','service_id')->find($id);

        return view('lights.lightEdit', $data);
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
            'l_type'       => 'required',
            'service_id'       => 'required',
            
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //insert to database
        $fl = \App\Models\Light::find($id);
        $fl->update([
            'l_type'               => $request->input('l_type'),
            'service_id'            => $request->input('service_id'),
            
        ]);

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Light Updated Successfully.');

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
        $Light = \App\Models\Light::find($id);
        $Light->delete();

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Light Deleted Successfully.');

        return redirect()->back();
    }
}
