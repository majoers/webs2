@extends('layouts.app')
@section('title','Home')
@section('content')

    <div class="container">

        <div class="row">
            <div class="col-md-6">


                <img class="detailsImg" src="{{asset('css/img/'.$product->image)}}">

            </div>
            <div class="col-md-6">
                <h2>{{$product->name}}</h2>
                <h4>Genre: {{$product->genre->name}}</h4>
                <h1>€ {{$product->price}}</h1>
                <h2 ><a href="/add-to-cart/{{$product->id}}" class="btn btn-warning">Add to Cart</a></h2>
            </div>
        </div>

        <div class="row">
            <h2>Description</h2>
            <div class="col-md-12 text-center">
                <h4>{{$product->description}}</h4>
            </div>


        </div>




    </div>






    @endsection