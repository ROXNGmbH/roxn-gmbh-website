@extends('layouts.admin.app')

@section('page-title','Create Delivery Time')

@section('content-header')
    <div class="content-header d-flex justify-content-between" style="width:100%">
        <div>
            <h2 class="content-title card-title">Create Delivery Time</h2>
        </div>
    </div>
@stop

@section('main-content')
    <form action="{{route('delivery-times.store')}}" method="post">
        @csrf
        <div class="card mb-4">
            <div class="card-header">
                <h4>Information</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <label for="from" class="mb-2">From</label>
                        <input type="number" name="from" id="from" value="{{old('from')}}" class="form-control" placeholder="Enter number from ...">
                        @error('from')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-4">
                        <label for="to" class="mb-2">To</label>
                        <input type="number" name="to" id="to" value="{{old('to')}}" class="form-control" placeholder="Enter number to ...">
                        @error('to')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-4">
                        <label for="name" class="mb-2">Type</label>
                        <select name="type"  id="type" class="form-select">
                            <option value="" hidden> -- select Type --</option>
                            <option value="hour">hour</option>
                            <option value="day">day</option>
                            <option value="week">week</option>
                            <option value="month">month</option>
                        </select>
                        @error('type')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </div>
        </div>
    </form>
@stop

@section('scripts')
    <script src="{{asset('assets/admin/js/custom.select2.js')}}" type="text/javascript"></script>
@endsection
