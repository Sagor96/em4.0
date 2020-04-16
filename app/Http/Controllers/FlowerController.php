<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models;

class FlowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['flowers'] = \App\Models\Flower::with('service')->select('id','service_id','color')->orderBy('id')->get();
             return view('flowers.flower', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slug='flower';
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

            'service_id'    => 'required',
            'color'         => 'required'

        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        
        \App\Models\Flower::create([
            'service_id'    => $request->input('service_id'),
            'color' => $request->input('color'),
        ]);

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Flower added Successfully');

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
        $slug='flower';
        $data = [];
        $data['services'] = \App\Models\Service::where('slug',$slug)->get();

        $data['flowers'] = \App\Models\Flower::select('id','service_id', 'color')->find($id);

        return view('flowers.flowerEdit', $data);
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
            'color'       => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //insert to database
        $fl = \App\Models\Flower::find($id);
        $fl->update([
            'service_id'          => $request->input('service_id'),
            'color'               => $request->input('color'),
        ]);

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Flower Updated Successfully.');

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
        $Flower = \App\Models\Flower::find($id);
        $Flower->delete();

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Flower Deleted Successfully.');

        return redirect()->back();
    }

    public function client()
    {
        $data = [];
        $data['flowers'] = \App\Models\Flower::with('service')->select('id','service_id','color')->orderBy('id')->get();
             return view('flowers.flowerShow', $data);
    }
}
