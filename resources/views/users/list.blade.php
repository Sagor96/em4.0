@extends('layouts.dash')

@section('title','User')

@section('header','Client List')

@section('main-content')

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
                <table id="example1" class="table table-bordered table-warning
                table-striped">
                  <thead>
                    <tr>
                        <th>SL</th>
                        <th>Contact Name</th>
                        <th>E-Mail</th>
                        <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $i=1; ?>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $i++}}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td></td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
                
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

@stop