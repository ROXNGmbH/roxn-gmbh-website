@extends('layouts.admin.app')

@section('page-title','products')

@section('content-header')
    <div class="content-header d-flex justify-content-between" style="width:100%">
        <div>
            <h2 class="content-title card-title">Products</h2>
        </div>
        <div>
            <a href="{{route('products.create')}}" class="btn btn-primary"><i class="text-muted material-icons md-post_add"></i>Create product</a>
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
            @foreach($products as $product)
                <article class="itemlist">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-sm-2 col-4 ">
                            {{$product->id}}
                        </div>
                        <div class="col-lg-2 col-sm-4 col-8 flex-grow-1">
                            <a class="itemside" href="#">
                                <div class="left">
                                    <img src="{{$product->image}}" class="img-sm img-thumbnail" alt="Item">
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-2 col-sm-2 col-4">
                            {{$product->name_ar}}
                        </div>
                        <div class="col-lg-2 col-sm-2 col-4">
                            {{$product->name_de}}
                        </div>
                        <div class="col-lg-2 col-sm-2 col-4">
                            {{$product->created_at}}
                        </div>
                        <div class="col-lg-2 col-sm-2 col-4 col-action text-center d-flex justify-content-between">
                            <a href="{{route('products.edit',$product->id)}}" class="btn btn-sm font-sm rounded btn-brand"> <i class="material-icons md-edit"></i> Edit </a>
                            <form action="{{route('products.destroy',$product->id)}}" method="post">
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
    {{$products->links()}}
@stop
