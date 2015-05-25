@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')

<a class="pull-right btn btn-xs btn-info" href="{{ URL::route('amw.exam-list') }}"  style="color: #ffffff" title="Back to Exam List"><b>Back</b></a>

<h3>Examination :Courses</h3>

<div class="row">
   <div class="col-md-12 ">
      <div class="box box-solid">
          {{ Form::open(array('url' => 'examination/amw/batchDelete')) }}
             <table id="example" class="table table-striped  table-bordered">
             <div style="background-color:lightgray; color:white; padding:8px;">
                 <b style="margin-left: 20px;color: #005580">Year: {{isset($year_title) ? $year_title : ''}}</b>
                 <b style="margin-left: 50px;color: #005580">Semester : {{isset($semester_title) ? $semester_title :''}}</b>
             </div>
                <thead>
                   {{ Form::submit('Delete Items', array('class'=>'btn btn-xs btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}
                       <br>
                       <tr>
                          <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                          <th class="col-xs-3">Course Title</th>
                          <th class="col-xs-3">Exam Type</th>
                          <th class="col-xs-3">Department</th>
                          <th>Action</th>
                       </tr>
                </thead>
                <tbody>
                    @if(isset($course_data))
                        @foreach($course_data as $course_list)
                            <tr>
                                <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $course_list['id'] }}"></td>
                                <td> {{ $course_list->relCourseConduct->relCourse->title }} </td>
                                <td>{{ $course_list->relAcmMarksDistItem['title'] }}</td>
                                <td>{{ $course_list->relCourseConduct->relCourse->relSubject->relDepartment->title }}</td>
                                <td>
                                   <a href="{{ URL::route('amw.examiners',['exm_exam_list_id'=>$course_list->id,'year_id'=>$course_list->year_id,'semester_id'=>$course_list->semester_id])}}" class=" btn btn-xs btn-info">Ex</a>
                                   <a href="{{URL::route('amw.question-papers',['exm_exam_list_id'=>$course_list->id,'course_conduct_id'=>$course_list->course_conduct_id])}}" class="btn btn-bitbucket btn-xs">QP</a>
                                   <a href="{{URL::route('amw.qpe',['exm_exam_list_id'=>$course_list->id,'course_conduct_id'=>$course_list->course_conduct_id])}}" class="btn btn-info btn-xs">QPE</a>
                                </td>
                            </tr>
                        @endforeach
                        {{--<a class="pull-right btn btn-sm btn-info" href="{{ URL::route('amw.exam-list') }}"  style="color: #ffffff" ><b>All</b></a>--}}
                    @else
                    @endif
                </tbody>
             </table>
          {{form::close() }}

          <p>&nbsp;</p>
      </div>
   </div>
</div>


@stop