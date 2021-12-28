@extends('layouts.admin.app')

@section('page-title','Website Pages')

@section('content-header')
    <div class="content-header d-flex justify-content-between" style="width:100%">
        <div>
            <h2 class="content-title card-title">Pages</h2>
        </div>
    </div>
@stop

@section('main-content')
    <div class="card mb-4">
        <div class="card-body">
            <article class="itemlist">
                <div class="row align-items-center">
                    <div class="col-lg-1 col-sm-2 col-4">
                        #ID
                    </div>
                    <div class="col-lg-1 col-sm-2 col-4">
                        Name (ar)
                    </div>
                    <div class="col-lg-1 col-sm-2 col-4 col-date">
                        Name (de)
                    </div>
                    <div class="col-lg-1 col-sm-2 col-4">
                        Title (ar)
                    </div>
                    <div class="col-lg-1 col-sm-2 col-4 col-date">
                        Title (de)
                    </div>
                    <div class="col-lg-3 col-sm-2 col-4">
                        Description (ar)
                    </div>
                    <div class="col-lg-3 col-sm-2 col-4 col-date">
                        Description (de)
                    </div>
                    <div class="col-lg-1 col-sm-2 col-4 col-action text-center">
                        Action
                    </div>
                </div>
            </article>
            @foreach($pages as $page)
                <article class="itemlist">
                    <div class="row align-items-center">
                        <div class="col-lg-1 col-sm-2 col-4 ">
                            {{$page->id}}
                        </div>
                        <div class="col-lg-1 col-sm-2 col-4">
                            {{$page->name_ar}}
                        </div>
                        <div class="col-lg-1 col-sm-2 col-4">
                            {{$page->name_de}}
                        </div>
                        <div class="col-lg-1 col-sm-2 col-4">
                            {{$page->title_ar}}
                        </div>
                        <div class="col-lg-1 col-sm-2 col-4">
                            {{$page->title_de}}
                        </div>
                        <div class="col-lg-3 col-sm-2 col-4">
                            {!! Str::limit($page->description_ar,100,$end='......') !!}
                        </div>
                        <div class="col-lg-3 col-sm-2 col-4">
                            {!! Str::limit($page->description_de,100,$end='......') !!}
                        </div>
                        <div class="col-lg-1 col-sm-2 col-4 col-action text-center d-flex justify-content-between">
                            <a href="{{route('pages.edit',$page->id)}}" class="btn btn-sm font-sm rounded btn-brand"> <i class="material-icons md-edit"></i> Edit </a>
                        </div>
                    </div>
                    <!-- row .// -->
                </article>
            @endforeach
        </div>
        <!-- card-body end// -->
    </div>
@stop
