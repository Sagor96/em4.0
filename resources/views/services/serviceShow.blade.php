@extends('layouts.dash')

@section('title','Services')

@section('header','Services List')

@section('main-content')
<div class="col-lg-4 col-md-6 mb-4">
  <div class="card h-100">
    <a href="/service/{{$services->slug}}"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
    <div class="card-body">
      <h4 class="card-title">
        <a href="#">{{$services->name}}</a>
      </h4>
      <h5>TK {{$services->price}}</h5>
      <p class="card-text">{{$services->slug}}</p>
      <form action="/cart" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$services->id}}">
        <input type="hidden" name="name" value="{{$services->name}}">
        <input type="hidden" name="price" value="{{$services->price}}">
        <button class="btn btn-warning"><b>Add To Service List</b></button>
      </form>
    </div>
  </div>
</div>
@stop