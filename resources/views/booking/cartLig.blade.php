@extends('layouts.dash')

@section('title','Booking')

@section('header','Booking List')

@section('main-content')

<div class="container mb-4">
    <div class="row">
        <div class="col-12">
          @if (session()->has('success'))
            <div class="alert alert-success">
              {{session()->get('success')}}
            </div>
          @endif

          @if(Cart::count()>0)
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Service</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach(Cart::content() as $l )
                        <tr>
                            <td>{{$l->model->l_name}}</td>
                            <td><input class="form-control" type="text" value="{{$l->model->l_name}}" /></td>
                            <td class="text-right">{{$l->model->l_cost}}</td>
                            <td class="text-right">
                              <form action="/cart/{{$l->rowId}}"method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Remove</button>
                              </form>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Sub-Total</td>
                            <td class="text-right">{{Cart::subtotal()}} Tk</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Tax</td>
                            <td class="text-right">{{Cart::tax()}} Tk</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong>{{Cart::total()}} Tk</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <a href="#" class="btn btn-success">Continue Add Service</a>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <a href="/cart/empty" class="btn btn-dark">Clean</a>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <a href="/checkout" class="btn btn-warning btn-bg">Leave</a>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<h3>No Service in Our Hands</h3>
@endif


@stop