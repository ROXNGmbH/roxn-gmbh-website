@extends('layouts.admin.app')

@section('page-title','Edit'.$page->name_de)

@section('content-header')
    <div class="content-header d-flex justify-content-between" style="width:100%">
        <div>
            <h2 class="content-title card-title">Edit {{$page->name_de}}</h2>
        </div>
    </div>
@stop

@section('main-content')
    <form action="{{route('pages.update',$page->id)}}" method="post">
        @csrf
        @method('put')
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
                                <input type="text" value="{{$page->name_ar}}" step="0.1" min="0" name="name_ar"  required class="form-control"><br>
                                @error('name_ar')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-5 col-12">
                                <label for="name">Name (de)</label>
                                <input type="text" value="{{$page->name_de}}" step="0.1" min="0" name="name_de"  required class="form-control"><br>
                                @error('name_de')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-5 col-12">
                                <label for="title">Title (ar)</label>
                                <input type="text" value="{{$page->title_ar}}" step="0.1" min="0" name="title_ar"  required class="form-control"><br>
                                @error('title_ar')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-5 col-12">
                                <label for="title">Title (de)</label>
                                <input type="text" value="{{$page->title_de}}" step="0.1" min="0" name="title_de" required class="form-control"><br>
                                @error('title_ar')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="required fw-bold fs-6 mb-2">Description (ar)</label>
                                <textarea name="description_ar">{!!$page->description_ar !!}</textarea>
                                @error('description_ar')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="required fw-bold fs-6 mb-2">Description (de)</label>
                                <textarea name="description_de">{!!$page->description_de !!}</textarea>
                                @error('description_ar')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12">
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
