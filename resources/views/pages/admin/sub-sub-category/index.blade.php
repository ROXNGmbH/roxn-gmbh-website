@extends('layouts.admin.app')

@section('page-title','sub sub categories')

@section('content-header')
    <div class="content-header d-flex justify-content-between" style="width:100%">
        <div>
            <h2 class="content-title card-title">Sub Sub Categories</h2>
        </div>
        <div>
            <a href="{{route('sub-sub-categories.create')}}" class="btn btn-primary"><i
                    class="text-muted material-icons md-post_add"></i>Create sub sub category</a>
        </div>
    </div>
@stop

@section('main-content')
    <div class="p-4 bg-white">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Image</th>
                <th scope="col">Name (ar)</th>
                <th scope="col">Name (de)</th>
                <th scope="col">Category</th>
                <th scope="col">Sub Category</th>
                <th scope="col">Date Created</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sub_sub_categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>
                        <img src="{{$category->image}}" style="width:100px;height:100px" class="img-thumbnail" alt="Item">
                    </td>
                    <td>
                        {{$category->name_ar}}
                    </td>
                    <td>
                        {{$category->name_de}}
                    </td>
                    <td>
                        {{$category->subCategory->name_de}}
                    </td>
                    <td>
                        {{$category->subCategory->category->name_de}}
                    </td>
                    <td>
                        {{$category->created_at}}
                    </td>
                    <td>
                        <div class="d-flex">
                            <a href="{{route('sub-sub-categories.edit',$category->id)}}"
                               class="btn btn-sm font-sm rounded btn-brand mr-2"> <i class="material-icons md-edit"></i>
                                Edit
                            </a>

                            <button type="button" class="btn btn-sm font-sm btn-light rounded mx-2"
                                    data-bs-toggle="modal" data-bs-target="#delete-{{$category->id}}">
                                <i class="material-icons md-delete_forever"></i> Delete
                            </button>

                            <div class="modal fade" id="delete-{{$category->id}}" tabindex="-1"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Sub Category</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure to delete sub sub category ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm font-sm rounded btn-light mx-2"
                                                    data-bs-dismiss="modal">Close
                                            </button>
                                            <form action="{{route('sub-sub-categories.destroy',$category->id)}}"
                                                  method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm font-sm rounded btn-brand mr-2">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="p-4 bg-white d-flex justify-content-center align-items-center">
        {{$sub_sub_categories->links()}}
    </div>
@stop
