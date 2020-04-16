@extends('layouts.dash')

@section('title','Flowers')

@section('header','Flowers List')

@section('main-content')

<section class="content">
      <div class="row">
        <div class="col-md-6">
          <h1 style="display: inline-block;">Flowers List</h1>
        </div>
        <div class="col-md-6">
          <div class="add-new">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#eModalSm">
              Add New Flower
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
<p>Note:1.Red, 2.Yellow, 3.Pink,4.Blue, 5.White</p>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-warning table-striped">
                  <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Color</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $i=1; ?>
                    @foreach($flowers as $e)
                    <tr>
                        <td>{{ $i++}}</td>
                        <td>{{ $e->service->name }}</td>
                        <td>{{ $e->color }}</td>
                        <td>{{ $e->service->price }}</td>
                        <td>
                        <div class=" action">
                        <a href="{{ route('flowers.edit', $e->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> &nbsp;Edit </a>
                        <span>
                          <style type="text/css">
                            .myform{
                              display: inline;
                            }
                          </style>
                          <form class="myform" action="{{ route('flowers.destroy', $e->id) }}" method="post" onsubmit="return confirm('Are you sure?')">
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
        <h4 class="modal-title w-100" id="myModalLabel">New Flower</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="{{ route('flowers.store') }}" method="post">
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
                      <label for="fl_name">Flower Name</label>
                      <select name="service_id" class="form-control">
            <!-- <option selected="selected" >---Select a Hosting Type---</option> -->
            <?php 
            $slug='flower';
            $services=\App\Models\Service::where('slug',$slug)->get(); ?>
              @foreach($services as $service)
              <option value="{{ $service->id }}">{{ $service->name }}</option>
              @endforeach

            </select>
                  </div>
                  <div class="form-group">
                      <label for="color">Flower Color</label>
                      <select name ="color" class="form-control">
                        <option value="1">Red</option>
                        <option value="2">Yellow</option>
                        <option value="3">Pink</option>
                        <option value="4">Blue</option>
                        <option value="5">White</option>
                      </select>
                  </div>

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