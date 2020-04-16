<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['services'] = \App\Models\Service::select('id','name','slug','details','price','weight')->orderBy('id')->get();
        return view('services.service', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        return view('services.service', $data);
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
            'name'          => 'required',
            'slug'          => 'required',
            'details'       => 'required',
            'price'         => 'required|integer',
            'weight'         => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //insert to database
        \App\Models\Service::create([
            'name'       => $request->input('name'),
            'slug'       => $request->input('slug'),
            'details'    => $request->input('details'),
            'price'      => $request->input('price'),
            'weight'     => $request->input('weight'),
        ]);

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Service added Successfully');

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
        $services=\App\Models\Service::where('id',$id)->firstOrFail();
    return view('services.serviceShow')->with('services',$services);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [];
        $data['services'] = \App\Models\Service::select('id','name','slug','details','price','weight')->orderBy('id')->find($id);
        return view('services.serviceEdit', $data);
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
            'name'       => 'required',
            'slug'       => 'required',
            'details'       => 'required',
            'price'         => 'required',
            'weight'         => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //insert to database
        $services = \App\Models\Service::find($id);
        $services->update([
            'name'       => $request->input('name'),
            'slug'       => $request->input('slug'),
            'details'    => $request->input('details'),
            'price'      => $request->input('price'),
            'weight'     => $request->input('weight'),
        ]);

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Service Updated Successfully.');

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
        $service = \App\Models\Service::find($id);
        $service->delete();

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Service Deleted Successfully.');

        return redirect()->back();
    }
}
