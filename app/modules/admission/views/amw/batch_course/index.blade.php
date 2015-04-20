@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
<div class="row">
<div class="box box-solid ">

    <div class="box-body">
            <div class="col-lg-12">
                <p class= "text-purple font-size text-bold">Courses of Batch {{$degree_title->batch_number}} of {{$degree_title->relDegree->relDegreeProgram->code}} {{$degree_title->relDegree->relDegreeGroup->code}} in {{$degree_title->relDegree->relDepartment->title}} Degree </p>
                <p>Total Credit: <b>{{$degree_title->relDegree->total_credit}} </b></p>
                <p>So Far Added Credit:
                        <b>@foreach($addCourseCredit as $value)
                            {{ isset($value->credit) ? $value->credit : 'No Course taken'}}
                        @endforeach</b>
                </p>

                {{ Form::hidden('degree_id', $degree_id , ['class'=>'form-control degree_id'])}}
                @if(isset($batch_course_data))
                @foreach($batch_course_data as $values)
                    <h4 class="text-purple font-size text-bold"> Year : {{$values['year']['relYear']['title']}} </h4>
                    {{--<h4 class="text-purple font-size"> Semester : {{$values['semester']['relSemester']['title']}} </h4>--}}
                    @foreach($values['course_semester'] as $semester)
                        <h4 class="text-purple">{{$semester['relSemester']['title']}}</h4>
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
                                @foreach($semester['courseByCourse'] as $course)
                                    <tr>
                                        <td> {{$course->relCourse->title}} ( {{$course->relCourse->course_code}} ) </td>
                                        <td> {{$semester['relBatch']['relDegree']['relDepartment']['title']}}</td>
                                        <td> {{isset($course->relCourse->relCourseType->title) ? $course->relCourse->relCourseType->title : 'course type missing'}} </td>
                                        <td> {{isset($course->relCourse->credit) ? $course->relCourse->credit : 'credit missing'}} </td>
                                        <td> {{ $semester['is_mandatory_course']==1 ? 'Yes' : 'No'}}</td>
                                        <td> <a href="{{ URL::route('assign-faculty',['course_id'=>$semester['course_id'],'dep_id'=>$semester['relBatch']['relDegree']['department_id'] ]) }}" class="btn btn-facebook btn-xs" > Assign</a>
                                        </td>
                                        <td>
                                            <a data-href="{{ URL::route('batch-course-delete',['bcid'=>$semester['id']]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><i class="fa fa-trash-o" style="color:red"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                    @endforeach
                     <br> <br>
                @endforeach
                @else
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
                                <td> No Data </td>
                                <td> No Data </td>
                                <td> No Data </td>
                                <td> No Data </td>
                                <td> No Data </td>
                                <td> No Data </td>
                                <td> No Data </td>
                            </tr>
                        </tbody>
                    </table>
                    <p>&nbsp;</p>
                @endif
            </div>
    </div>


    <div class="box-body">

    {{--------------Degree Course data-----------}}

    <p>&nbsp;</p>
    <p class= "text-purple font-size text-bold">Degree Course List ::  </p>
    <p>Please add course for batch <b>{{$degree_title->batch_number}}</b> from the following (Degree Course) table</p>
{{--    {{ Form::open(array('url' => 'admission/amw/save/batch-data')) }}--}}
    <table id="example1" class="table table-bordered table-hover table-striped">
        <thead>
        <tr>
            {{--<th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>--}}
            <th>Course Title with code</th>
            <th>Department</th>
            <th>Course Type</th>
            <th>Credit</th>
            <th>Year</th>
            <th>Semester</th>
            <th>M?</th>
            <th>Major/Minor</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        @if(isset($deg_course_info))
            @foreach ($deg_course_info as $value)

                <tr>
                    {{--<td><input type="checkbox" name="id[]"  class="myCheckbox" value="{{$value->course_id}}"></td>--}}
                    {{Form::open(array('url' => 'admission/amw/batch-course/save'))}}
                         {{ Form::hidden('batch_id', $batch , ['class'=>'form-control batch_id'])}}
                    <td> {{Course::findOrFail($value->course_id)->title;}} ({{Course::findOrFail($value->course_id)->course_code;}})
                        {{ Form::hidden('course_id',($value->course_id))}}</td>
                    <td> {{Department::findOrFail($value->department_id)->title; }}</td>
                    <?php $course_type_id = Course::findOrFail($value->course_id)->course_type_id; ?>
                    <td> {{isset($course_type_id) ? CourseType::findOrFail($course_type_id)->title : ''}}  </td>
                    <td> {{Course::findOrFail($value->course_id)->credit ;}} </td>
                    <td>{{ Form::select('year_id', $year_data,  Input::old('year_id'), array('class' => 'form-control','required'=>'required'))}}</td>
                    {{--<td>{{Form::selectYear('year', 2015, 2018)}}</td>--}}
                    <td>{{ Form::select('semester_id', $semester_data, Input::old('semester_id'), array('class' => 'form-control','required'=>'required')) }}</td>
                    <td>{{ Form::checkbox('is_mandatory') }}</td>
                    <td>{{ Form::select('major_minor', array(''=>'Select Option','major' => 'Major', 'minor' => 'minor'), '', array('class' => 'form-control','required'=>'required'))}}</td>
                    <td>{{Form::button('<i class="fa  fa-plus"></i>  Add', array('type' => 'submit', 'class' => 'btn btn-xs btn-default text-purple'))}} </td>
                    {{Form::close()}}
                </tr>
            @endforeach
        @endif
        </tbody>
        {{ Form::submit('Add Course', array('class'=>'btn btn-xs btn-success', 'id'=>'hide-button', 'style'=>'display:none'))}}
    </table>
{{--    {{ Form::close() }}--}}
    {{--{{ $deg_course_info->links() }}--}}
        <a class="pull-right btn btn-xs btn-primary" href="{{ URL::route('admission.amw.batch',['degree_id'=> $degree_title->degree_id])}}"> <i class="fa fa-arrow-circle-left"></i> Back To Batch Management</a>
        <p>&nbsp;</p>
    </div>

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


</div>
</div>
@stop
