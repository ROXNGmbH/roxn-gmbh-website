@extends('layouts.admin.app')

@section('page-title','Edit unit')

@section('content-header')
    <div class="content-header d-flex justify-content-between" style="width:100%">
        <div>
            <h2 class="content-title card-title">Edit Unit</h2>
        </div>
    </div>
@stop

@section('main-content')
    <form action="{{route('units.update',$unit->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Information</h4>
                    </div>
                    <div class="card-body">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{$unit->name}}" id="name" class="form-control"><br>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
