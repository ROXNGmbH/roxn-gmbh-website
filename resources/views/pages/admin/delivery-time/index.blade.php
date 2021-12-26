@extends('layouts.admin.app')

@section('page-title','delivery times')

@section('content-header')
    <div class="content-header d-flex justify-content-between" style="width:100%">
        <div>
            <h2 class="content-title card-title">Delivery Times</h2>
        </div>
        <div>
            <a href="{{route('delivery-times.create')}}" class="btn btn-primary"><i class="text-muted material-icons md-post_add"></i>Create Delivery Times</a>
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
                        Time
                    </div>
                    <div class="col-lg-3 col-sm-2 col-4 col-action text-center">
                        Action
                    </div>
                </div>
            </article>
            @foreach($times as $time)
                <article class="itemlist">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-sm-2 col-4 ">
                            {{$time->id}}
                        </div>
                        <div class="col-lg-3 col-sm-2 col-4">
                            {{$time->from}} - {{$time->to}}  {{$time->type}}
                        </div>
                        <div class="col-lg-3 col-sm-2 col-4 col-action text-center d-flex justify-content-center ">
                            <a href="{{route('delivery-times.edit',$time->id)}}" class="btn btn-sm font-sm rounded btn-brand mx-2"> <i class="material-icons md-edit"></i> Edit </a>
                            <form action="{{route('delivery-times.destroy',$time->id)}}" method="post">
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
@stop
