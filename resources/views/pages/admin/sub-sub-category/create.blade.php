@extends('layouts.admin.app')

@section('page-title','Create sub sub category')

@section('page-head')
    <style>
        .card {
            min-height: 400px;
        }
    </style>
@endsection

@section('content-header')
    <div class="content-header d-flex justify-content-between" style="width:100%">
        <div>
            <h2 class="content-title card-title">Create sub Sub Category</h2>
        </div>
    </div>
@stop

@section('main-content')

    <form action="{{route('sub-sub-categories.store')}}" method="post" enctype="multipart/form-data" >
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
                                    <input type="text" name="name_ar" value="{{old('name_ar')}}" placeholder="Enter category name arabic ..."
                                           class="form-control" id="name_ar">
                                    @error('name_ar')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="name_de" class="form-label">Name (de)</label>
                                    <input type="text" name="name_de" value="{{old('name_de')}}" placeholder="Enter category name german ..."
                                           class="form-control" id="name_de">
                                    @error('name_de')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="category_id" class="form-label">Category</label>
                                    <div>
                                        <select name="category" id="category" class="w-100 category">
                                            <option value="" hidden> -- select category -- </option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name_ar . ' - '. $category->name_de}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('category_id')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="sub_category_id" class="form-label">Sub Category</label>
                                    <div>
                                        <select name="sub_category" id="sub_category" class="w-100">
                                            <option value=""  hidden> -- select sub category -- </option>
                                        </select>
                                    </div>
                                    @error('category_id')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="mt-5">Status</p>
                                <label class="form-check mb-3">
                                    <input class="form-check-input" value="{{old('status')}}" type="checkbox" name="status">
                                    <span class="form-check-label"> Active </span>
                                </label>
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
{{--    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>--}}
    <script>
        //image preview
        var loadFile = function(event) {
            var output = document.getElementById('image');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.style.width = '30%';
            output.style.height = '100%';
            output.onload = function() {
                URL.revokeObjectURL(output.src)
            }
        };
        //get sub category by category
        //select 2
        $(function(){
            $('#category').select2({
                placeholder: "Select Category"
            }).on('change', function(e) {
                let category  = $("#category").val();
                console.log(category);
                axios.get('/api/sub-categories/'+category)
                    .then(function (response) {
                        let categories = response.data.sub_categories;
                        let options = '<option value=""  hidden> -- select sub category -- </option>';
                        $.each(categories, function (index,category) {
                            options+= `<option value="${category.id}">${category.name_ar}-${category.name_de}</option>`
                        });
                        $('#sub_category').html(options);
                        $('#sub_category').trigger('change');
                    })
                    .catch(function (error) {
                        swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            timer: 3000,
                            showConfirmButton: false,
                            target: '#custom-target',
                            customClass: {
                                container: 'position-absolute'
                            },
                            toast: true,
                            position: 'top-right'
                        });
                    });
            });

        });
        $(function(){
            $('#sub_category').select2({
                placeholder: "Select Sub Category"
            });

        });
    </script>
@endsection
