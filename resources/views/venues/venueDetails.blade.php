@extends('layouts.dash')

@section('title','Venue')

@section('header','Venue Detail')

@section('main-content')
<h1 style="display: inline-block;">Venue Detail</h1>
  <hr><hr>
<div class="table table-info">
		<ul>
			<li>Name: {{$venues->v_title}}</li>
			<li>Location: {{$venues->v_location}}</li>
			<li>Address: {{$venues->v_addr}}</li>
			<li>Units: {{$venues->qty}}</li>
			<li>Status: {{$venues->v_status ==1 ? 'Free' : 'Booked' }}</li>
			<li>Price: {{$venues->price}}</li>
		</ul>
	</div>

<hr><hr>
@endsection