@extends('layouts.admin.app')

@section('page-title','Customers')

@section('content-header')
    <div class="content-header d-flex justify-content-between" style="width:100%">
        <div>
            <h2 class="content-title card-title">Customers</h2>
        </div>
        <div>
            <a href="{{route('customers.create')}}" class="btn btn-primary"><i
                    class="text-muted material-icons md-post_add"></i>Create Customer</a>
        </div>
    </div>
@stop

@section('main-content')
    <div class="p-4 bg-white">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Name </th>
                <th scope="col">Mobile </th>
                <th scope="col">Email </th>
                <th scope="col">Status </th>
                <th scope="col">Type </th>
                <th scope="col">Date Created</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customers as $customer)
                <tr>
                    <th scope="row">{{$customer->id}}</th>
                    <td>
                        {{$customer->name}}
                    </td>
                    <td>
                        {{$customer->mobile}}
                    </td>
                    <td>
                        {{$customer->email}}
                    </td>
                    <td>
                        {{$customer->type}}
                    </td>
                    <td>
                        @if($customer->status == 'active')
                            <button class="btn btn-sm btn-success text-white">{{$customer->status}}</button>
                        @elseif($customer->status == 'pending')
                            <button class="btn btn-sm btn-warning text-white">{{$customer->status}}</button>
                        @else
                            <button class="btn btn-sm btn-danger text-white">{{$customer->status}}</button>
                        @endif
                    </td>
                    <td>
                        {{$customer->created_at}}
                    </td>
                    <td>
                        <div class="d-flex">
                            <a href="{{route('customers.edit',$customer->id)}}"
                               class="btn btn-sm font-sm rounded btn-brand mr-2"> <i class="material-icons md-edit"></i>
                                Edit
                            </a>

                            <button type="button" class="btn btn-sm font-sm btn-light rounded mx-2"
                                    data-bs-toggle="modal" data-bs-target="#delete-{{$customer->id}}">
                                <i class="material-icons md-delete_forever"></i> Delete
                            </button>

                            <div class="modal fade" id="delete-{{$customer->id}}" tabindex="-1"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Sub Category</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure to delete Customer ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm font-sm rounded btn-light mx-2"
                                                    data-bs-dismiss="modal">Close
                                            </button>
                                            <form action="{{route('customers.destroy',$customer->id)}}"
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
        {{$customers->links()}}
    </div>
@stop
