@extends('layouts.app')
@section('title','Catalog')
@section('content')

    <div class="container">
        <div class="row">

            <div class="col-sm-3">
                <div class="card">
                    <form action="/search" method="POST" role="search">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" class="form-control" name="q"
                                   placeholder="Search"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
                        </div>
                    </form>
                </div>
                <div class="card">
                    <div class="card-header font-weight-bold">
                        Filters
                    </div>
                    <div class="card-body">

                        <h4 class="card-title">
                            Category
                        </h4>


                        <form method="post" action="/catalog/filter">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="form-check">
                                    <input id="radiobutton0" class="form-check-input" type="radio"
                                           name="category" value="0" checked="selected">
                                    <label for="radiobutton0" class="form-check-label fixPadding">
                                        No filter
                                    </label>
                                </div>
                            </div>
                            @foreach($categories as $category)
                                <div class="row">
                                    <div class="form-check">
                                        <input id="radiobutton{{$category->id}}" class="form-check-input" type="radio"
                                               name="category" value="{{$category->id}}">
                                        <label for="radiobutton{{$category->id}}"
                                               class="form-check-label fixPadding">{{$category->name}}</label>
                                    </div>
                                </div>
                            @endforeach



                        <h4 class="card-title">
                            Genre
                        </h4>
                            <div class="row">
                            <div class="form-check">
                                <input id="radiobutton0" class="form-check-input" type="radio"
                                       name="genre" value="0" checked="selected">
                                <label for="radiobutton0" class="form-check-label fixPadding">
                                    No filter
                                </label>
                            </div>
                            </div>
                            @foreach($genres as $genre)
                                <div class="row">
                                    <div class="form-check">
                                        <input id="radiobutton{{$genre->id}}" class="form-check-input" type="radio"
                                               name="genre" value="{{$genre->id}}">
                                        <label for="radiobutton{{$genre->id}}"
                                               class="form-check-label fixPadding">{{$genre->name}}
                                        </label>
                                    </div>
                                </div>
                            @endforeach

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-5">
                                    <input type="submit" class="btn btn-primary" value="Find Products">
                                </div>

                            </div>
                        </form>
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
                                    <h4>{{$product->name}}</h4>

                                </div>

                                <h2>€ {{$product->price}}</h2>

                                <h2><a href="/product/{{$product->id}}" class="btn btn-warning">Buy now</a></h2>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>


            </div>

        </div>

    </div>





@endsection
