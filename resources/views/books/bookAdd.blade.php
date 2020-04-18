@extends('layouts.dash')

@section('title','Venues')

@section('header','Venues List')

@section('main-content')

    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100">List</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="{{ route('books.store') }}" method="post">
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
	<div class="card">
  		<div class="card-header">
    		Venue
  		</div>
  	<div class="card-body">
    	      <div class="form-group">
                    <label for="eventdate">Event Date</label><br>
                    <p>*Date must be set date before</p>
                    <input type="date" class="form-control" id="eventdate" placeholder="" name="eventdate" value="{{ old('eventdate') }}">
                </div>
                <div class="form-group">
                    <label for="Venue">Venue</label><br>
                    <select name="venue_id" class="form-control">
            <!-- <option selected="selected" >---Select a Hosting Type---</option> -->
            <?php 
            $slug='venue';
            $services=\App\Models\Service::where('slug',$slug)->get(); ?>
              @foreach($services as $service)
              <option value="{{ $service->id }}">{{ $service->name }}</option>
              @endforeach

            </select>
                </div>
    	      </div>
  	</div>
  	<div class="card">
  		<div class="card-header">
    		Food
  		</div>
  	<div class="card-body">
  				<div class="form-group">
                    <label for="m_type">Meal Type</label>
                    <select name ="m_type" class="form-control">
                        <option value="1">Lunch</option>
                        <option value="2">Dinner</option>
                        <option value="3">Both</option>
                      </select>
                </div>
                  <div class="form-group">           
           <?php 
            $slug='food';
            $services=\App\Models\Service::where('slug',$slug)->get(); ?>
              @foreach($services as $service)
                    <span class="checkbox-input"><input type="checkbox" class="form-check-input" name="food_id[]" value="{{$service->name}}"> <label>{{$service->name}}</label></span>
                    <br>
                    @endforeach
                  </div>
              </div>
  	</div>
  	<div class="card">
  		<div class="card-header">
    		Cake
  		</div>
  	<div class="card-body">
                  <div class="form-group">           
           <?php 
            $slug='cake';
            $services=\App\Models\Service::where('slug',$slug)->get(); ?>
              @foreach($services as $service)
                    <span class="checkbox-input"><input type="checkbox" class="form-check-input" name="service_id[]" value="{{$service->name}}"> <label>{{$service->name}}</label></span>
                    <br>
                    @endforeach
                  </div>
              </div>
  	</div>
  	<div class="card">
  		<div class="card-header">
    		Equipment
  		</div>
  	<div class="card-body">
                  <div class="form-group">          
           <?php 
            $slug='equipment';
            $services=\App\Models\Service::where('slug',$slug)->get(); ?>
              @foreach($services as $service)
                    <span class="checkbox-input"><input type="checkbox" class="form-check-input" name="equipment_id[]" value="{{$service->name}}"> <label>{{$service->name}}</label></span>
                    <br>
                    @endforeach
                  </div>
              </div>
  	</div>
  	<div class="card">
  		<div class="card-header">
    		Light
  		</div>
  	<div class="card-body">
                  <div class="form-group">           
           <?php 
            $slug='light';
            $services=\App\Models\Service::where('slug',$slug)->get(); ?>
              @foreach($services as $service)
                    <span class="checkbox-input"><input type="checkbox" class="form-check-input" name="light_id[]" value="{{$service->name}}"> <label>{{$service->name}}</label></span>
                    <br>
                    @endforeach
                  </div>
              </div>
  	</div>

  	<div class="card">
  		<div class="card-header">
    		Flower
  		</div>
  	<div class="card-body">
                  <div class="form-group">
           <?php 
            $slug='flower';
            $services=\App\Models\Service::where('slug',$slug)->get(); ?>
              @foreach($services as $service)
                    <span class="checkbox-input"><input type="checkbox" class="form-check-input" name="flower_id[]" value="{{$service->name}}"> <label>{{$service->name}}</label></span>
                    <br>
                    @endforeach
                  </div>
              </div>
  	</div>

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