@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_applicant')
@stop
@section('content')
    <!-- START CUSTOM TABS -->
    <h2 class="page-header text-purple tab-text-margin">Academic Records</h2>
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Academic Records</a></li>
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
                        <a class="pull-right btn btn-sm btn-success" href="" data-toggle="modal" data-target="#addModal">Add Academic Records</a>

                        <table id="example1" class="table table-bordered table-striped">
                            <col width="25">
                            <col width="250">
                            <col width="100">
                            <col width="120">
                            <col width="170">
                            <thead>
                            <tr>
                                <th>Level Of Education</th>
                                <th>Board / University</th>
                                <th>Passing Year</th>
                                <th>Result</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($model as $value)
                                <tr>
                                    <td>{{strtoupper($value->level_of_education ) }}</td>
                                    <td>{{ $value->board_university}}</td>
                                    <td>{{ $value->year_of_passing}}</td>
                                    <td>
                                        @if($value->result_type =='division')
                                            {{ $value->result }}
                                        @else
                                            {{$value->gpa}}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ URL::to('apt/acm_records/show/'.$value->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#showModal"><i class="fa fa-eye" style="color: green"></i></a>
                                        <a class="btn btn-xs btn-default" href="{{ URL::to('apt/acm_records/edit/'.$value->id) }}" data-toggle="modal" data-target="#myeditModal" ><i class="fa fa-pencil-square-o" style="color: #0044cc"></i></a>
                                        <a data-href="{{ URL::to('apt/acm_records/delete/'.$value->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><i class="fa  fa-trash-o" style="color: red"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </div>

    {{---------------------------------------------------Modals-----------------------------------------------}}
    {{--Model : Add Data--}}
    <div id="addModal" class="modal fade" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" >
            <div class="modal-content" >
                <div class="modal-body" >
                    {{ Form::open(array('url' => 'apt/acm_records/store', 'method' =>'post', 'role'=>'form','files'=>'true')) }}
                    @include('applicant::apt_academic_records._form')
                    {{--@include('admission::adm_public.admission.add_acm_docs')--}}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal :: Show Information -->
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

            </div>
        </div>
    </div>


    <!-- Modal :: Delete Confirmation -->
    <div class="modal fade " id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

    <div class="modal fade" id="myeditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>


@stop