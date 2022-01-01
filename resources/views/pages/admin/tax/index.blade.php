@extends('layouts.admin.app')

@section('page-title','tax')

@section('content-header')
    <div class="content-header d-flex justify-content-between" style="width:100%">
        <div>
            <h2 class="content-title card-title">Tax</h2>
        </div>
        <div>
            <a href="{{route('tax.create')}}" class="btn btn-primary"><i class="text-muted material-icons md-post_add"></i>Create Tax</a>
        </div>
    </div>
@stop

@section('main-content')
    <div class="card mb-4">
        <div class="card-body">
            <article class="itemlist">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-sm-2 col-4">
                        #ID
                    </div>
                    <div class="col-lg-3 col-sm-2 col-4">
                        Number tax
                    </div>
                    <div class="col-lg-3 col-sm-2 col-4 col-date">
                        Date Created
                    </div>
                    <div class="col-lg-3 col-sm-2 col-4 col-action text-center">
                        Action
                    </div>
                </div>
            </article>
            @foreach($tax as $value)
                <article class="itemlist">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-sm-2 col-4 ">
                            {{$value->id}}
                        </div>
                        <div class="col-lg-3 col-sm-2 col-4">
                            {{$value->tax}}
                        </div>
                        <div class="col-lg-3 col-sm-2 col-4">
                            {{$value->created_at}}
                        </div>
                        <div class="col-lg-3 col-sm-2 col-4 col-action text-center d-flex justify-content-center">
                            <a href="{{route('tax.edit',$value->id)}}" class="btn btn-sm font-sm rounded btn-brand"> <i class="material-icons md-edit"></i> Edit </a>
                            <form action="{{route('tax.destroy',$value->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm font-sm btn-light rounded mx-2">
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
@stop
