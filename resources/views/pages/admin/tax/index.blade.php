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
    <div class="p-4 bg-white">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Number tax</th>
                <th scope="col">Date Created</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tax as $value)
                <tr>
                    <th scope="row">{{$value->id}}</th>
                    <td>
                        {{$value->tax}}
                    </td>
                    <td>
                        {{$value->created_at}}
                    </td>
                    <td>
                        <div class="d-flex">
                            <a href="{{route('tax.edit',$value->id)}}"
                               class="btn btn-sm font-sm rounded btn-brand mr-2"> <i class="material-icons md-edit"></i>
                                Edit
                            </a>

                            <button type="button" class="btn btn-sm font-sm btn-light rounded mx-2"
                                    data-bs-toggle="modal" data-bs-target="#delete-{{$value->id}}">
                                <i class="material-icons md-delete_forever"></i> Delete
                            </button>

                            <div class="modal fade" id="delete-{{$value->id}}" tabindex="-1"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Tax</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure to delete tax ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm font-sm rounded btn-light mx-2"
                                                    data-bs-dismiss="modal">Close
                                            </button>
                                            <form action="{{route('tax.destroy',$value->id)}}"
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
