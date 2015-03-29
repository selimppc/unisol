@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')

{{-----------------------------------------Help Text -------------------------------------------------------------------------------------}}
<div class="row">
    <div class="col-md-12">
                <h3>Degree</h3>
            <div class="help-text-top">
             You can view all lists of Degree Lists. Also this panel will allow you to perform some actions to <b>Add Degree</b>, <b>Edit</b>, <b>Delete</b>, <b>Degree Course (DC)</b> under the column <b>Action</b>. Button <b>Degree Course (DC)</b> will redirect you to degree course manage screen.
                    {{--<small>Someone famous in <cite title="Source Title">Source Title</cite></small>--}}
            </div><!-- /.box-body -->
    </div><!-- ./col -->
</div><!-- /.row -->
{{-----------------------------------------Help Text ends ----------------------------------------------------------------------}}

    <div class="box box-solid ">
        <div class="box box-info">

{{-------------------Searching Starts--------------------------------------------------------------}}

            <p>{{ Form::open(array('url'=>'admission/amw/degree/search','class'=>'form-horizontal')) }}
                <div  class="col-lg-3">
                    <div class="input-group input-group-sm">
                        {{ Form::select('search_department', $department , Input::old('search_department'),['class'=>'form-control input-sm '])}}
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-flat" type="submit">Search</button>
                        </span>
                    </div>
                </div>
                <div class="col-lg-9" class="box-tools pull-right">
                    <a class="pull-right btn btn-sm btn-info" href="{{ URL::to('admission/amw/degree/create')}}" data-toggle="modal" data-target="#degreeModal" style="color: #ffffff"><b>Add Degree</b></a>

                </div>

            {{ Form::close() }}
            </p>
{{------------Searching Ends--------------------------------------------------------------------}}
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12">
                    <br>
                        {{ Form::open(array('url' => 'admission/amw/degree/batch_delete')) }}
                        <table id="example1" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>
                                    <input name="id" type="checkbox" id="checkbox" class="checkbox" value="">
                                </th>
                                <th>Degree(Title)</th>
                                <th>Department </th>
                                <th>Total Credit</th>
                                <th>Duration</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($model))
                                @foreach($model as $value)
                                    <tr>
                                        <td><input type="checkbox" name="ids[]"  class="myCheckbox" value="{{ $value->id }}">
                                        </td>
                                        <td>{{ $value->title }}</td>
                                        <td>{{ $value->relDepartment->title }}</td>
                                        <td>{{ $value->total_credit}}</td>
                                        <td>{{ $value->duration}}</td>
                                        <td>
                                        <a href="{{ URL::to('admission/amw/degree/show/'.$value->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#degreeModal" style="font-size: 12px;color: darkmagenta"><span class="fa fa-eye"></span></a>

                                        <a class="btn btn-xs btn-default" href="{{ URL::to('admission/amw/degree/edit/'.$value->id) }}" data-toggle="modal" data-target="#degreeModal" style="font-size: 12px;color: lightseagreen"><i class="fa fa-edit"></i></a>

                                        <a data-href="{{ URL::to('admission/amw/degree/delete/'.$value->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" style="font-size: 12px;color: lightcoral"><span class="fa  fa-trash-o"></span></a>

                                        <a href="{{ URL::route('admission.amw.degree_courses', ['id'=>$value->id])  }}" class="btn btn-xs btn-info">DC</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                            {{ Form::submit('Delete Items', array('class'=>'btn btn-xs btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}
                        </table>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-right">
        {{ $model->links() }}
    </div>
{{----------------------Modal : degreeGroupModal--------------------------------------------------------------------------}}
    <div class="modal fade" id="degreeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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