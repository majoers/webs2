@extends('layouts.app')
@section('title','Home')
@section('content')




    <div class="container">
        <div class="row">
        @foreach($products as $product)
            @if($loop->index == 3)
        </div>
        <div class="row">
            @endif
            <div class="col-sm-4 text-center">
                <div class="productContainer img-thumbnail">
                    <img class="catalogImg" src="{{asset('css/img/'.$product->image)}}">


                    <div class="text-center ">
                        <div class="shortdescription">
                            <h4 >{{$product->name}}</h4>

                        </div>




                    <h2>€ {{$product->price}}</h2>

                    <h2 ><a href="/product/{{$product->id}}" class="btn btn-warning">Buy now</a></h2>
                    </div>
                </div>
            </div>
        @endforeach
        </div>

    </div>





@endsection

