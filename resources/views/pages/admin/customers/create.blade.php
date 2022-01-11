@extends('layouts.admin.app')

@section('page-title','Create Customer ')

@section('content-header')
    <div class="content-header d-flex justify-content-between" style="width:100%">
        <div>
            <h2 class="content-title card-title">Create Customer</h2>
        </div>
    </div>
@stop

@section('main-content')
    <form action="{{route('customers.store')}}" id="register" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" value="{{old('name')}}" name="name" placeholder="Enter name  ..."
                                           class="form-control" id="name">
                                    @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="title" class="form-label">Title</label>
                                    <div>
                                        <select name="title" id="title" class="w-100" required>
                                            <option hidden> -- select Title -- </option>
                                            <option value="Keine Angabe">Keine Angabe</option>
                                            <option value="Frau">Frau</option>
                                            <option value="Herr">Herr</option>
                                        </select>
                                    </div>
                                    @error('title')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="converse" value="{{old('converse')}}" class="form-label">converse</label>
                                    <input type="text" name="converse" placeholder="Enter converse  ..."
                                           class="form-control" id="converse">
                                    @error('converse')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="nickname" value="{{old('nickname')}}" class="form-label">Nickname</label>
                                    <input type="text" name="nickname" placeholder="Enter nickname  ..."
                                           class="form-control" id="nickname">
                                    @error('nickname')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="type" class="form-label">Type</label>
                                    <div>
                                        <select name="type" id="type" class="w-100" required>
                                            <option  hidden> -- select Type -- </option>
                                            <option value="business">Gewerblich</option>
                                            <option value="private">Privat</option>
                                        </select>
                                    </div>
                                    @error('type')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="email"  value="{{old('email')}}" class="form-label">Email</label>
                                    <input type="text" name="email" placeholder="Enter email  ..."
                                           class="form-control" id="name">
                                    @error('email')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="mobile"  value="{{old('mobile')}}" class="form-label">Mobile</label>
                                    <input type="text" name="mobile" placeholder="Enter mobile  ..."
                                           class="form-control" id="mobile">
                                    @error('name_ar')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password"
                                           class="form-control" id="password">
                                    @error('password')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="password_confirm" class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirm"
                                           class="form-control" id="password">
                                    @error('password_confirm')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div style="margin-bottom: 200px">
                                    <label for="status" class="form-label">Status</label>
                                    <div>
                                        <select name="status" id="status" class="w-100" required>
                                            <option  hidden> -- select Status -- </option>
                                            <option value="active">active</option>
                                            <option value="pending">pending</option>
                                            <option value="blocked">blocked</option>
                                        </select>
                                    </div>
                                    @error('status')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="d-flex justify-content-end pt-2 mt-5">
                                    <button class="btn btn-primary" type="submit">add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Location</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="mb-4">
                                <label for="address"  value="{{old('address')}}" class="form-label">Department Number and street </label>
                                <input type="text" form="register" name="address" placeholder="Enter address  ..."
                                       class="form-control" id="address">
                                @error('address')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                <label for="zip_code"  value="{{old('zip_code')}}" class="form-label">Zip Code </label>
                                <input type="text" form="register" name="zip_code" placeholder="Enter zip_code  ..."
                                       class="form-control" id="zip_code">
                                @error('zip_code')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                <label for="area"  value="{{old('area')}}" class="form-label">Area </label>
                                <input type="text" form="register" name="area" placeholder="Enter Area  ..."
                                       class="form-control" id="area">
                                @error('area')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div  style="margin-bottom: 150px">
                                <label for="country"  value="{{old('nickname')}}" class="form-label">Country</label>
                                <div>
                                    <select name="country" id="country" class="w-100">
                                        <option value="" hidden> -- select Country -- </option>
                                        <option value="Deutschland">Deutschland</option>
                                    </select>
                                </div>
                                @error('country')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
@section('scripts')
    <script src="{{asset('assets/admin/js/custom.nice-select.js')}}"></script>
@endsection
