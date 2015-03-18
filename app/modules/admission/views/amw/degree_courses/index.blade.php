@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
    <div class="box box-solid ">
        <div class="box-header">
            {{--<h4 class="box-title" style="color:#800080;text-align: center ">List Of all Course </h4>--}}

            {{ Form::open(array('url' => 'admission/amw/degree_courses/save')) }}
            {{ Form::hidden('degree_id', 1 , ['class'=>'form-control degree_id'])}}
            <div class="form-group" style="width: 350px">
            {{ Form::label('course_list[]', 'List Of all Course ') }}
            {{ Form::select('course_list[]', $course_list, Request::old('course_list') ? Request::old('course_list') : $course_list,['multiple' => true, 'class'=>'form-control']); }}
            </div>
            {{ Form::submit('Add Course', ['class'=>'btn btn-primary']) }}
            {{ Form::close() }}
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-12">
                    <table id="example" class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Course Name </th>
                            <th>Course Code</th>
                            <th>Department</th>
                            <th>Course Type</th>
                            <th>Credit</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--@foreach ($datas as $value)--}}
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="" class="btn btn-xs btn-default" data-toggle="modal" data-target="#showOne" href=""><i class="fa fa-eye" style="color: green"></i></a>
                                </td>
                            </tr>
                        {{--@endforeach--}}
                        </tbody>
                    </table>
                    {{ Form::close() }}

                    {{--{{ $datas->links() }}--}}

                    <p>&nbsp;</p>
                    <p>&nbsp;</p>

                </div>
            </div>
        </div>
    </div>


@stop