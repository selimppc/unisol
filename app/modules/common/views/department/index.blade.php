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
                <h3 class="box-title" style="color:#800080 ">All Department List</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CreateModal">
                        Add Department
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12">
                        {{ Form::open(array('url' => 'department/batchDelete')) }}
                        <table id="example" class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                <th>
                                    <input name="id" type="checkbox" id="checkbox" class="checkbox" value="">
                                </th>
                                <th>Department Name</th>
                                <th>Department Head</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($departmentList as $department)
                                <tr>
                                    <td><input type="checkbox" name="ids[]"  class="myCheckbox" value="{{ $department->id }}"></td>
                                    <td align="left">{{ $department->title }}</td>
                                    <td align="left">{{ isset($department->dept_head_user_id) ? User::FullName($department->dept_head_user_id) : '' }}</td>

                                    <td>
                                        <a href="{{ URL::to('department/show/'.$department->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-show"><i class="fa fa-eye" style="color: green"></i></a>

                                        <a href="{{ URL::to('department/edit/' . $department->id ) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#editModal" href="" ><i class="fa fa-pencil-square-o" style="color: #0044cc"></i></a>
                                        <a data-href="{{ URL::to('department/delete/'.$department->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><i class="fa  fa-trash-o" style="color: red"></i></a>


                                    </td>
                                </tr>
                            @endforeach
                            <div>
                            </div>
                            </tbody>
                            {{ Form::submit('Delete Items', array('class'=>'btn btn-xs btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}
                        </table>
                        {{ Form::close() }}
                        <div class="text-left">
                            {{ $departmentList->links() }}
                        </div>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                    </div>
                </div>
            </div>
    </div>
    <!-- Modal :: Delete Confirmation -->
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
                    <a href="{{URL::to('common/department/')}}" class="btn btn-default">Close </a>
                </div>
            </div>
        </div>
    </div>
    {{--Model: for showing single row info--}}
    <div class="modal fade " id="confirm-show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

            </div>
        </div>
    </div>

    <!-- Modal :Add new Department-->
    <div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add New Department</h4>
                </div>
                <div class="modal-body">
                    {{ Form::open(array('url' => 'department/store', 'method' =>'post', 'role'=>'form','files'=>'true')) }}
                        @include('common::department._form')
                    {{ Form::close() }}
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    {{--Modal : edit --}}

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">

            </div>
        </div>
    </div>
@stop

