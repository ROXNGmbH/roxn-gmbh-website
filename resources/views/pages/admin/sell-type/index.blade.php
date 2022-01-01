@extends('layouts.admin.app')

@section('page-title','sell types')

@section('content-header')
    <div class="content-header d-flex justify-content-between" style="width:100%">
        <div>
            <h2 class="content-title card-title">Sell Types</h2>
        </div>
        <div>
            <a href="{{route('sell-types.create')}}" class="btn btn-primary"><i class="text-muted material-icons md-post_add"></i>Create Sell Type</a>
        </div>
    </div>
@stop

@section('main-content')
    <div class="p-4 bg-white">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Name (ar)</th>
                <th scope="col">Name (de)</th>
                <th scope="col">Date Created</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($sell_types as $type)
                    <tr>
                        <td> {{$type->id}}</td>
                        <td> {{$type->NameAr}}</td>
                        <td> {{$type->NameDe}}</td>
                        <td> {{$type->created_at}}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{route('sell-types.edit',$type->id)}}" class="btn btn-sm font-sm rounded btn-brand mx-2"> <i class="material-icons md-edit"></i> Edit </a>
                            <button type="button" class="btn btn-sm font-sm btn-light rounded mx-2" data-bs-toggle="modal" data-bs-target="#delete-{{$type->id}}">
                                <i class="material-icons md-delete_forever"></i> Delete
                            </button>

                            <div class="modal fade" id="delete-{{$type->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Sell Type</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure to sell type ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm font-sm rounded btn-light mx-2" data-bs-dismiss="modal">Close</button>
                                            <form action="{{route('sell-types.destroy',$type->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm font-sm rounded btn-brand mr-2">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
