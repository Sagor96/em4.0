@extends('layouts.dash')

@section('title','Wish')

@section('header','Wish List')

@section('main-content')

<section class="content">
  <div class="row">
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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>SL</th>
                        <th>User Name</th>
                        <th>Event Date</th>
                        <th>Interested Services</th>
                        <th>Guest Numbers</th>
                        <th>QTY</th>
                        <th>Meal Type</th>
                        <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $i=1; ?>
                    @foreach($books as $b)
                    <tr>
                        <!-- <td>{{ $client->id}}</td> -->
                        <td>{{ $i++}}</td>
                        <td>{{ $b->user->name }}</td>
                        <td>{{ $b->event->event_start_date }}</td>
                        <td>
                        @foreach(explode(',',$b->service_id) as $service)
                            <p class="badge badge-success">{{ $service }}</p>
                        @endforeach
                        </td>
                        <td>{{ $b->g_count }}</td>
                        <td>{{ $b->qty }}</td>
                        <td>{{ $b->m_type }}</td>
                        <td>
                        <div class=" action">
                        <span>
                          <style type="text/css">
                            .myform{
                              display: inline;
                            }
                          </style>
                          <form class="myform" action="{{ route('books.delete', $b->id) }}" method="post" onsubmit="return confirm('Are you sure?')">
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
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
@stop