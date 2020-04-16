@extends('layouts.dash')

@section('title','EquipmentUpdate')

@section('header','Equipment Update')

@section('main-content')

<section class="content">
      <div class="row">
        <div class="col-md-6">
          <h1 style="display: inline-block;">Edit Equipment</h1>
        </div>
        <div class="col-md-6">
          <div class="add-new">
            <a href="{{route('equipments.index')}}" class="btn btn-success">
              Equipments List
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
           <form role="form" action="{{ route('equipments.update', $equipments->id) }}" method="post">
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
                <label for="eq_name"> Name </label>
                <select name="service_id" class="form-control">

                        @foreach($services as $service)
                        <option value="{{ $service->id }}" @if($service->id==$equipments->service_id) selected='selected' @endif>

                          {{ $service->name }}

                        </option>
                        @endforeach

                      </select>
            </div>
            <div class="form-group">
                <label for="provider">Provider</label>
                <input type="text" class="form-control" id="provider" placeholder="Provider" name="provider" value="{{ $equipments->provider }}">
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

