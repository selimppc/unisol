@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_library')
@stop
@section('content')
    <h2 class="page-header text-purple tab-text-margin">Library Book Category</h2>
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Book Category</a></li>
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
                       <button type="button" class=" btn btn-xs btn-success fa fa-plus " data-toggle="modal" data-target="#myModal" >
                             Add New
                        </button>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-gear"></i>&nbsp;</a>
                        <ul class="dropdown-menu">
                            <li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="#"> Add Category </a></li>
                        </ul>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="box-body table-responsive ">

                {{--{{ Form::open(array('url' => 'batch/delete')) }}--}}
                    <table id="example" class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>
                                <input name="id" type="checkbox" id="checkbox" class="checkbox" value="">
                            </th>
                            <th>Code</th>
                            <th>Title</th>
                            <th>Code</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $value)
                            <tr>
                                <td><input type="checkbox" name="id[]"  class="myCheckbox" value="{{ $value->id }}">
                                </td>
                                <td>{{$value->code}}</td>
                                <td>{{$value->title}}</td>
                                <td>{{$value->description}}</td>
                                <td>
                                    <a href="{{ URL::route('category.view', ['id'=>$value->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#showModal" href=""><i class="fa fa-eye" style="color: green"></i></a>

                                    <a href="{{ URL::route('category.edit', ['id'=>$value->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#edit-modal" href="" ><i class="fa fa-pencil-square-o" style="color: #0044cc"></i></a>

                                    <a data-href="{{ URL::to('category/delete/'.$value->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><i class="fa  fa-trash-o" style="color:red"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                        {{ Form::submit('Delete', array('class'=>'btn btn-xs btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}
                    {{ Form::close() }}

                   {{-- {{ $datas->links() }}--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--<!-- Modal add new -->--}}
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
                    <h4 class="modal-title" style="text-align: center;color: #800080;font-size: x-large">Create Book Category</h4>
                </div>
                <div class="modal-body">
                    {{ Form::open(array('url' => 'library/category/save', 'method' =>'post', 'role'=>'form','files'=>'true')) }}
                    @include('library::book_category._form')
                    {{ Form::close() }}
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    {{--<!-- Modal for Edit -->--}}
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