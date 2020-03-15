@extends('layouts.dash')

@section('title','AdminDash')

@section('header','Admin Panel')

@section('main-content')
 
  <h1 style="display: inline-block;">Hello Admin</h1>
  <hr><hr>
<!--User-->
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{  $total_users }}</h5>
        <p class="card-text">Total Clients</p>
        <a href="{{route('users.list')}}" class="btn btn-info">More info</a>
      </div>
    </div>
  </div>
@endsection