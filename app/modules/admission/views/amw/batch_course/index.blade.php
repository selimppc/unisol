@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
    <div class="box-body">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="table.align th text-purple  font-size text-bold margin-top-text">Year:</h4>
                <h4 class="text-purple">Spring</h4>
                <table id="" class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Title With Code</th>
                        <th>Department</th>
                        <th>Type</th>
                        <th>Credit</th>
                        <th>Mandatory</th>
                        <th>Faculty</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a data-href="" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><i class="fa fa-trash-o" style="color: red"></i></a>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <h4 class="text-purple">Summer</h4>
                <table id="" class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Title With Code</th>
                        <th>Department</th>
                        <th>Type</th>
                        <th>Credit</th>
                        <th>Mandatory</th>
                        <th>Faculty</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a data-href="" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><i class="fa fa-trash-o" style="color: red"></i></a>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <h4 class="text-purple">Fall</h4>
                <table id="" class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Title With Code</th>
                        <th>Department</th>
                        <th>Type</th>
                        <th>Credit</th>
                        <th>Mandatory</th>
                        <th>Faculty</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a data-href="" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><i class="fa fa-trash-o" style="color: red"></i></a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{--Degree Course data--}}

    <p class= "table.align th text-purple font-size text-bold margin-top-text">Courses of  {{$degree_title->title}}</p>
    {{Form::open(array())}}
    {{ Form::hidden('batch_id', $batch , ['class'=>'form-control batch_id'])}}
    <table id="example1" class="table table-bordered table-hover table-striped">
        <thead>
        <tr>
            <th>Course Title with code</th>
            <th>Department</th>
            <th>Course Type</th>
            <th>Credit</th>
            <th>Year</th>
            <th>Semester</th>
            <th>M?</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($deg_course_info as $value)
            <tr>
                <td>{{$value->relCourse->title}}({{$value->relCourse->course_code}})</td>
                <td>{{$value->relCourse->relSubject->relDepartment->title}}</td>
                <td>{{$value->relCourse->relCourseType->title}}</td>
                <td>{{$value->relCourse->credit}}</td>
                <td>{{ Form::select('year_list[]',[null=>'Please Select'] +$year_data,['class'=>'form-control', 'required']); }}</td>
                <td>{{ Form::select('semester_list[]',[null=>'Please Select'] +$semester_data,['class'=>'form-control', 'required']); }}</td>
                <td>{{ Form::checkbox('mandatory[]') }}</td>
                <td>
                    <a data-href="" class="btn btn-xs btn-default text-purple"><i class="fa  fa-plus"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{Form::close()}}
    {{ $deg_course_info->links() }}
    <p>&nbsp</p>
    <p>&nbsp</p>


@stop