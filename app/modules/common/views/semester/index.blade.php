@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
    <div class="box box-solid ">
            <div class="box-header">
                <h3 class="box-title" style="color:#800080 ">All Semester List</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="pull-right btn btn-primary" data-toggle="modal" data-target="#CreateModal" style="margin-bottom: 20px">
                        Add Semester
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12">

    {{ Form::open(array('url' => 'semester/batchDelete')) }}
    <table id="example" class="table table-bordered table-hover table-striped">
            <thead>
            {{ Form::submit('Delete Items', array('class'=>'btn btn-xs btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}
            <tr>
                <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($term_semester as $semester)
                <tr>
                    <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $semester->id }}"></td>
                    <td>{{ $semester->title }}</td>
                    <td>{{ $semester->description }}</td>
                    <td>
                        <a href="{{ URL::route('semester.show', ['id'=>$semester->id])  }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#showModal" data-toggle="tooltip" data-placement="left" title="Show/View" href=""><i class="fa fa-eye" style="color: green"></i></a>

                        <a href="{{ URL::route('semester.edit', ['id'=>$semester->id])  }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#edit-modal" data-toggle="tooltip" data-placement="left" title="Edit" href="#"><i class="fa fa-pencil-square-o" style="color: #0044cc"></i></a>
                        <a data-href="{{ URL::route('semester.destroy',['id'=>$semester->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><i class="fa  fa-trash-o" style="color: red"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
         </table>
    {{form::close() }}
    {{ $term_semester->links() }}
    <br><br><br>
                    </div>
                </div>
            </div>
        </div>

     {{--Modal for Create --}}
    <div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" style="text-align: center;color: #800080;font-size: x-large">Create Semester</h4>
                </div>
                <div class="modal-body">
                    {{ Form::open(array('route' => 'semester.store', 'method' =>'post', 'role'=>'form','files'=>'true'))  }}
                    @include('common::semester._form')
                    {{ Form::close() }}
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    {{--Modal for Edit--}}
    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

            </div>
        </div>
    </div>
    {{--Show Modal--}}
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

            </div>
        </div>
    </div>

    {{--Modal for delete--}}
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

@stop