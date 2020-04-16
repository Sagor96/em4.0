@extends('layouts.dash')

@section('title','Venues')

@section('header','Venues List')

@section('main-content')

    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100">New Venue</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="{{ route('bookvenues.store') }}" method="post">
              @csrf

              @if ($errors->any())
                  <div class="alert alert-danger">
                  @if($errors->count()==1)
                    {{ $errors->first() }}
                  @else
                      <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                        @endif
                    </div>
              @endif

              @if(session()->has('message'))
                  <div class="alert alert-success">
                      {{ session('message') }}
                  </div>
              @endif
              <div class="box-body">
              	<div class="form-group">
                      <label for="event_id">Event</label>
                      <select name="events_id" class="form-control">
            <!-- <option selected="selected" >---Select a Hosting Type---</option> -->
            <?php 
            $events=DB::table('events')->get(); ?>
              @foreach($events as $event)
              <option value="{{ $event->id }}">{{ $event->event_title }}</option>
              @endforeach

            </select>
                  </div>
                  <div class="form-group">
                      <label for="VenueName">Venue Name</label>
                      <select name="service_id" class="form-control">
            <!-- <option selected="selected" >---Select a Hosting Type---</option> -->
            <?php 
            $slug='venue';
            $services=\App\Models\Service::where('slug',$slug)->get(); ?>
              @foreach($services as $service)
              <option value="{{ $service->id }}">{{ $service->name }}</option>
              @endforeach

            </select>
                  </div>
                  <div class="form-group">
              <label for="g_count">Guest No</label>
              <input type="text" class="form-control" id="g_count" placeholder="" name="g_count" value="{{ old('g_count') }}">
          </div>
              </div>
                <!-- /.box-body -->

                <div class="box-footer">

                <button type="submit" class="btn btn-success">Save</button>

                </div>
            </form>

      </div>

     </div>
<!-- Central Modal Small -->

@stop