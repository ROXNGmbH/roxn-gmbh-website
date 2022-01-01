@extends('layouts.admin.app')

@section('page-title','Create unit')

@section('content-header')
    <div class="content-header d-flex justify-content-between" style="width:100%">
        <div>
            <h2 class="content-title card-title">Create Unit</h2>
        </div>
    </div>
@stop

@section('main-content')
    <form action="{{route('units.store')}}" method="post">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Information</h4>
                    </div>
                    <div class="card-body">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control"><br>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
