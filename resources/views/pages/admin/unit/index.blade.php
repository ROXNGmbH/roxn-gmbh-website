@extends('layouts.admin.app')

@section('page-title','units')

@section('content-header')
    <div class="content-header d-flex justify-content-between" style="width:100%">
        <div>
            <h2 class="content-title card-title">Units</h2>
        </div>
        <div>
            <a href="{{route('units.create')}}" class="btn btn-primary"><i class="text-muted material-icons md-post_add"></i>Create Unit</a>
        </div>
    </div>
@stop

@section('main-content')
    <div class="p-4 bg-white">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Name</th>
                <th scope="col">Date Created</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($units as $unit)
                <tr>
                    <th scope="row">{{$unit->id}}</th>
                    <td>
                        {{$unit->name}}
                    </td>
                    <td>
                        {{$unit->created_at}}
                    </td>
                    <td>
                        <div class="d-flex">
                            <a href="{{route('units.edit',$unit->id)}}"
                               class="btn btn-sm font-sm rounded btn-brand mr-2"> <i class="material-icons md-edit"></i>
                                Edit
                            </a>

                            <button type="button" class="btn btn-sm font-sm btn-light rounded mx-2"
                                    data-bs-toggle="modal" data-bs-target="#delete-{{$unit->id}}">
                                <i class="material-icons md-delete_forever"></i> Delete
                            </button>

                            <div class="modal fade" id="delete-{{$unit->id}}" tabindex="-1"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Unit</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure to delete unit ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm font-sm rounded btn-light mx-2"
                                                    data-bs-dismiss="modal">Close
                                            </button>
                                            <form action="{{route('units.destroy',$unit->id)}}"
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
