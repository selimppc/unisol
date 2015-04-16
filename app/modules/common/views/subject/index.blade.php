@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
    <div class="box box-solid ">
            <div class="box-header">
                <h3 class="box-title" style="color:#800080 ">All Subject List</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="pull-right btn btn-primary" data-toggle="modal" data-target="#myModal" style="margin-right: 60px">
                        Add Subject
                    </button>
                </div>
            </div>
            {{--for search box using js --}}
            <section class="panel " style="background: #F9F9F9">
                {{--one page filter--}}
                <div class="col-md-4 no-padder" style="margin-right: 500px">
                    <input type="search" name="tblsearch" id="searchStr" class="form-control" style="width: 180px" placeholder="Onpage Filter"/>
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
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12">
                {{ Form::open(array('url' => 'subject/batch/delete')) }}
                <table class="table table-bordered table table-bordered table-hover table-striped" id="myTable">
                    <thead>
                    <th>
                        <input name="id" type="checkbox" id="checkbox" class="checkbox" value="">
                    </th>
                    <th>Subject</th>
                    <th>Department</th>
                    <th>Action</th>
                    </thead>
                    <tbody class="searchBody">
                    {{ Form::submit('Delete Items', array('class'=>'btn btn-xs btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}
                    @foreach ($datas as $value)
                        <tr>
                            <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $value->id }}"></td>
                            <td class="subTitle">{{ $value->title }}</td>
                            <td>{{$value->relDepartment->title}}</td>
                            <td>

                                <a href="{{ URL::route('common/subject/show', ['id'=>$value->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#show" href="" ><i class="fa fa-eye" style="color: green"></i></a>

                                <a href="{{ URL::route('subject.edit', ['id'=>$value->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#edit-modal" href="" ><i class="fa fa-pencil-square-o" style="color: #0044cc"></i></a>

                                <a data-href="{{ URL::to('subject/delete/'.$value->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><i class="fa  fa-trash-o" style="color: red"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ Form::close() }}
                {{ $datas->links() }}
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
    <!-- Modal for details view cell -->
    <div class="modal fade" id="show" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">

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
                    <a href="{{URL::to('common/subject/')}}" class="btn btn-default">Close </a>
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
