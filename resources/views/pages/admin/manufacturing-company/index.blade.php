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
    <div class="p-4 bg-white">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Image</th>
                <th scope="col">Name (ar)</th>
                <th scope="col">Name (de)</th>
                <th scope="col">Date Created</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($manufacturing_companies as $company)
                <tr>
                    <th scope="row">{{$company->id}}</th>
                    <td>
                        <img src="{{$company->image}}" style="width:100px;height:100px" class="img-thumbnail" alt="Item">
                    </td>
                    <td>
                        {{$company->name_ar}}
                    </td>
                    <td>
                        {{$company->name_de}}
                    </td>
                    <td>
                        {{$company->created_at}}
                    </td>
                    <td>
                        <div class="d-flex">
                            <a href="{{route('manufacturing-companies.edit',$company->id)}}"
                               class="btn btn-sm font-sm rounded btn-brand mr-2"> <i class="material-icons md-edit"></i>
                                Edit
                            </a>

                            <button type="button" class="btn btn-sm font-sm btn-light rounded mx-2"
                                    data-bs-toggle="modal" data-bs-target="#delete-{{$company->id}}">
                                <i class="material-icons md-delete_forever"></i> Delete
                            </button>

                            <div class="modal fade" id="delete-{{$company->id}}" tabindex="-1"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete  Manufacturing Company</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure to delete manufacturing company ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm font-sm rounded btn-light mx-2"
                                                    data-bs-dismiss="modal">Close
                                            </button>
                                            <form action="{{route('manufacturing-companies.destroy',$company->id)}}"
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
        {{$manufacturing_companies->links()}}
    </div>
@stop
