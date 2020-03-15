@extends('layouts.dash')

@section('title','Event')

@section('header','Event')

@section('main-content')

<div class="row">
        <div class="col-md-6">
          <h1 style="display: inline-block;">Create An Event</h1>
        </div>
@can('isAdmin')
		<div class="col-md-6">
          <div class="add-new">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#eModalSm">
              Event List
            </button>
          </div>
        </div>
        @endcan
      </div>
      <hr>
      <hr>

   <!-- Main content -->

  <div class="row p-3">
    <div class="col-xl-12">
      
     <form role="form" action="{{ route('events.store') }}" method="post">
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
                    <div class="box-body p-3">
                        <div class="form-group">
                            <label for="e_date">Date</label>
                            <input type="date" class="form-control" id="e_date" placeholder="" name="e_date" value="{{ old('e_date') }}">
                        </div>

                        <div class="form-group">
                            <label for="e_name">Event Name</label>
                            <input type="text" class="form-control" id="e_name" placeholder="" name="e_name" value="{{ old('e_name') }}">
                        </div>

                        <div class="form-group">
                            <label for="e_desc">Event Description</label>
                            <input type="text" class="form-control" id="e_name" placeholder="" name="e_desc" value="{{ old('e_desc') }}">
                        </div>

                        <div class="form-group">
                            <label for="c_name">Event Catagory</label>
                            <select name="catagory_id" class="form-control">
            <!-- <option selected="selected" > -->
                              <?php $catagories=\App\Models\Catagory::all(); ?>      @foreach($catagories as $catagory)
                              <option value="{{ $catagory->id }}">{{ $catagory->c_name }}</option>
                              @endforeach
                            </select>
        
                        </div>

                        <div class="form-group">
                    		<label for="InterestedServices">Interested Services</label><br>
                    		<?php $services=\App\Models\Service::OrderBy('id')->take(4)->get(); ?>
                    		@foreach($services as $service)
                    	<span class="checkbox-input">
                    		<input type="checkbox" class="form-check-input" name="service_id[]" value="{{$service->s_name}}"> 
                    		<label>{{$service->s_name}}</label></span>
                    		<br>
                   		 @endforeach


                </div>

                 </div>
                <!-- /.box-body -->

                <div class="box-footer">

                  <button type="submit" class="btn btn-success">Save</button>

                </div>
            </form>
    <!-- /.col -->
    </div>
  </div>
  <!-- /.row -->

  <!--Create Event-->

<!-- Central Modal Small -->
<div class="modal fade" id="eModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">New Event</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="box">
            <!-- /.box-header -->
            <div class="delete-msg" style="width: 100%; display: block; overflow: hidden;">
              @if(session()->has('message'))
                <div class="alert alert-success">
                  {{ session('message') }}
                </div>
              @endif
            </div>

            <div class="box-body">
                <table id="example1" class="table table-warning table-striped">
                  <thead>
                    <tr>
                        <th>Event Date</th>
                        <th>Event Name</th>
                        <th>Event Catagory</th>
                        <th>Description</th>
      @can('isAdmin')   <th>Action</th> 	@endcan
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($events as $event)
                    <tr>
                        <td>{{ $event->e_date }}</td>
                        <td>{{ $event->e_name }}</td>
                        <td>{{ $event->catagory->c_name }}</td>
                        <td>{{ $event->e_desc }}</td>
       @can('isAdmin')  <td>
                        	<div class=" action">
                        	<a href="{{ route('events.edit', $event->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> &nbsp;Edit </a>
                        <span>
                          <style type="text/css">
                            .myform{
                              display: inline;
                            }
                          </style>
                          <form class="myform" action="{{ route('events.destroy', $event->id) }}" method="post" onsubmit="return confirm('Are you sure?')">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger float-left"><i class="fa fa-trash" aria-hidden="true"></i> &nbsp;Delete</button>
                          </form>
                        </span>
                        
                      </div>
                        </td>@endcan 
                    </tr>
                  @endforeach
                  </tbody>
                </table>
                
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
  

      </div>
  </div>
</div>
</div>
<!-- Central Modal Small -->
  <hr><hr>


@endsection