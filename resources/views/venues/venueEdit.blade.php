@extends('layouts.dash')

@section('title','VenueUpdate')

@section('header','Venue Update')

@section('main-content')


      <div class="row">
        <div class="col-md-6">
          <h1 style="display: inline-block;">Edit Venue</h1>
        </div>
        <div class="col-md-6">
          <div class="add-new">
            <a href="{{route('venues.index')}}" class="btn btn-success">
              Venues List
            </a>
          </div>
        </div>
      </div>
      <hr>
      <hr>
  <div class="row p-3">
    <div class="col-xs-12">
      
        <div class="box box-primary">
                <!-- form start -->
           <form role="form" action="{{ route('venues.update', $venues->id) }}" method="post">
              @csrf
              @method('PUT')

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
                    <label for="name"> Name </label>
                    <select name="service_id" class="form-control">

                        @foreach($services as $service)
                        <option value="{{ $service->id }}" @if($service->id==$venues->service_id) selected='selected' @endif>

                          {{ $service->name }}

                        </option>
                        @endforeach

                      </select>
                </div>
                <div class="form-group">
                    <label for="v_addr">Address</label>
                    <input type="text" class="form-control" id="v_addr" placeholder="Address" name="v_addr" value="{{ $venues->v_addr }}">
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success">Update</button>
                
              </div>
            </form>
        </div>
      
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

@stop

