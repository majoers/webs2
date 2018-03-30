@extends('layouts.app')
@section('title','Catalog')
@section('content')

    <div class="container">
        <div class="row">

            <div class="col-sm-3">

                <div class="card">
                    <div class="card-header font-weight-bold">
                        Filters
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <h4>
                                Category
                            </h4>
                        {{--@foreach()
                          @endforeach--}}
                          </div>
                          <div class="row">
                              <h4>
                                  Genre
                              </h4>
                          {{--  @foreach()
                              @endforeach--}}
      </div>
  </div>
</div>

</div>
<div class="col-sm-9">
<div class="row">
  @foreach($products as $product)
      @if(($loop->index % 3) === 0)
  </div>
  <div class="row">
      @endif
      <div class="col-sm-4 text-center">
          <div class="productCatalogContainer img-thumbnail">
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

</div>

</div>





@endsection
