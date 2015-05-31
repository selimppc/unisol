 @extends('layouts.layout')
 @section('top_menu')
     @include('layouts._top_menu')
 @stop
 @section('sidebar')
     @include('layouts._sidebar_amw')
 @stop
 @section('content')


    <h2 class="page-header text-blue tab-text-margin">Research and Consultancy : Category</h2>
        <div class="row">
               <div class="col-md-12">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">Category List</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                Settings  <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="#"> </a></li>
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
                                <table id="example" class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($model as $value)
                                        <tr>
                                        <td>{{$value->title}}</td>
                                        <td>
                                            {{--<a href="{{ URL::route('coursefind.show', ['course_id'=>$value->course_id])  }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#addNew" data-toggle="tooltip" data-placement="left" title="Marks Distribution" href=""><i class="fa fa-plus text-purple"></i> Marks Distribution</a>--}}
                                            {{--<a href="{{ URL::route('dist.show', ['id'=>$value->course_id]) }}" class="btn btn-xs btn-default text-blue" data-toggle="modal" data-target="#marksDistModal" data-toggle="tooltip" data-placement="left" title="Show Distribution" href=""><i class="fa fa-eye text-green "></i> View Distribution</a>--}}
                                        </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
    <div class="modal fade" id="show" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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

    {{--<!-- Modal add new year -->--}}
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="text-align: center;color: #800080;font-size: x-large">Add Category</h4>
                </div>
                <div class="modal-body">
                    {{--{{ Form::open(array('url' => 'year/save', 'method' =>'post', 'role'=>'form','files'=>'true')) }}--}}
                        {{--@include('common::year._form')--}}
                    {{--{{ Form::close() }}--}}
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

@stop