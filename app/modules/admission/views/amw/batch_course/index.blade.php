@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
    <div class="box-body">
        <div class="row">
            <div class="col-lg-12">
                {{ Form::hidden('degree_id', $degree_id , ['class'=>'form-control degree_id'])}}
                @if(isset($batch_course_data))
                    @foreach($batch_course_data as $y => $bcd)
                        <h4 class="table.align th text-purple  font-size text-bold margin-top-text">Year:{{$bcd['year']}}</h4>
                        @foreach($bcd as $s => $bc)
                            <h4 class="text-purple">{{$bc['semester']}}</h4>
                            @if(is_array($bc))
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
                                    @if(isset($bc))
                                        @foreach($bc as $c => $b)
                                            @if(is_array($b))
                                            <tr>
                                                <td>{{$b['CourseTitle']}} ({{$b['CourseCode']}})
                                                </td>
                                                <td>{{$b['DepartmentTitle']}}</td>
                                                <td>{{$b['CourseTypeTitle']}}</td>
                                                <td>{{$b['CourseCredit']}}</td>
                                                <td>{{($b['isMandatory'] == 1) ? 'Yes' : 'No';}}</td>
                                                <td><a href="{{ URL::route('assign-faculty',['course_id'=>$b['CourseId'],'dep_id'=>$b['DepartmentId']])}}" class="btn btn-facebook btn-xs   " >Assign</a></td>
                                                <td>
                                                    <a data-href="{{ URL::route('batch-course-delete',['bcid'=>$b['ID']]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><i class="fa fa-trash-o" style="color:red"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            @endif
                        @endforeach
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    {{--------------Degree Course data-----------}}

    <p class= "table.align th text-purple font-size text-bold margin-top-text">Courses of  {{$degree_title->title}}</p>
    {{ Form::open(array('url' => 'admission/amw/save/batch-data')) }}
    <table id="example1" class="table table-bordered table-hover table-striped">
        <thead>
        <tr>
            <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
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

        @if(isset($deg_course_info))
            @foreach ($deg_course_info as $value)

                <tr>
                    <td><input type="checkbox" name="id[]"  class="myCheckbox" value="{{$value->course_id}}"></td>

                    {{Form::open(array('url' => 'admission/amw/batch-course/save'))}}
                         {{ Form::hidden('batch_id', $batch , ['class'=>'form-control batch_id'])}}

                    <td> {{Course::findOrFail($value->course_id)->title;}} ({{Course::findOrFail($value->course_id)->course_code;}})
                        {{ Form::hidden('course_id',($value->course_id))}}</td>

                    <td> {{Department::findOrFail($value->department_id)->title; }}</td>
                    <?php $course_type_id = Course::findOrFail($value->course_id)->course_type_id; ?>

                    <td> {{isset($course_type_id) ? CourseType::findOrFail($course_type_id)->title : ''}}  </td>

                    <td> {{Course::findOrFail($value->course_id)->credit ;}} </td>

                    <td>{{ Form::select('year_id[]', $year_data,  Input::old('year_id'), array('class' => 'form-control','required'=>'required'))}}</td>

                    <td>{{ Form::select('semester_id[]', $semester_data, Input::old('semester_id'), array('class' => 'form-control','required'=>'required')) }}</td>

                    <td>{{ Form::checkbox('is_mandatory[]') }}</td>

                    <td>{{ Form::select('major_minor[]', array(''=>'Select Option','major' => 'Major', 'minor' => 'minor'), '', array('class' => 'form-control','required'=>'required'))}}</td>

                    <td>{{Form::button('<i class="fa  fa-plus"></i>', array('type' => 'submit', 'class' => 'btn btn-xs btn-default text-purple'))}}</td>
                    {{Form::close()}}
                </tr>
            @endforeach
        @endif
        </tbody>
        {{ Form::submit('Add Course', array('class'=>'btn btn-xs btn-success', 'id'=>'hide-button', 'style'=>'display:none'))}}
    </table>
    {{ Form::close() }}
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
