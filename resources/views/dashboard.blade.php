@extends('layouts.dash')

@section('title','Dash')

@section('header','Dashboard')

@section('main-content')
 
  @can('isAdmin')
  <h1 style="display: inline-block;">Hello Admin</h1>
  @endcan
  @can('isUser')
  <h1 style="display: inline-block;">Hello {{ Auth::user()->name }}</h1>
  @endcan
  <hr><hr>

  <hr><hr>


@endsection