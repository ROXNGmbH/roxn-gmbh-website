@extends('layouts.admin.app')

@section('page-title','Edit sub category')

@section('content-header')
    <div class="content-header d-flex justify-content-between" style="width:100%">
        <div>
            <h2 class="content-title card-title">Edit Sub Category</h2>
        </div>
    </div>
@stop

@section('main-content')
    <form action="{{route('sub-categories.update',$sub_category->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
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
                                    <input type="text" value="{{$sub_category->name_ar}}" name="name_ar"
                                           placeholder="Enter category name arabic ..."
                                           class="form-control" id="name_ar">
                                    @error('name_ar')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="name_de" class="form-label">Name (de)</label>
                                    <input type="text" value="{{$sub_category->name_de}}" name="name_de"
                                           placeholder="Enter category name german ..."
                                           class="form-control" id="name_de">
                                    @error('name_de')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="category_id" class="form-label">Category</label>
                                    <select name="category_id" id="category_id" class="form-select form-control">
                                        <option value="" hidden> -- select category -- </option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" @if($category->id == $sub_category->category_id) selected @endif>{{$category->name_ar . ' - '. $category->name_de}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="mt-5">Status</p>
                                <label class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" @if($sub_category->status) checked
                                           @endif name="status">
                                    <span class="form-check-label"> Active </span>
                                </label>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex justify-content-end pt-2 mt-5">
                                    <button class="btn btn-primary" type="submit">edit</button>
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
                            <img src="{{$sub_category->image}}" width="200" height="100" alt="" id="image">
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
        var loadFile = function (event) {
            var output = document.getElementById('image');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.style.width = '30%';
            output.style.height = '100%';
            output.onload = function () {
                URL.revokeObjectURL(output.src)
            }
        };
    </script>
@endsection
