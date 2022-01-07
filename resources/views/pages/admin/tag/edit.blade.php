@extends('layouts.admin.app')

@section('page-title','Edit tag')

@section('content-header')
    <div class="content-header d-flex justify-content-between" style="width:100%">
        <div>
            <h2 class="content-title card-title">Edit Tag</h2>
        </div>
    </div>
@stop

@section('main-content')
    <form action="{{route('tags.update',$tag->id)}}" method="post">
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
                                <label for="name_ar" class="mb-2">Name (Ar)</label>
                                <input type="text" value="{{$tag->name_ar}}" name="name_ar" id="name_ar" class="form-control"><br>
                                @error('name_ar')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="name_de" class="mb-2">Name (De)</label>
                                <input type="text" value="{{$tag->name_de}}" name="name_de" id="name_de" class="form-control"><br>
                                @error('name_de')
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
