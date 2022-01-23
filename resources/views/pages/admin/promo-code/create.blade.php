@extends('layouts.admin.app')

@section('page-title','Create promo code')

@section('content-header')
    <div class="content-header d-flex justify-content-between" style="width:100%">
        <div>
            <h2 class="content-title card-title">Create Promo Code</h2>
        </div>
    </div>
@stop

@section('main-content')
    <form action="{{route('promo-codes.store')}}" method="post" x-data="{ type: 'percentage' }">
        @csrf
        <div class="card mb-4">
            <div class="card-header">
                <h4>Information</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <label for="code" class="mb-2">Code</label>
                        <input type="text" value="{{old('code')}}" name="code" id="name_de" class="form-control" required><br>
                        @error('code')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="type" class="form-label">Type</label>
                            <div>
                                <select name="type" id="type" x-model="type" class="w-100 form-select">
                                    <option value="" hidden> -- select type -- </option>
                                    <option value="fixed" >fixed</option>
                                    <option value="percentage" >percentage</option>
                                </select>
                            </div>
                            @error('type')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6" x-show="type == 'percentage' ">
                        <label for="value_percentage" class="mb-2">Value (by percentage) </label>
                        <input type="text" value="{{old('value_percentage')}}" name="value_percentage" id="value_percentage" class="form-control" ><br>
                        @error('value_percentage')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6" x-show="type ==  'fixed' ">
                        <label for="value_fixed" class="mb-2">Value (fixed) </label>
                        <input type="text" value="{{old('value_fixed')}}" name="value_fixed" id="value_fixed" class="form-control" ><br>
                        @error('value_fixed')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <label for="valid_price" class="mb-2">Valid Use Price </label>
                        <input type="text" value="{{old('valid_price')}}" name="valid_price" id="valid_price" class="form-control" ><br>
                        @error('valid_price')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <label for="use_number" class="mb-2">Total Use Number </label>
                        <input type="text" value="{{old('use_number')}}" name="use_number" id="use_number" class="form-control" ><br>
                        @error('use_number')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <label for="from" class="mb-2">Active From</label>
                        <input type="date" value="{{old('from')}}" name="from" id="from" class="form-control" ><br>
                        @error('from')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <label for="to" class="mb-2">Active To</label>
                        <input type="date" value="{{old('to')}}" name="to" id="to" class="form-control" ><br>
                        @error('from')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <p class="mt-5">Status</p>
                        <label class="form-check mb-3">
                            <input class="form-check-input"  type="checkbox" name="status">
                            <span class="form-check-label"> Active </span>
                        </label>
                        @error('status')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="row align-items-end justify-content-end">
                    <div class="col-lg-12">
                        <div class="d-flex justify-content-end pt-2 mt-5">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

