@extends('layouts.app')
@section('title','Category List')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <table class="table">

                    <th>Name</th>
                    <th></th>
                    <th></th>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td><a href="/categories/edit/{{$category->id}}" class="btn btn-warning">Edit</a></td>
                            <td><a class="btn btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>

        </div>
    </div>






@endsection