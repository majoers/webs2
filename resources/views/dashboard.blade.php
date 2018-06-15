@extends('layouts.app')
@section('title','Dashboard')
@section('content')
    <div class="container">

        <div class="row">

            <div class="col-sm-2">

            </div>

            <div class="col-sm-8">
                <div class="card"  >

                    <div class="card-header">

                    <h2>Product</h2>
                    </div>
                    <div class="card-body  bg-light">
                        <div class="col-xs-6">

                                <a class="btn btn-light" href="/products/list" >
                                    <img class="dashboardImg" src="{{asset('css/img/list.png')}}">
                                    <h3 class="text-center"> Product List</h3>
                                </a>

                        </div>
                        <div class="col-xs-6">
                            <a class="btn btn-light" href="/products/add">

                                    <img class="dashboardImg" src="{{asset('css/img/add.png')}}">
                                <h3 class="text-center">Add Product</h3>

                            </a>
                        </div>

                    </div>
                </div>

                <div class="card "  >

                    <div class="card-header">

                        <h2 >Subcategory</h2>

                    </div>


                    <div class="card-body  bg-light">
                        <div class="col-xs-6">
                            <a class="btn btn-light" href="/subcategories/list">
                                <img class="dashboardImg" src="{{asset('css/img/list.png')}}">
                                <h3 class="text-center">Subcategory List</h3>
                            </a>
                        </div>
                        <div class="col-xs-6">
                            <a class="btn btn-light" href="/subcategories/add">
                                <img class="dashboardImg" src="{{asset('css/img/add.png')}}">
                                <h3 class="text-center">Add Subcategory</h3>
                            </a>
                        </div>

                    </div>
                </div>

                <div class="card">

                    <div class="card-header">
                        <h2>Category</h2>
                    </div>

                    <div class="card-body  bg-light">
                        <div class="col-xs-6">
                            <a class="btn btn-light" href="/categories/list">
                                <img class="dashboardImg" src="{{asset('css/img/list.png')}}">
                                <h3 class="text-center">Category List</h3>
                            </a>
                        </div>
                        <div class="col-xs-6">

                            <a class="btn btn-light" href="/categories/add">
                                <img class="dashboardImg" src="{{asset('css/img/add.png')}}">
                                <h3 class="text-center">Add Category</h3>
                            </a>
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-sm-2">

            </div>
        </div>



    </div>





@endsection