@extends('layouts.app')
@section('title','Home')
@section('content')
    @if(Session::has('cart'))
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                    @foreach($products as $product)
                        <li class="list-group-item">
                            <span class="badge"> {{$product['qty']}} </span>
                            <strong> {{$product['item']['name']}} </strong>
                            <span class="label label-success"> {{$product['price']}}</span>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action </span> </button>
                                <ul class="dropdown-menu">
                                    <li><a href="/reduce/{{$product['item']->id}}"> Reduce by 1 </a></li>
                                    <li><a href="/remove/{{$product['item']->id}}"> Reduce All </a></li>
                                </ul>
            </div>
            </li>
            @endforeach
            </ul>
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