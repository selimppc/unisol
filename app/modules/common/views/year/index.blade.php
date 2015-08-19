@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
    <div class="box box-solid ">
            <div class="box-header">
                <h3 class="box-title text-purple">All Year List</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="pull-right btn btn-primary" data-toggle="modal" data-target="#myModal" >
                        Add Year
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12">
    {{--search db--}}
        {{--{{ Form::open(array('url' =>'year/show/', 'class'=>'form-inline', 'role' => 'form')) }}--}}
        {{--<div class="form-group"style="margin-top: 2px;margin-left: 850px">--}}
            {{--{{ Form::label('search_text', 'Search Text:',array('class'=>'sr-only')) }}--}}
            {{--{{ Form::text('search_text', Input::old('search_text'), array('class' => 'form-control','placeholder' => 'Search All')) }}--}}
        {{--</div>--}}
        {{--{{ Form::submit('Search', array('class' => 'btn btn-info')) }}--}}
        {{--{{ Form::close() }}--}}

    {{--search db ends--}}

    {{ Form::open(array('url' => 'batch/delete')) }}
    <table id="example" class="table table-bordered table-hover table-striped">
        <thead>
        <tr>
            <th>
                <input name="id" type="checkbox" id="checkbox" class="checkbox" value="">
            </th>
            <th>Year </th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($datas as $value)
            <tr>
                <td><input type="checkbox" name="id[]"  class="myCheckbox" value="{{ $value->id }}">
                </td>
                <td>{{$value->title}}</td>
                <td>
                    <a href="{{ URL::route('year.show', ['id'=>$value->id])  }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#showOne" href=""><i class="fa fa-eye" style="color: green"></i></a>
                    <a href="{{ URL::route('year.edit', ['id'=>$value->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#edit-modal" href="" ><i class="fa fa-pencil-square-o" style="color: #0044cc"></i></a>
                    <a data-href="{{ URL::to('year/delete/'.$value->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><i class="fa  fa-trash-o" style="color: red"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
        {{ Form::submit('Delete Items', array('class'=>'btn btn-xs btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}
    </table>
    {{ Form::close() }}

    {{ $datas->links() }}

    <p>&nbsp;</p>
    <p>&nbsp;</p>

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
    <div class="modal fade" id="showOne" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
                    <h4 class="modal-title" style="text-align: center;color: #800080;font-size: x-large">Create Year</h4>
                </div>
                <div class="modal-body">
                    {{ Form::open(array('url' => 'year/save', 'method' =>'post', 'role'=>'form','files'=>'true')) }}
                     @include('common::year._form')
                    {{ Form::close() }}
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

@stop