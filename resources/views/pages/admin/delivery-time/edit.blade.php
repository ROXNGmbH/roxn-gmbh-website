@extends('layouts.admin.app')

@section('page-title','Edit Delivery Time')

@section('content-header')
    <div class="content-header d-flex justify-content-between" style="width:100%">
        <div>
            <h2 class="content-title card-title">Edit Delivery Time</h2>
        </div>
    </div>
@stop

@section('main-content')

    <form action="{{route('delivery-times.update',$deliveryTime->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="row justify-content-start">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <label for="from">From</label>
                                <input type="number" value="{{$deliveryTime->from}}" name="from" id="from" class="form-control" required><br>
                            </div>
                            <div class="col-4">
                                <label for="to">To</label>
                                <input type="number" value="{{$deliveryTime->to}}" name="to" id="to" class="form-control" required><br>
                            </div>
                            <div class="col-4">
                                <label for="name">Type</label>
                                <select name="type"  required id="type" class="form-select">
                                    <option value=""  hidden> -- select Type -- </option>
                                    <option value="hour" @if($deliveryTime->type == 'hour') selected @endif>hour</option>
                                    <option value="day" @if($deliveryTime->type == 'day') selected @endif>day</option>
                                    <option value="week" @if($deliveryTime->type == 'week') selected @endif>week</option>
                                    <option value="month" @if($deliveryTime->type == 'month') selected @endif>month</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Save</button>

                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
