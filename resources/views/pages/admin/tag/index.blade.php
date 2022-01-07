@extends('layouts.admin.app')

@section('page-title','tags')

@section('content-header')
    <div class="content-header d-flex justify-content-between" style="width:100%">
        <div>
            <h2 class="content-title card-title">Tags</h2>
        </div>
        <div>
            <a href="{{route('tags.create')}}" class="btn btn-primary"><i class="text-muted material-icons md-post_add"></i>Create Tag</a>
        </div>
    </div>
@stop

@section('main-content')
    <div class="p-4 bg-white">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Name (Ar)</th>
                <th scope="col">Name (De)</th>
                <th scope="col">Date Created</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tags as $tag)
                <tr>
                    <th scope="row">{{$tag->id}}</th>
                    <td>
                        {{$tag->name_ar}}
                    </td>
                    <td>
                        {{$tag->name_de}}
                    </td>
                    <td>
                        {{$tag->created_at}}
                    </td>
                    <td>
                        <div class="d-flex">
                            <a href="{{route('tags.edit',$tag->id)}}"
                               class="btn btn-sm font-sm rounded btn-brand mr-2"> <i class="material-icons md-edit"></i>
                                Edit
                            </a>

                            <button type="button" class="btn btn-sm font-sm btn-light rounded mx-2"
                                    data-bs-toggle="modal" data-bs-target="#delete-{{$tag->id}}">
                                <i class="material-icons md-delete_forever"></i> Delete
                            </button>

                            <div class="modal fade" id="delete-{{$tag->id}}" tabindex="-1"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Tag</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure to delete tag ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm font-sm rounded btn-light mx-2"
                                                    data-bs-dismiss="modal">Close
                                            </button>
                                            <form action="{{route('tags.destroy',$tag->id)}}"
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
@stop
