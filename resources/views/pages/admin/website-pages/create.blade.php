@extends('layouts.admin.app')

@section('page-title','Add New Page')

@section('content-header')
    <div class="content-header d-flex justify-content-between" style="width:100%">
        <div>
            <h2 class="content-title card-title">Add New Page</h2>
        </div>
    </div>
@stop

@section('main-content')
    <form action="{{route('pages.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-5 col-12">
                                <label for="name">Name (ar)</label>
                                <input type="text" value="{{old('name_ar')}}" step="0.1" min="0" name="name_ar"   class="form-control"><br>
                                @error('name_ar')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-lg-5 col-12">
                                <label for="name">Name (de)</label>
                                <input type="text" value="{{old('name_de')}}"  name="name_de"   class="form-control"><br>
                                @error('name_de')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-lg-5 col-12">
                                <label for="title">Title (ar)</label>
                                <input type="text" value="{{old('title_ar')}}"  name="title_ar"   class="form-control"><br>
                                @error('title_ar')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-lg-5 col-12">
                                <label for="title">Title (de)</label>
                                <input type="text" value="{{old('title_de')}}"  name="title_de"  class="form-control"><br>
                                @error('title_de')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="required fw-bold fs-6 mb-2">Description (ar)</label>
                                <textarea name="description_ar">{!! old('description_ar') !!}</textarea>
                                @error('description_ar')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="required fw-bold fs-6 mb-2">Description (de)</label>
                                <textarea name="description_de">{!! old('description_de') !!}</textarea>
                                @error('description_de')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            <div class="col-12 d-flex justify-content-end">
                                <button class="btn btn-primary my-2" type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
@section('scripts')
    <script>
        CKEDITOR.replace( 'description_ar' );
        CKEDITOR.replace( 'description_de' );
    </script>
@endsection
