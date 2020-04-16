@extends('layouts.dash')

@section('title','Services')

@section('header','Services List')

@section('main-content')

<section class="content">
      <div class="row">
        <div class="col-md-6">
          <h1 style="display: inline-block;">Services List</h1>
        </div>
        <div class="col-md-6">
          <div class="add-new">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#eModalSm">
              Add New Service
            </button>
          </div>
        </div>
      </div>
      <hr>
      <hr>

   <!-- Main content -->

  <div class="row p-3">
    <div class="col-xs-12">
      
    <div class="box">
            <!-- /.box-header -->
            <div class="delete-msg" style="width: 100%; display: block; overflow: hidden;">
              @if(session()->has('message'))
                <div class="alert alert-success">
                  {{ session('message') }}
                </div>
              @endif
            </div>

            <div class="box-body">
                <table id="example1" class="table table-bordered table-warning table-striped">
                  <thead>
                    <tr>
                        <th>SL</th>
                        <th>Service</th>
                        <th>Slug</th>
                        <th>Details</th>
                        <th>Price</th>
                        <th>Weight</th>
                        <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $i=1; ?>
                    @foreach($services as $s)
                    <tr>
                        <td>{{ $i++}}</td>
                        <td>{{ $s->name }}</td>
                        <td>{{ $s->slug }}</td>
                        <td>{{ $s->details }}</td>
                        <td>{{ $s->price }}Tk</td>
                        <td>{{ $s->weight }}kg</td>
                        <td>
                        <div class=" action">
                        <a href="{{ route('services.edit', $s->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> &nbsp;Edit </a>
                        <span>
                          <style type="text/css">
                            .myform{
                              display: inline;
                            }
                          </style>
                          <form class="myform" action="{{ route('services.destroy', $s->id) }}" method="post" onsubmit="return confirm('Are you sure?')">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger float-left"><i class="fa fa-trash" aria-hidden="true"></i> &nbsp;Delete</button>
                          </form>
                        </span>
                        
                      </div>
                        </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
                
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
  
    <!-- /.col -->
    </div>
  </div>
  <!-- /.row -->
</section>
  <!--Create Order-->

<!-- Central Modal Small -->
<div class="modal fade" id="eModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">New Service</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="{{ route('services.store') }}" method="post">
              @csrf

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
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ old('name') }}">
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
              <input type="text" class="form-control" id="details" placeholder="Details" name="details" value="{{ old('details') }}">
          </div>
          <div class="form-group">
              <label for="price">Price</label>
              <input type="text" class="form-control" id="price" placeholder="Price" name="price" value="{{ old('price') }}">
          </div>
          <div class="form-group">
              <label for="weight">Weight</label>
              <input type="text" class="form-control" id="weight" placeholder="Weight" name="weight" value="{{ old('weight') }}">
          </div>
                 </div>
                <!-- /.box-body -->

                <div class="box-footer">

                  <button type="submit" class="btn btn-success">Save</button>

                </div>
            </form>

      </div>
  </div>
</div>
</div>
<!-- Central Modal Small -->

@stop