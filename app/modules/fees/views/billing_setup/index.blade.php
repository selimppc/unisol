@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
    <div class="row" xmlns="http://www.w3.org/1999/html">
        <div class="col-md-12">
            <h2 class="text-purple ">Fees</h2>
            <div class="help-text-top">
                You can view all lists of Billing Setup and search. Also this panel will allow you to perform some actions to <b>Add Billing Setup</b>, <b>Edit</b>, <b>Delete</b>,and <b>View</b> under the column <b>Action</b>.
            </div><!-- /.box-body -->
        </div><!-- ./col -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Billing Setup</a></li>
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

                      {{--****************** Filter :Starts ***********************--}}
                        <div>
                            {{Form::open(array('route'=> ['billing.setup']))}}
                            <div class="col-sm-8">
                                <div class="col-sm-3">
                                    {{ Form::label('degree_id', 'Degree') }}
                                    {{ Form::select('degree_id',$degree,Input::old('degree_id'), array('class' => 'form-control') ) }}
                                </div>
                                <div class="col-sm-3">
                                    {{ Form::label('batch_id', 'Batch') }}
                                    {{ Form::select('batch_id',$batch, Input::old('batch_id'), array('class' => 'form-control')) }}
                                </div>
                                <div class="col-sm-2" style="padding-top: 1%">
                                    </br>
                                    {{ Form::submit('Filter', array('class'=>'btn btn-success btn-xs','id'=>'button'))}}
                                </div>
                            </div>
                            {{Form::close()}}
                        </div>
                        {{--*****************Filter :Ends ****************************--}}

                        <div class="box-body table-responsive ">
                            <a href="{{ URL::route('billing.create')}}" class=" btn btn-xs btn-success fa fa-plus pull-right" data-toggle="modal" data-target="#myModal">Add New</a>
                              {{Form::open(array('route'=> ['billing.setup.batch.delete'], 'class'=>'form-horizontal','files'=>true))}}
                            <table id="example" class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        <input name="id" type="checkbox" id="checkbox" class="checkbox" value="">
                                    </th>
                                    <th>Schedule</th>
                                    <th>Item</th>
                                    <th>Cost</th>
                                    <th>Deadline</th>
                                    <th>Fined Cost</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($data))
                                @foreach($data as $value)
                                    <tr>
                                        <td><input type="checkbox" name="id[]"  class="myCheckbox" value="{{ $value->id }}">
                                        </td>
                                        <td>{{isset($value->scheduleTitle) ? $value->scheduleTitle:''}}</td>

                                        <td>{{isset($value->billingTitle) ? $value->billingTitle: ''}}</td>

                                        <td>{{isset($value->cost) ? $value->cost : ''}}</td>

                                        <td>{{date("d-m-Y", strtotime((isset($value->deadline)) ? $value->deadline : '') ) }}</td>

                                        <td>{{isset($value->fined_cost) ? $value->fined_cost : ''}}</td>

                                        <td>
                                            <a href="{{ URL::route('billing.setup.view',['id'=>$value->id])}}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#showModal" href=""><i class="fa fa-eye" style="color: green"></i></a>

                                            <a href="{{ URL::route('billing.setup.edit',['id'=>$value->id])}}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#editModal" href="" ><i class="fa fa-pencil-square-o" style="color: #0044cc"></i></a>

                                            <a data-href="{{URL::route('billing.setup.delete', ['id'=>$value->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" style="font-size: 12px;color: lightcoral"><span class="fa  fa-trash-o"></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                                </tbody>
                            </table>
                            {{ Form::submit('Delete', array('class'=>'btn btn-xs btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}
                            {{ Form::close() }}
                            {{ $data->links() }}
                            </br>
                            <p><b>Admission Related Cost:</b></p>
                            <p><b>Academic Cost:</b></p>
                            <p><b>After Courses Completed Cost:</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal add new  --}}
    <div id="myModal" class="modal fade">
        <div class="modal-dialog" style="z-index:1050">
            <div class="modal-content">

            </div>
        </div>
    </div>

    {{-- Modal for Edit --}}
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="showingModal">
        <div class="modal-dialog" style="z-index:1050">
            <div class="modal-content">

            </div>
        </div>
    </div>

    {{-- Modal for show --}}
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showingModal">
        <div class="modal-dialog">
            <div class="modal-content">

            </div>
        </div>
    </div>
    {{-- Modal for delete --}}
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
