@extends('layouts.app')
@section('title','Genre List')
@section('content')

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-6">
            <table class="table">

                <th>Name</th>
                <th></th>
                <th></th>
                @foreach($genres as $genre)
                    <tr>
                        <td>{{$genre->name}}</td>
                        <td><a href="/genres/edit/{{$genre->id}}" class="btn btn-warning">Edit</a></td>
                        <td><a class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
            </table>
            </div>

        </div>
    </div>






@endsection