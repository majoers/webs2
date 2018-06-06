@extends('layouts.app')
@section('title','Genre List')
@section('content')

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-6">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h3>Genre List</h3>
            <table class="table">

                <th>Name</th>
                <th></th>
                <th></th>
                @foreach($genres as $genre)
                    <tr>
                        <td>{{$genre->name}}</td>
                        <td><a href="/genres/edit/{{$genre->id}}" class="btn btn-warning">Edit</a></td>
                        <td><a href="/genres/delete/{{$genre->id}}" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
            </table>
            </div>

        </div>
    </div>






@endsection