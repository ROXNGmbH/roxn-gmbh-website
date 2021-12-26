@extends('layouts.admin.app')

@section('page-title','Edit Sell Type')

@section('content-header')
    <div class="content-header d-flex justify-content-between" style="width:100%">
        <div>
            <h2 class="content-title card-title">Edit Product Flag</h2>
        </div>
    </div>
@stop

@section('main-content')
    <form action="{{route('product-flags.update',$productFlag->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Information</h4>
                    </div>
                    <div class="card-body">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{$productFlag->name}}" id="name" class="form-control"><br>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
