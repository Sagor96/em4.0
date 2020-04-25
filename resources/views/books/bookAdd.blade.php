@extends('layouts.dash')

@section('title','Venues')

@section('header','Venues List')

@section('main-content')
<form class="form-horizontal" action="#" method="post">
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
	<h2>Client Details</h2>
  <div class="col-xs-12" style="border: solid;">
  <div class="form-group">
    <label class="control-label col-sm-6" for="c_name">Client Name</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="c_name" name="c_name" placeholder="Client Name">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-6" for="c_addr">Address</label>
    <div class="col-sm-6"> 
      <input type="text" class="form-control" id="c_addr" name="c_addr" placeholder="Address">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-6" for="c_mobile">Client Mobile</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="c_mobile" name="c_mobile" placeholder="Client Mobile">
    </div>
  </div>
  </div>
  <h2>Venue Details</h2>
  <div class="col-xs-12" style="border: solid;">
  <div class="form-group">
    <label class="control-label col-sm-6" for="v_name">Venue Name</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="v_name" name="v_name" placeholder="Venue Name">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-6" for="g_num">Guest Number</label>
    <div class="col-sm-6"> 
      <input type="text" class="form-control" id="g_num" name="g_num" placeholder="Guest Number">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-6" for="eventdate">Booking Date</label>
    <div class="col-sm-6">
      <input type="date" class="form-control" id="eventdate" name="eventdate" placeholder="Client Mobile">
    </div>
  </div>
  </div>
  <hr>
  <hr>
  <h3>Take Event Elements</h3>
  <div class="col-xs-12" style="border: solid;">
        <a class="btn btn-warning" onclick="myFunction()">Food</a>

<div id="myDIV">
<h2>Food Details</h2>
  <table class="table table-bordered table-striped col-xl-6">
                  <thead>
                    <tr>
                    	<th>Meal Type</th>
                        <th>Food List</th>
                        <th>Food Price</th>
                        <th>Quantity</th>
                    </tr>
                  </thead>

                  <tbody>
                  	<?php $slug='food';
                  	$services=\App\Models\Service::where('slug',$slug)->get();  ?>
                    @foreach($services as $service)
                    <tr>
                    	<td>
                          <div class="form-group">
                        	<select name ="m_type" class="form-control">
                        <option value="1">Lunch</option>
                        <option value="1">Dinner</option>
                        <option value="2">Both</option>
                      </select>
                        	</div>
                        </td>
                        <td style="text-align:right">
                        	<div class="form-group">
                        		<span class="checkbox-input"><input type="checkbox" class="form-check-input" name="food[]" value="{{$service->name}}"><label>{{$service->name}}</label></span>
                        	</div>
                        </td>
                        <td>{{ $service->price }}</td>
                        <td>
                        	<div class="form-group">
                        	<input type="text" class="form-control" id="qty_1" name="qty_1[]" placeholder="Quantity">
                        	</div>
                        </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>

</div>
  <a class="btn btn-warning" onclick="myFunction1()">Equipment</a>

<div id="myDIV1">
<h2>Equipment Details</h2>
  <table class="table table-bordered table-striped col-xl-6">
                  <thead>
                    <tr>
                    	<th>Meal Type</th>
                        <th>Food List</th>
                        <th>Food Price</th>
                        <th>Quantity</th>
                    </tr>
                  </thead>

                  <tbody>
                  	<?php $slug='food';
                  	$services=\App\Models\Service::where('slug',$slug)->get();  ?>
                    @foreach($services as $service)
                    <tr>
                    	<td>
                          <div class="form-group">
                        	<select name ="m_type" class="form-control">
                        <option value="1">Lunch</option>
                        <option value="1">Dinner</option>
                        <option value="2">Both</option>
                      </select>
                        	</div>
                        </td>
                        <td style="text-align:right">
                        	<div class="form-group">
                        		<span class="checkbox-input"><input type="checkbox" class="form-check-input" name="food[]" value="{{$service->name}}"><label>{{$service->name}}</label></span>
                        	</div>
                        </td>
                        <td>{{ $service->price }}</td>
                        <td>
                        	<div class="form-group">
                        	<input type="text" class="form-control" id="qty_1" name="qty_1[]" placeholder="Quantity">
                        	</div>
                        </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>

</div>
  <a class="btn btn-warning" onclick="myFunction2()">Light</a>

<div id="myDIV2">
<h2>Light Details</h2>
  <table class="table table-bordered table-striped col-xl-6">
                  <thead>
                    <tr>
                    	<th>Meal Type</th>
                        <th>Food List</th>
                        <th>Food Price</th>
                        <th>Quantity</th>
                    </tr>
                  </thead>

                  <tbody>
                  	<?php $slug='food';
                  	$services=\App\Models\Service::where('slug',$slug)->get();  ?>
                    @foreach($services as $service)
                    <tr>
                    	<td>
                          <div class="form-group">
                        	<select name ="m_type" class="form-control">
                        <option value="1">Lunch</option>
                        <option value="1">Dinner</option>
                        <option value="2">Both</option>
                      </select>
                        	</div>
                        </td>
                        <td style="text-align:right">
                        	<div class="form-group">
                        		<span class="checkbox-input"><input type="checkbox" class="form-check-input" name="food[]" value="{{$service->name}}"><label>{{$service->name}}</label></span>
                        	</div>
                        </td>
                        <td>{{ $service->price }}</td>
                        <td>
                        	<div class="form-group">
                        	<input type="text" class="form-control" id="qty_1" name="qty_1[]" placeholder="Quantity">
                        	</div>
                        </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>

</div>
  <a class="btn btn-warning" onclick="myFunction3()">Flower</a>

<div id="myDIV3">
<h2>Flower Details</h2>
  <table class="table table-bordered table-striped col-xl-6">
                  <thead>
                    <tr>
                    	<th>Meal Type</th>
                        <th>Food List</th>
                        <th>Food Price</th>
                        <th>Quantity</th>
                    </tr>
                  </thead>

                  <tbody>
                  	<?php $slug='food';
                  	$services=\App\Models\Service::where('slug',$slug)->get();  ?>
                    @foreach($services as $service)
                    <tr>
                    	<td>
                          <div class="form-group">
                        	<select name ="m_type" class="form-control">
                        <option value="1">Lunch</option>
                        <option value="1">Dinner</option>
                        <option value="2">Both</option>
                      </select>
                        	</div>
                        </td>
                        <td style="text-align:right">
                        	<div class="form-group">
                        		<span class="checkbox-input"><input type="checkbox" class="form-check-input" name="food[]" value="{{$service->name}}"><label>{{$service->name}}</label></span>
                        	</div>
                        </td>
                        <td>{{ $service->price }}</td>
                        <td>
                        	<div class="form-group">
                        	<input type="text" class="form-control" id="qty_1" name="qty_1[]" placeholder="Quantity">
                        	</div>
                        </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>

</div>
  <a class="btn btn-warning" onclick="myFunction4()">Cake</a>

<div id="myDIV4">
<h2>Cake Details</h2>
  <table class="table table-bordered table-striped col-xl-6">
                  <thead>
                    <tr>
                    	<th>Meal Type</th>
                        <th>Food List</th>
                        <th>Food Price</th>
                        <th>Quantity</th>
                    </tr>
                  </thead>

                  <tbody>
                  	<?php $slug='food';
                  	$services=\App\Models\Service::where('slug',$slug)->get();  ?>
                    @foreach($services as $service)
                    <tr>
                    	<td>
                          <div class="form-group">
                        	<select name ="m_type" class="form-control">
                        <option value="1">Lunch</option>
                        <option value="1">Dinner</option>
                        <option value="2">Both</option>
                      </select>
                        	</div>
                        </td>
                        <td style="text-align:right">
                        	<div class="form-group">
                        		<span class="checkbox-input"><input type="checkbox" class="form-check-input" name="food[]" value="{{$service->name}}"><label>{{$service->name}}</label></span>
                        	</div>
                        </td>
                        <td>{{ $service->price }}</td>
                        <td>
                        	<div class="form-group">
                        	<input type="text" class="form-control" id="qty_1" name="qty_1[]" placeholder="Quantity">
                        	</div>
                        </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>

</div>
</div>
<hr>
  <hr>
  <div class="form-group"> 
    <div class="col-sm-offset-3 col-sm-10">
      <button type="submit" class="btn btn-success">Submit</button>
    </div>
  </div>
</form>
<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myFunction1() {
  var x = document.getElementById("myDIV1");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myFunction2() {
  var x = document.getElementById("myDIV2");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myFunction3() {
  var x = document.getElementById("myDIV3");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myFunction4() {
  var x = document.getElementById("myDIV4");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
@stop