@extends('layouts.app')
@section('title','Add Product')
@section('content')
        <div class="container">

            <div class="row">

                <div class="col-sm-2">

                </div>
                <div class="col-sm-8">
                    <h2> Add Product</h2>

                    <form method="post" action="/products/store" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="product-name">
                                Name:
                            </label>
                            <input type="text" name="product-name">


                        </div>
                        <div class="form-group row">
                            <label for="product-genre">
                                Genre:
                            </label>
                            <select class="form-control" name="product-genre">


                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="product-category">
                                Category:
                            </label>
                            <select class="form-control" name="product-category">


                            </select>


                        </div>

                        <div class="form-group row">
                            <label for="product-description">
                                Description:
                            </label>
                            <textarea  name="product-description"></textarea>


                        </div>

                        <div class="form-group row">
                            <label for="product-image">
                                Image:
                            </label>
                            <input type="file" name="product-image">


                        </div>

                        <div class="input-group">

                            <input type="submit"  class="input-button">


                        </div>
                    </form>


                </div>

                <div class="col-sm-2">

                </div>
            </div>
        </div>


@endsection