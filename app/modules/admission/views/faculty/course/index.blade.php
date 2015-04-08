@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_faculty')
@stop

@section('content')
    <h2> Course</h2>

     {{ Form::open(array('url' => 'admission/faculty/course/batchDelete')) }}
                    <table id="example" class="table table-striped  table-bordered"  >
                          <thead>
                               {{ Form::submit('Delete Items', array('class'=>'btn btn-danger btn-xs', 'id'=>'hide-button', 'style'=>'display:none'))}}

                                 <br>
                                 <tr>
                                    <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                                    <th>Title with Code</th>
                                    <th>Department</th>
                                    <th>Type</th>
                                    <th>Credit</th>
                                    <th>Year</th>
                                    <th>Term</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                 </tr>
                      </thead>
                      <tbody>
                          @foreach($index_course as $index_course_list)
                                <tr>
                                    <td><input type="checkbox" name="id[]" class="myCheckbox" value="{{ $index_course_list['id'] }}"></td>

                                    <td>{{ $index_course_list->relCourse->title }}</td>
                                    {{--.''.$index_course_list->relCourse->course_code }}</td>--}}

                                    <td>{{ $index_course_list->relDegree->relDepartment->title }}</td>

                                   <td>{{ $index_course_list->relCourse->relCourseType->title }}</td>

                                    <td>{{ $index_course_list->relCourse->credit }}</td>

                                    <td>{{ $index_course_list->relYear->title }}</td>

                                    <td>{{ $index_course_list->relSemester->title }}</td>

                                    <td>{{ $index_course_list->status }}</td>

                                    <td>
                                        <a href="{{ URL::route('admission.faculty.course.assign', ['id'=>$index_course_list->id])}}" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal">Assign</a>
                                    </td>
                                </tr>
                          @endforeach
                      </tbody>
                    </table>
     {{ Form::close() }}

{{--modal--}}
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="z-index:1050">
          <div class="modal-content">

          </div>
    </div>
</div>

@stop