@extends('layouts.dash')

@section('title','Venue')

@section('header','Venue')

@section('main-content')
<div class="row">
        <div class="col-md-6">
          <h1 style="display: inline-block;">Venue List</h1>
        </div>
		<div class="col-md-6">
		<form action="{{route('venues.search')}}" method="GET">          
          <div class="active-purple-3 active-purple-4 mb-4">
  			<input class="form-control" type="text" name="v_location" placeholder="Search" aria-label="Search">
		</div>
		</form>
 </div>
</div>

  <hr><hr>
  @foreach($venues->chunk(3) as $venueChunk)
<div class="row">
	@foreach($venueChunk as $venue)
	<div class="col-sm-6 col-md-4">
           <div class="card h-100">
             <a href="#"><img class="card-img-top" src="{{$venue->imagePath}}" alt=""></a>
             <div class="card-body">
               <h4 class="card-title">
                 <a href="#">{{$venue->v_title}}</a>
               </h4>
               <h5>TK {{$venue->price}}</h5>
               <h6>{{$venue->v_location}}</h6>
               <p class="card-text">{{ $venue->v_status ==1 ? 'Free' : 'Booked' }}</p>
               <div class="btn-group btn-group-sm " role="group">
               	<button class="btn btn-info" style="border-radius: 50px"><a href="{{route('venues.show',$venue->id)}}"><span class="glyphicon glyphicon-check"></span>***</button>
        	<form action="#" method="post">
	       			 @csrf
	        	<input type="hidden" name="id" value="{{$venue->id}}">
	        	<input type="hidden" name="name" value="{{$venue->v_title}}">
	        	<input type="hidden" name="price" value="{{$venue->price}}">
	        	<button class="btn btn-warning"style="border-radius: 50px">Add To List</button>
	      	</form>
	      	</div>
             </div>
           </div>
         </div> 
  @endforeach
  <br>
</div>
@endforeach
  
@endsection
