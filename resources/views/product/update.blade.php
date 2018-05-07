@extends('layouts.app')
@section('title','Update Product')
@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">
                        Update Product
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="/products/storeEdit" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">
                                    Name
                                </label>
                                <div class="col-md-6">
                                    <input value="{{$product->name}}"  type="text" name="name" class="form-control">
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="genre" class="col-md-4 col-form-label text-md-right">
                                    Genre
                                </label>
                                <div class="col-md-6">
                                    <select name="genre" class="form-control" >
                                        @foreach($genres as $genre)
                                            <option @if($product->genre->id == $genre->id) selected @endif  value="{{$genre->id}}">{{$genre->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">
                                    Category
                                </label>
                                <div class="col-md-6">
                                    <select class="form-control" name="category">
                                        <option value="" disabled selected hidden>Select option</option>
                                        @foreach($categories as $category)
                                            <option @if($product->category->id == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach

                                    </select>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">
                                    Description
                                </label>
                                <div class="col-md-6">
                                    <textarea class="form-control" rows="3" name="description">{{{$product->description}}}</textarea>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">
                                    Price
                                </label>
                                <div class="col-md-2">
                                    <input value="{{$product->price}}" type="text" placeholder="0.00" name="price" class="form-control">
                                </div>

                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">
                                    Current Image
                                </label>
                                <img class="catalogImg" src="{{asset('css/img/'.$product->image)}}">

                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">
                                    Change Image
                                </label>
                            <div class="col-md-6">
                                <input class="form-control-file" type="file" name="image" accept='image/*'>
                            </div>

                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <input type="submit" class="btn btn-primary" value="Save changes">
                                </div>

                            </div>


                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>


@endsection