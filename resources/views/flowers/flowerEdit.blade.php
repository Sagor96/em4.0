@extends('layouts.dash')

@section('title','FlowerUpdate')

@section('header','Flower Update')

@section('main-content')

<section class="content">
      <div class="row">
        <div class="col-md-6">
          <h1 style="display: inline-block;">Edit Flower</h1>
        </div>
        <div class="col-md-6">
          <div class="add-new">
            <a href="{{route('flowers.index')}}" class="btn btn-success">
              Flowers List
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
           <form role="form" action="{{ route('flowers.update', $flowers->id) }}" method="post">
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
                    <label for="fl_name"> Name </label>
                    <select name="service_id" class="form-control">

                        @foreach($services as $service)
                        <option value="{{ $service->id }}" @if($service->id==$flowers->service_id) selected='selected' @endif>

                          {{ $service->name }}

                        </option>
                        @endforeach

                      </select>
                </div>
                <div class="form-group">
                    <label for="color">Color</label>
                     <select name ="color" class="form-control">

                        <option value="1" @if($flowers->color==1) selected='selected' @endif>Red</option>

                        <option value="2" @if($flowers->color==2) selected='selected' @endif>Yellow</option>

                        <option value="3" @if($flowers->color==3) selected='selected' @endif>Blue</option>

                        <option value="4" @if($flowers->color==4) selected='selected' @endif>Pink</option>

                        <option value="5" @if($flowers->color==5) selected='selected' @endif>White</option>

                      </select>
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

