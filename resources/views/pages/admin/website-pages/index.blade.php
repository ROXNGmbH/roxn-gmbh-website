@extends('layouts.admin.app')

@section('page-title','Website Pages')

@section('content-header')
    <div class="content-header d-flex justify-content-between" style="width:100%">
        <div>
            <h2 class="content-title card-title">Pages</h2>
        </div>
        <div>
            <a href="{{route('pages.create')}}" class="btn btn-primary"><i class="text-muted material-icons md-post_add"></i>Create Page</a>
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
                <th scope="col">Title (ar)</th>
                <th scope="col">Title (de)</th>
                <th scope="col">Description (ar)</th>
                <th scope="col">Description (de)</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                 @foreach($pages as $page)
                    <tr>
                        <td>{{$page->id}}</td>
                        <td>{{$page->name_ar}}</td>
                        <td>{{$page->name_de}}</td>
                        <td>{{$page->title_ar}}</td>
                        <td>{{$page->title_de}}</td>
                        <td>{!! Str::limit($page->description_ar,100,$end='......') !!}</td>
                        <td>{!! Str::limit($page->description_de,100,$end='......') !!}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{route('pages.edit',$page->id)}}"
                                   class="btn btn-sm font-sm rounded btn-brand mr-2"> <i class="material-icons md-edit"></i>
                                    Edit
                                </a>

                                <button type="button" class="btn btn-sm font-sm btn-light rounded mx-2"
                                        data-bs-toggle="modal" data-bs-target="#delete-{{$page->id}}">
                                    <i class="material-icons md-delete_forever"></i> Delete
                                </button>

                                <div class="modal fade" id="delete-{{$page->id}}" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Page</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure to delete page ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-sm font-sm rounded btn-light mx-2"
                                                        data-bs-dismiss="modal">Close
                                                </button>
                                                <form action="{{route('pages.destroy',$page->id)}}"
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
