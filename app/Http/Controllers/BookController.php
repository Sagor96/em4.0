<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Models;
use DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['books'] = \App\Models\Book::with('user','services','event')->select('id','user_id','service_id', 'g_count','qty','m_type')->orderBy('id')->get();
             return view('books.book', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['venues']     = \App\Models\Venue::get();
        $data['foods']      = \App\Models\Food::get();
        $data['equipments'] = \App\Models\Equipment::get();
        $data['flowers']    = \App\Models\Flower::get();
        $data['lights']     = \App\Models\Light::get();
        $data['services']   = \App\Models\Service::get();
        return view('books.bookAdd', $data);
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

            'eventdate'            => 'required|unique:books',


        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        
        \App\Models\Book::create([
            'eventdate'         => $request->input('eventdate'),
            'venue_id'          => $request->input('venue_id'),
            'm_type'            => $request->input('m_type'),
            'food_id'           => implode(',',$request->food_id),
            'equipment_id'      => implode(',',$request->equipment_id),
            'flower_id'         => implode(',',$request->flower_id),
            'light_id'          => implode(',',$request->light_id),
            'service_id'        => implode(',',$request->service_id),
        ]);

        //redirect
        session()->flash('type', 'success');
        session()->flash('message', 'Wish done Successfully');

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
