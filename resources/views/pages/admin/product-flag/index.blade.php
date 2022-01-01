@extends('layouts.admin.app')

@section('page-title','sell types')

@section('content-header')
    <div class="content-header d-flex justify-content-between" style="width:100%">
        <div>
            <h2 class="content-title card-title">Product Flags</h2>
        </div>
        <div>
            <a href="{{route('product-flags.create')}}" class="btn btn-primary"><i class="text-muted material-icons md-post_add"></i>Create Product Flag</a>
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
                 @foreach($product_flags as $flag)
                     <tr>
                         <td> {{$flag->id}}</td>
                         <td> {{$flag->NameAr}}</td>
                         <td> {{$flag->NameDe}}</td>
                         <td> {{$flag->created_at}}</td>
                         <td class="d-flex justify-content-center">
                             <a href="{{route('product-flags.edit',$flag->id)}}" class="btn btn-sm font-sm rounded btn-brand mx-2"> <i class="material-icons md-edit"></i> Edit </a>
                             <button type="button" class="btn btn-sm font-sm btn-light rounded mx-2" data-bs-toggle="modal" data-bs-target="#delete-{{$flag->id}}">
                                 <i class="material-icons md-delete_forever"></i> Delete
                             </button>

                             <div class="modal fade" id="delete-{{$flag->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog">
                                     <div class="modal-content">
                                         <div class="modal-header">
                                             <h5 class="modal-title" id="exampleModalLabel">Delete Product Flags</h5>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                         </div>
                                         <div class="modal-body">
                                             <p>Are you sure to product flags  ?</p>
                                         </div>
                                         <div class="modal-footer">
                                             <button type="button" class="btn btn-sm font-sm rounded btn-light mx-2" data-bs-dismiss="modal">Close</button>
                                             <form action="{{route('product-flags.destroy',$flag->id)}}" method="post">
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
                 @endforeach
            </tbody>
        </table>
    </div>
@stop
