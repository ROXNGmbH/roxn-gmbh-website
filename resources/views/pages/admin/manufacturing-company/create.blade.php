@extends('layouts.admin.app')

@section('page-title','Create Manufacturing Company')

@section('content-header')
    <div class="content-header d-flex justify-content-between" style="width:100%">
        <div>
            <h2 class="content-title card-title">Create Manufacturing Company</h2>
        </div>
    </div>
@stop

@section('main-content')
    <form action="{{route('manufacturing-companies.store')}}" method="post" enctype="multipart/form-data">
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
                                    <label for="name_ar" class="form-label">Name (ar)</label>
                                    <input type="text" name="name_ar" placeholder="Enter manufacturing company name ar ..."
                                           class="form-control" id="name_ar">
                                    @error('name_ar')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="name_de" class="form-label">Name (de)</label>
                                    <input type="text" name="name_de" placeholder="Enter manufacturing company name de ..."
                                           class="form-control" id="name_de">
                                    @error('name_de')
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
                        <h4>Media</h4>
                    </div>
                    <div class="card-body">
                        <div class="input-upload">
                            <img src="{{asset('assets/admin/imgs/theme/upload.svg')}}" width="200" height="100" alt="" id="image">
                            <input class="form-control" onchange="loadFile(event)" type="file" accept=".jpg, .jpeg, .png" name="image">

                            @error('image')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
@section('scripts')
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('image');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.style.width = '30%';
            output.style.height = '100%';
            output.onload = function() {
                URL.revokeObjectURL(output.src)
            }
        };
    </script>
@endsection
