@extends('layouts.dash')

@section('title','ServiceUpdate')

@section('header','Service Update')

@section('main-content')

<section class="content">
      <div class="row">
        <div class="col-md-6">
          <h1 style="display: inline-block;">Edit Service</h1>
        </div>
        <div class="col-md-6">
          <div class="add-new">
            <a href="{{route('services.index')}}" class="btn btn-success">
              Services List
            </a>
          </div>
        </div>
      </div>
      <hr>
      <hr>
  <div class="row p-3">
    <div class="col-xs-12">
      
        <div class="box box-primary">
                <!-- form start -->
           <form role="form" action="{{ route('services.update', $services->id) }}" method="post">
              @csrf
              @method('PUT')

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
            <div class="form-group">
                <label for="name">Service  </label>
                <input type="text" class="form-control" id="name" placeholder="Service" name="name" value="{{ $services->name }}">
            </div>
            <div class="form-group">
              <label for="slug">Slug</label>
              <select name ="slug" class="form-control">
                        <option value="venue">Venue</option>
                        <option value="food">Food</option>
                        <option value="equipment">Equipment</option>
                        <option value="flower">Flower</option>
                        <option value="light">Light</option>
                      </select>
          </div>
            <div class="form-group">
                <label for="details">Details</label>
                <input type="text" class="form-control" id="details" placeholder="Details" name="details" value="{{ $services->details }}">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" placeholder="Price" name="price" value="{{ $services->price }}">
            </div>
            <div class="form-group">
                <label for="weight">Weight</label>
                <input type="text" class="form-control" id="weight" placeholder="Weight" name="weight" value="{{ $services->weight }}">
            </div>

          </div>
              <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-success">Update</button>
                
          </div>
            </form>
        </div>
      
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>

@stop

