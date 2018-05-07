@extends('layouts.app')
@section('title','Update Category')
@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">
                        Update Category
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
                        <form method="post" action="/categories/storeEdit" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$category->id}}">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">
                                    Name
                                </label>
                                <div class="col-md-6">
                                    <input value="{{$category->name}}"  type="text" name="name" class="form-control">
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