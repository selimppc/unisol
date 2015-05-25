@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_library')
@stop
@section('content')
    <h2 class="page-header text-purple tab-text-margin text-center">Library Management</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Book Author</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Settings  <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="#"> </a>
                            </li>
                        </ul>
                    </li>
                    <li class="pull-right" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-gear"></i>&nbsp;</a>
                        <ul class="dropdown-menu">
                            <li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="#"> Add Category </a></li>
                        </ul>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="box-body table-responsive ">
                            <button type="button" class=" btn btn-xs btn-success fa fa-plus " data-toggle="modal" data-target="#bookAuthor" >
                                Add New
                            </button>
                            {{Form::open(array('route'=> ['category.batch.delete'], 'class'=>'form-horizontal','files'=>true))}}
                            <table id="example" class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        <input name="id" type="checkbox" id="checkbox" class="checkbox" value="">
                                    </th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>phone</th>
                                    <th>Address</th>
                                    <th>Country</th>
                                    <th>Note</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($book_author as $value)
                                    <tr>
                                        <td><input type="checkbox" name="id[]"  class="myCheckbox" value="{{ $value->id }}">
                                        </td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>{{$value->phone}}</td>
                                        <td>{{$value->address}}</td>
                                        <td>{{$value->country_id}}</td>
                                        <td>{{$value->note}}</td>
                                        <td>
                                            <a href="{{ URL::route('category.view', ['id'=>$value->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#showModal" href=""><i class="fa fa-eye" style="color: green"></i></a>

                                            <a href="{{ URL::route('category.edit', ['id'=>$value->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#edit-modal" href="" ><i class="fa fa-pencil-square-o" style="color: #0044cc"></i></a>

                                            <a data-href="{{ URL::to('library/category/delete/'.$value->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><i class="fa  fa-trash-o" style="color:red"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ Form::submit('Delete', array('class'=>'btn btn-xs btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}
                            {{ Form::close() }}
                            {{ $book_author->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal add new  --}}
    <div id="bookAuthor" class="modal fade">
        <div class="modal-dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
                    <h4 class="modal-title" style="text-align: center;color: #800080;font-size: x-large">Create Book Category</h4>
                </div>
                <div class="modal-body">
                    {{ Form::open(array('url' => 'library/author/save', 'method' =>'post', 'role'=>'form','files'=>'true')) }}
                    @include('library::librarian.author._form')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    {{-- Modal for Edit --}}
    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>


    {{--<!-- Modal for show -->--}}
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>

    {{--<!-- Modal for delete -->--}}
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                </div>
                <div class="modal-body">
                    <strong>Are you sure to delete?</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a href="#" class="btn btn-danger danger">Delete</a>
                </div>
            </div>
        </div>
    </div>

@stop