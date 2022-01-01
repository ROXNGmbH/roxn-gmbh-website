@extends('layouts.admin.app')

@section('page-title','Create Product Flag')

@section('content-header')
    <div class="content-header d-flex justify-content-between" style="width:100%">
        <div>
            <h2 class="content-title card-title">Create Product Flag</h2>
        </div>
    </div>
@stop

@section('main-content')
    <form action="{{route('product-flags.store')}}" method="post">
        @csrf
        <div class="card mb-4">
            <div class="card-header">
                <h4>Information</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="name_de" class="mb-2">Name (de)</label>
                        <input type="text" name="name_de" id="name_de"  value="{{old('name_de')}}" class="form-control"  placeholder="Enter flag name de ...">
                        @error('name_de')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <label for="name_ar" class="mb-2">Name (ar)</label>
                        <input type="text" name="name_ar" id="name_ar"  value="{{old('name_ar')}}" class="form-control" placeholder="Enter flag name ar ...">
                        @error('name_ar')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
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
