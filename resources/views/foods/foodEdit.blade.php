@extends('layouts.dash')

@section('title','FoodUpdate')

@section('header','Food Update')

@section('main-content')

<section class="content">
      <div class="row">
        <div class="col-md-6">
          <h1 style="display: inline-block;">Edit Food</h1>
        </div>
        <div class="col-md-6">
          <div class="add-new">
            <a href="{{route('foods.index')}}" class="btn btn-success">
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
           <form role="form" action="{{ route('foods.update', $foods->id) }}" method="post">
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
                    <label for="m_type">Meal Type</label>
                     <select name ="m_type" class="form-control">

                        <option value="1" @if($foods->m_type==1) selected='selected' @endif>Lunch</option>

                        <option value="2" @if($foods->m_type==2) selected='selected' @endif>Dinner</option>

                        <option value="3" @if($foods->m_type==3) selected='selected' @endif>Both</option>

                      </select>
                </div>
                <div class="form-group">
                    <label for="m_type">Dish Type</label>
                     <select name ="dishtype_id" class="form-control">

                        <option value="1" @if($foods->dishtype_id==1) selected='selected' @endif>Deluxe</option>

                        <option value="2" @if($foods->dishtype_id==2) selected='selected' @endif>Regular</option>

                      </select>
                </div>
                <div class="form-group">
                    <label for="name"> Name </label>
                    <select name="service_id" class="form-control">

                        @foreach($services as $service)
                        <option value="{{ $service->id }}" @if($service->id==$foods->service_id) selected='selected' @endif>

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

