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

                  {{--------------Degree Course data-----------}}

    <p class= "table.align th text-purple font-size text-bold margin-top-text">Courses of  {{$degree_title->title}}</p>

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
                <th>Mejor/Minor</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            {{--@if(isset($deg_course_info))--}}
            @foreach ($deg_course_info as $value)
                <tr>
                    {{Form::open(array('url' => 'admission/amw/batch-course/save'))}}

                    {{ Form::hidden('batch_id', $batch , ['class'=>'form-control batch_id'])}}
                    {{--<td>{{$value->relCourse->title}}  ({{$value->relCourse->course_code}})--}}
                        {{--{{ Form::hidden('course_id', $value->relCourse->id)}}</td>--}}
                    {{--<td>{{$value->relCourse->relSubject->relDepartment->title}}</td>--}}
                    {{--<td>{{$value->relCourse->relCourseType->title}}</td>--}}
                    {{--<td>{{$value->relCourse->credit}}</td>--}}
                    <td> {{Course::findOrFail($value->course_id)->title;}} ({{Course::findOrFail($value->course_id)->course_code;}})
                        {{ Form::hidden('course_id',($value->course_id))}}
                    </td>
                    <td> {{Department::findOrFail($value->department_id)->title; }}</td>
                    <td> {{CourseType::findOrFail(Course::findOrFail($value->course_id)->course_type_id)->title ;}} </td>
                    <td> {{Course::findOrFail($value->course_id)->credit ;}} </td>

                    <td>{{ Form::select('year_id', $year_data, '', array('class' => 'form-control','required'=>'required'))}}</td>

                    <td>{{ Form::select('semester_id', $semester_data, '', array('class' => 'form-control','required'=>'required')) }}</td>

                    <td>{{ Form::checkbox('is_mandatory') }}</td>

                    <td>{{ Form::select('major_minor', array(''=>'Select Option','major' => 'Major', 'minor' => 'minor'), '', array('class' => 'form-control','required'=>'required'))}}</td>
                    <td>
                        {{Form::button('<i class="fa  fa-plus"></i>', array('type' => 'submit', 'class' => 'btn btn-xs btn-default text-purple'))}}
                    </td>
                    {{--<td>--}}
                    {{--<a class="btn btn-xs btn-default text-purple" onClick= "saveNearestTr()"><i class="fa  fa-plus"></i></a>--}}
                    {{--</td>--}}
                    {{Form::close()}}
                </tr>

            @endforeach
                {{--@endif--}}

            </tbody>
        </table>

{{--{{ $deg_course_info->links() }}--}}
    <p>&nbsp</p>
    <p>&nbsp</p>

    {{-- Modal for delete --}}
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

@stop
{{--Save data from degree_course table to batch_course table--}}

{{--@section('script_section')--}}
    {{--<script>--}}
        {{--function saveNearestTr()--}}
        {{--{--}}

        {{--}--}}
    {{--</script>--}}


{{--@stop--}}