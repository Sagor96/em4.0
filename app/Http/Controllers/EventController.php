<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;        
use Illuminate\Support\Facades\Validator;
use App\Models;
use App\Models\Service;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $events = \App\Models\Event::all();


        return view('events.event', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.event');
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
        'e_date'        =>'required',
        'e_name'        =>'required',
        'catagory_id'   =>'required',
      ];

      $validator = Validator::make($request->all(), $rules);

      if ($validator->fails()) {
          return redirect()->back()->withErrors($validator)->withInput();
      }

      //insert to database
      //\App\Models\Lead::create($request->all());
      \App\Models\Event::create([
          'e_date'              => $request->input('e_date'),
          'e_name'              => $request->input('e_name'),
          'e_desc'              => $request->input('e_desc'),
          'catagory_id'         => $request->input('catagory_id'),
          'service_id'          => implode(',',$request->service_id),

      ]);

      //redirect
      session()->flash('type', 'success');
      session()->flash('message', 'Event create Successfully');

      return redirect()->route('home');

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
