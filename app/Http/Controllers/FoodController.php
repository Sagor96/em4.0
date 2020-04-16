<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['foods'] = \App\Models\Food::with('service')->select('id','m_type','dishtype_id','service_id')->orderBy('id')->get();
             return view('foods.food', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slug='food';
        $data = [];
        $data['services'] = \App\Models\Service::where('slug',$slug)->get();
        return view('foods.food', $data);
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
            'm_type'    => 'required',
            'dishtype_id'    => 'required',
            'service_id'    => 'required',

        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        
        \App\Models\Food::create([
            'm_type'    => $request->input('m_type'),
            'dishtype_id'    => $request->input('dishtype_id'),
            'service_id'    => $request->input('service_id'),
        ]);

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Food added Successfully');

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
        $slug='food';
        $data = [];
        $data['services'] = \App\Models\Service::where('slug',$slug)->get();

        $data['foods'] = \App\Models\Food::select('id','m_type','dishtype_id','service_id')->find($id);

        return view('foods.foodEdit', $data);
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
            'm_type'         => 'required',
            'dishtype_id'    => 'required',
            'service_id'     => 'required',

            
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //insert to database
        $fl = \App\Models\Food::find($id);
        $fl->update([
            'm_type'          => $request->input('m_type'),
            'dishtype_id'          => $request->input('dishtype_id'),
            'service_id'          => $request->input('service_id'),
            
        ]);

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Food Updated Successfully.');

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
         $Food = \App\Models\Food::find($id);
        $Food->delete();

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Food Deleted Successfully.');

        return redirect()->back();
    }
}
