@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_applicant')
@stop
@section('content')
    <h2 class="page-header text-purple tab-text-margin">Extra-Curricular Activities</h2>
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Extra-Curricular Activities</a></li>
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
                        <a class="pull-right btn btn-sm btn-success" href="" data-toggle="modal" data-target="#addModal" >Add Activities <i class="fa fa-arrow-circle-right"></i> </a>
                        <div class="box-body table-responsive ">
                            <table class="table table-striped  table-bordered">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($datas as $value)
                                    <tr>
                                        <td>{{$value->title}}</td>
                                        <td>
                                            <a href="{{ URL::route('extra_curricular.show', ['id'=>$value->id])  }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#showOne" href=""><i class="fa fa-eye" style="color: green"></i></a>
                                            <a href="{{ URL::to('applicant/extra_curricular/edit/' . $value->id  ) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myeditModal" href="" ><i class="fa fa-pencil-square-o" style="color: #0044cc"></i></a>
                                            <a data-href="{{ URL::to('applicant/extra-curricular/delete/'.$value->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" ><i class="fa  fa-trash-o" style="color: red"></i></a>
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

    <!-- Modal : edit -->
    <div class="modal fade" id="myeditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

            </div>
        </div>
    </div>

    {{--Model : Add Data--}}
    <div id="addModal" class="modal fade" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" >
            <div class="modal-content" >
                <div class="modal-body" >
                    {{ Form::open(array('url' => 'applicant/extra_curricular_store', 'method' =>'post', 'role'=>'form','files'=>'true')) }}
                    @include('applicant::extra_curricular._form')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    {{--<!-- Modal for show -->--}}
    <div class="modal fade" id="showOne" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">

            </div>
        </div>
    </div>

    <div class="modal fade " id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" style="text-align: center;color: #800080;font-size: large">Confirm Delete</h4>
                </div>
                <div class="modal-body">
                    <strong>Are you sure to delete?</strong>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-danger danger">Delete</a>
                    <a href="" class="btn btn-default">Close </a>
                </div>
            </div>
        </div>
    </div>

@stop