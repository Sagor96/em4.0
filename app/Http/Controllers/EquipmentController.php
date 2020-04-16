<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = [];
        $data['equipments'] = \App\Models\Equipment::with('service')->select('id','service_id','provider')->orderBy('id')->get();
             return view('equipments.equipment', $data);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slug='equipment';
        $data = [];
        $data['services'] = \App\Models\Service::where('slug',$slug)->get();
        return view('equipments.equipment', $data);
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
            'provider'         => 'required'

        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        
        \App\Models\Equipment::create([
            'service_id'    => $request->input('service_id'),
            'provider' => $request->input('provider'),
        ]);

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Equipment added Successfully');

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
        $slug='equipment';
        $data = [];
        $data['services'] = \App\Models\Service::where('slug',$slug)->get();

        $data['equipments'] = \App\Models\Equipment::select('id','service_id', 'provider')->find($id);

        return view('equipments.equipmentEdit', $data);
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
            'provider'       => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //insert to database
        $fl = \App\Models\Equipment::find($id);
        $fl->update([
            'service_id'          => $request->input('service_id'),
            'provider'               => $request->input('provider'),
        ]);

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Equipment Updated Successfully.');

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
        $Equipment = \App\Models\Equipment::find($id);
        $Equipment->delete();

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Equipment Deleted Successfully.');

        return redirect()->back();
    }
}
