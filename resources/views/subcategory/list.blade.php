@extends('layouts.app')
@section('title','Subcategory List')
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
                <h3>Subcategory List</h3>
            <table class="table">

                <th>Name</th>
                <th></th>
                <th></th>
                @foreach($subcategories as $subcategory)
                    <tr>
                        <td>{{$subcategory->name}}</td>
                        <td><a href="/subcategories/edit/{{$subcategory->id}}" class="btn btn-warning">Edit</a></td>
                        <td><a href="/subcategories/delete/{{$subcategory->id}}" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
            </table>
            </div>

        </div>
    </div>






@endsection