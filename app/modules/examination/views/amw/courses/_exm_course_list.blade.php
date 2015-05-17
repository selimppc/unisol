@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')

{{--<a class="pull-right btn btn-sm btn-info" href="{{ URL::route('examination.amw.create-exam') }}" data-toggle="modal" data-target="#exam-data" style="color: #ffffff" title="New Examination"><b>+ Add Examination</b></a>--}}

<h3>Examination :Courses</h3>

<div class="row">
   <div class="col-md-12 ">
      <div class="box box-solid">
          {{ Form::open(array('url' => 'examination/amw/batchDelete')) }}
             <table id="example" class="table table-striped  table-bordered">
                <thead>
                   {{ Form::submit('Delete Items', array('class'=>'btn btn-xs btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}
                       <br>
                       <tr>
                          <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                          <th>Course Title</th>
                          <th>Exam Type</th>
                          <th>Department</th>
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
                                   <a href="{{ URL::route('amw.examiners',['exm_exam_list_id'=>$course_list->id])}}" class=" btn btn-xs btn-info">Examiners</a>
                                   {{--<a href="{{ URL::to('examination/amw/index',['exam_list_id'=>$course_list->id , 'course_man_id'=>$course_list->course_management_id]) }}" class="btn btn-default">Question Paper</a>--}}
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