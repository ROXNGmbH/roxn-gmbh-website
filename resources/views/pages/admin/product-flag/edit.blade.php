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
        <div class="card mb-4">
            <div class="card-header">
                <h4>Information</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="name" class="mb-2">Name (de)</label>
                        <input type="text" name="name_de" value="{{$productFlag->NameAr}}" id="name"
                               class="form-control"><br>
                    </div>
                    <div class="col-lg-6">
                        <label for="name" class="mb-2">Name (ar)</label>
                        <input type="text" name="name_ar" value="{{$productFlag->NameDe}}" id="name"
                               class="form-control"><br>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex justify-content-end mt-3">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
@stop
