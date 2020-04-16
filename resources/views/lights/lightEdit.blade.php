@extends('layouts.dash')

@section('title','LightUpdate')

@section('header','Light Update')

@section('main-content')

<section class="content">
      <div class="row">
        <div class="col-md-6">
          <h1 style="display: inline-block;">Edit Light</h1>
        </div>
        <div class="col-md-6">
          <div class="add-new">
            <a href="{{route('lights.index')}}" class="btn btn-success">
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
           <form role="form" action="{{ route('lights.update', $lights->id) }}" method="post">
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
                    <label for="l_type">Light Type</label>
                    <select name ="l_type" class="form-control">

                        <option value="1" @if($lights->l_type==1) selected='selected' @endif>In Door</option>

                        <option value="2" @if($lights->l_type==2) selected='selected' @endif>Out Door</option>
                      </select>
                </div>
                <div class="form-group">
                    <label for="l_name"> Name </label>
                    <select name="service_id" class="form-control">

                        @foreach($services as $service)
                        <option value="{{ $service->id }}" @if($service->id==$lights->service_id) selected='selected' @endif>

                          {{ $service->name }}

                        </option>
                        @endforeach

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

