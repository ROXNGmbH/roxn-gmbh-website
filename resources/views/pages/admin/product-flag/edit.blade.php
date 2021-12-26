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
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Information</h4>
                    </div>
                    <div class="card-body">
                        <div>
                            <label for="name">Name DE</label>
                            <input type="text" name="name_de" value="{{$productFlag->NameAr}}" id="name" class="form-control"><br>

                        </div>
                        <div>
                            <label for="name">Name AR</label>
                            <input type="text" name="name_ar" value="{{$productFlag->NameDe}}"  id="name" class="form-control"><br>
                        </div>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
