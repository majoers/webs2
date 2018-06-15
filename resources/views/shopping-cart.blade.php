@extends('layouts.app')
@section('title','Home')
@section('content')
    @if(Session::has('cart'))
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <table class="table">
                    <th>Amount</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th></th>
                    @foreach($products as $product)
                        <tr>
                           <td> <span class="badge"> {{$product['qty']}} </span></td>
                            <td>  <strong> {{$product['item']['name']}} </strong></td>
                            <td> € {{$product['price']}}</td>
                            <td> <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action </span> </button>
                                <ul class="dropdown-menu">
                                    <li><a href="/reduce/{{$product['item']->id}}"> Reduce by 1 </a></li>
                                    <li><a href="/remove/{{$product['item']->id}}"> Reduce All </a></li>
                                    <li><a href="/add/{{$product['item']->id}}"> Add by 1 </a></li>
                                </ul>
            </div></td>
                        </tr>
            @endforeach
                </table>
        </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong> Total: {{$totalPrice}}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2><a href="/checkout" class="btn btn-warning">checkout</a></h2>

            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>No items in Cart!</h2>
            </div>
        </div>
    @endif

@endsection
<div class="container">

</div>