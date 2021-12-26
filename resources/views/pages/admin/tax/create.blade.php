@extends('layouts.admin.app')

@section('page-title','Create tax')

@section('content-header')
    <div class="content-header d-flex justify-content-between" style="width:100%">
        <div>
            <h2 class="content-title card-title">Create Tax</h2>
        </div>
    </div>
@stop

@section('main-content')
    <form action="{{route('tax.store')}}" method="post">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Information</h4>
                    </div>
                    <div class="card-body">
                        <label for="tax">Tax</label>
                        <input type="number" step="0.1" min="0" name="tax" id="tax" class="form-control"><br>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop