@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
    <h4 style="text-align: center;color: #800080;font-size: x-large">{{$title}}</h4>
    <div class="container" style="margin-top: 20px">
        <div class="row">
            {{--<div class="col-sm-10" style="background: #FFFFFF">--}}
            <div class="panel-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="margin-bottom: 20px">
                    AddSubject
                </button>
                {{--for search box using js --}}
                <section class="panel " style="background: #F9F9F9">
                    {{--one page filter--}}
                    <div class="col-md-4 no-padder" style="margin-right: 350px">
                        <input type="search" name="tblsearch" id="searchStr" class="form-control" placeholder="Onpage Filter"/>
                        <div class="clearfix"></div>
                    </div>
                    {{--filter ends--}}
                    {{ Form::open(array('url' =>'subject/list', 'class'=>'form-inline', 'role' => 'form')) }}
                    <div class="form-group">
                        {{ Form::label('search_text', 'Search Text:',array('class'=>'sr-only')) }}
                        {{ Form::text('search_text', Input::old('search_text'), array('class' => 'form-control','placeholder' => 'Search All')) }}
                    </div>
                    {{ Form::submit('Search', array('class' => 'btn btn-info')) }}
                    {{ Form::close() }}
                </section>
                <!-- search ends -->
                {{ Form::open(array('url' => 'subject/batch/delete')) }}
                <table class="table table-bordered table table-bordered table-hover table-striped" id="myTable">
                    <thead>
                    <th>
                        <input name="id" type="checkbox" id="checkbox" class="checkbox" value="">
                    </th>
                    <th>Department</th>
                    <th>Subject</th>
                    <th>Description</th>
                    <th>Action</th>
                    </thead>
                    <tbody class="searchBody">
                    {{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}
                    @foreach ($datas as $value)
                        <tr>
                            <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $value->id }}"></td>
                            <td align="left" class="deptName">{{ Department::getDepartmentName($value->department_id) }}</td>
                            <td class="subTitle">{{ $value->title }}</td>
                            <td class="subDesc">{{ $value->description }}</td>
                            <td>
                                <a data-href="{{ URL::to('subject/delete/'.$value->id) }}" class="btn btn-sm btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><i class="fa  fa-trash-o" style="font-size: 18px;color: red"></i></a>

                                <a data-id="{{ $value->id }}" class="subEdit btn btn-sm btn-default" data-toggle="modal" data-target="#confirm-edit" href="" ><i class="fa fa-pencil-square-o" style="font-size: 18px;color: #0044cc"></i></a>

                                <a data-id="{{ $value->id }}" class="subDetails btn btn-sm btn-default" data-toggle="modal" data-target="#confirm-details" href="" ><i class="fa fa-eye" style="font-size: 18px;color: green"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ Form::close() }}
                {{ $datas->links() }}
            </div>
            {{--</div>--}}
        </div>
    </div>
    <!-- Modal for Edit -->
    <div class="modal fade" id="confirm-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 style="text-align: center;color: #800080;font-size: x-large">Edit Subject</h4>
                </div>
                <div class="modal-body edit-modal">
                    {{ Form::open(array('url' => '', 'method' =>'post', 'role'=>'form','files'=>'true', 'class' => 'updateForm')) }}
                    @include('common::subject._form')
                    {{--<a href="{{URL::to('common/subject/list')}}" class="btn btn-default">Close </a>--}}
                    {{ Form::close() }}
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!-- Modal for details view cell -->
    <div class="modal fade" id="confirm-details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 style="text-align: center;color: #800080;font-size: x-large">View Subject</h4>
                </div>
                <div class="modal-body details-modal">
                    <div class="jumbotron text-center">
                        <h4><strong>Department:</strong><span class="department"></span></h4>
                        <h4><strong>Subject:</strong><span class="title"></span></h4>
                        <h4><strong>Description:</strong><span class="description"></span></h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{URL::to('common/subject/list')}}" class="btn btn-default">Close </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for delete -->
    <div class="modal fade " id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <h4 style="text-align: center;color: #800080;font-size: x-large">Confirm Delete</h4>
                </div>
                <div class="modal-body">
                    <strong>Are you sure to delete?</strong>
                </div>
                <div class="modal-footer">
                    <a href="{{URL::to('common/subject/list')}}" class="btn btn-default">Close </a>
                    <a href="#" class="btn btn-danger danger">Delete</a>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal add new subject -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 style="text-align: center;color: #800080;font-size: x-large">AddSubject</h4>
                </div>
                <div class="modal-body">
                    {{ Form::open(array('url' => 'subject/save', 'method' =>'post', 'role'=>'form','files'=>'true')) }}
                    @include('common::subject._form')
                    {{ Form::close() }}
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

@stop

{{--@section('script_section')--}}
{{--<script>--}}

{{--</script>--}}