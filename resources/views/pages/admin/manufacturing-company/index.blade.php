@extends('layouts.admin.app')

@section('page-title','manufacturing companies')

@section('content-header')
    <div class="content-header d-flex justify-content-between" style="width:100%">
        <div>
            <h2 class="content-title card-title">manufacturing companies</h2>
        </div>
        <div>
            <a href="{{route('manufacturing-companies.create')}}" class="btn btn-primary"><i class="text-muted material-icons md-post_add"></i>Create manufacturing company</a>
        </div>
    </div>
@stop

@section('main-content')
    <div class="card mb-4">
        <div class="card-body">
            <article class="itemlist">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-sm-2 col-4">
                        #ID
                    </div>
                    <div class="col-lg-2 col-sm-4 col-8 flex-grow-1">
                        Image
                    </div>
                    <div class="col-lg-2 col-sm-2 col-4">
                        Name (ar)
                    </div>
                    <div class="col-lg-2 col-sm-2 col-4">
                        Name (de)
                    </div>
                    <div class="col-lg-2 col-sm-2 col-4 col-date">
                        Date Created
                    </div>
                    <div class="col-lg-2 col-sm-2 col-4 col-action text-center">
                        Action
                    </div>
                </div>
            </article>
            @foreach($manufacturing_companies as $company)
                <article class="itemlist">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-sm-2 col-4 ">
                            {{$company->id}}
                        </div>
                        <div class="col-lg-2 col-sm-4 col-8 flex-grow-1">
                            <a class="itemside" href="#">
                                <div class="left">
                                    <img src="{{$company->image}}" class="img-sm img-thumbnail" alt="Item">
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-2 col-sm-2 col-4">
                            {{$company->name_ar}}
                        </div>
                        <div class="col-lg-2 col-sm-2 col-4">
                            {{$company->name_de}}
                        </div>
                        <div class="col-lg-2 col-sm-2 col-4">
                            {{$company->created_at}}
                        </div>
                        <div class="col-lg-2 col-sm-2 col-4 col-action text-center d-flex">
                            <a href="{{route('manufacturing-companies.edit',$company->id)}}" class="btn btn-sm mx-2 font-sm rounded btn-brand"> <i class="material-icons md-edit"></i> Edit </a>
                            <form action="{{route('manufacturing-companies.destroy',$company->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm font-sm btn-light rounded">
                                    <i class="material-icons md-delete_forever"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- row .// -->
                </article>
            @endforeach
        </div>
        <!-- card-body end// -->
    </div>
    {{$manufacturing_companies->links()}}
@stop
