@extends('layouts.dash')

@section('title','Flowers')

@section('header','Flowers Show')

@section('main-content')

<div class="row">
  <div class="col-md-6">
    <h1 style="display: inline-block;">Flower</h1>
  </div>
  <div class="col-md-6">
    <div class="add-new">
      <a href="{{route('lights.odView')}}" class="btn btn-success">
              Next
      </a>
    </div>
  </div>
</div>

 <div class="col-lg-9">
       <div class="row">
         @foreach($flowers as $flower)
         <div class="col-lg-4 col-md-6 mb-4">
           <div class="card h-100">
             <a href="#"><img class="card-img-top" src="{{asset('frontends/img/em_f.jpg')}}" alt=""></a>
             <div class="card-body">
               <h4 class="card-title">
                 <a href="{{ route('services.show', $flower->service_id)}}"><td>{{ $flower->service->name }}</td></a>
               </h4>
               <h5>TK {{$flower->service->price}}</h5>
             </div>
           </div>
         </div>
         @endforeach
       </div>

@stop