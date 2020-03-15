@extends('layouts.dash')

@section('title','FoodList')

@section('header','Food List')

@section('main-content')
 
  
  <h1 style="display: inline-block;">Food List</h1>
  <hr><hr>
  @foreach($foods->chunk(2) as $foodChunk)
<div class="row">
	@foreach($foodChunk as $food)
	<div class="col-sm-6 col-md-4">
		<div class="card" style="width: 18rem;">
	  		<img class="card-img-top" src="{{$food->imagePath}}" alt="Card image cap">
	  		<div class="card-body">
	    	<h5 class="card-title">{{$food->f_title}}</h5>
	    	<p class="card-text">TK {{$food->price}}</p>
	    	<p class="card-text">{{$food->f_desc}}</p>
	    	<a href="{{route('foods.getAddCart',['id'=>$food->id])}}"class="btn btn-warning" style="padding: 10px">Add List</a>
	  	</div>
  	</div>
  </div> 
  @endforeach
</div>
@endforeach
  <hr><hr>


@endsection