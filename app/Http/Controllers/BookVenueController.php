<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models;
use DB;

class BookVenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['book_venues'] = \App\Models\BookVenue::with('service','events')->select('id','user_id', 'events_id','service_id', 'g_count')->orderBy('id')->get();
             return view('venues.bvenue', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slug='venue';
        $data = [];
        $data['services'] = \App\Models\Service::where('slug',$slug)->get();
        $data['events'] = \App\Models\Event::all();
        return view('venues.add', $data);
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

            'events_id'            => 'required',
            'service_id'            => 'required',
            'g_count'               => 'required|integer',


        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        
        \App\Models\BookVenue::create([
            'user_id'    => $request->input( Auth::user()->id),
            'events_id' => $request->input('events_id'),
            'service_id'    => $request->input('service_id'),
            'g_count' => $request->input('g_count'),
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
