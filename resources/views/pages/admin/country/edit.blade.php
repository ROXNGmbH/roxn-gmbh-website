@extends('layouts.admin.app')

@section('page-title','Edit country')

@section('content-header')
    <div class="content-header d-flex justify-content-between" style="width:100%">
        <div>
            <h2 class="content-title card-title">Edit Country</h2>
        </div>
    </div>
@stop

@section('main-content')
    <form action="{{route('countries.update',$country->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <label for="name">Name</label>
                                <input type="text"  value="{{$country->name}}" name="name" id="name" class="form-control"><br>
                                @error('name')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="flag">Flag</label>
                                <input type="file" id="flag" name="image" id="image" class="form-control"><br>
                                <img src="{{$country->image}}" width="50" height="50" alt="">
                                @error('image')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
