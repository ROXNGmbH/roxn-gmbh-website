@extends('layouts.admin.app')

@section('page-title','Edit tax')

@section('content-header')
    <div class="content-header d-flex justify-content-between" style="width:100%">
        <div>
            <h2 class="content-title card-title">Edit Tax</h2>
        </div>
    </div>
@stop

@section('main-content')
    <form action="{{route('tax.update',$tax->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Information</h4>
                    </div>
                    <div class="card-body">
                        <label for="tax">Tax</label>
                        <input type="number" step=0.1  name="tax" value="{{$tax->tax}}" id="name" class="form-control"><br>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
