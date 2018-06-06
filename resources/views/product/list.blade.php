@extends('layouts.app')
@section('title','Product List')
@section('content')

    <div class="container">

        <div class="row justify-content-center">
            <h3>Product List</h3>
            <table class="table">

                <th>Name</th>
                <th>Price</th>
                <th>Image name</th>
                <th>Genre</th>
                <th>Category</th>
                <th></th>
                <th></th>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>€ {{$product->price}}</td>
                        <td>{{$product->image}}</td>
                        <td>{{$product->genre->name}}</td>
                        <td>{{$product->category->name}}</td>
                        <td><a href="/products/edit/{{$product->id}}" class="btn btn-warning">Edit</a></td>
                        <td><a  href="/products/delete/{{$product->id}}" class="btn btn-danger">Delete</a></td>
                    </tr>

                @endforeach
            </table>


        </div>
    </div>






@endsection