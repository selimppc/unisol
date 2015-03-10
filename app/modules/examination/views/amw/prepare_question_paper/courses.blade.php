@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
        <h1>Welcome to Courses : <strong></strong> </h1> <br>
                    {{ Form::open(array('url' => 'examination/amw/batchDelete')) }}
                        <table id="example" class="table table-striped  table-bordered"  >
                                <thead>
                                        <strong> Year: </strong>{{Year::getYearsName($year_id) }}
                                        </br>
                                        <strong> Semester: </strong>{{Semester::getSemesterName($semester_id) }} </br>

                                       {{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}

                                     <br>
                                     <tr>
                                        <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                                        <th>Course Title</th>
                                        <th>Type</th>
                                        <th>Dept</th>
                                        <th>Action</th>
                                     </tr>
                                </thead>
                                <tbody>
                                  @foreach($course_data as $course_list)
                                        <tr>
                                            <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $course_list['id'] }}"></td>
                                            <td> {{ $course_list->relCourseManagement->relCourse->title }} </td>

                                             <td>{{ $course_list->relAcmMarksDistItem['title'] }}</td>

                                            <td>{{ $course_list->relCourseManagement->relCourse->relSubject->relDepartment->title }}</td>

                                            <td>
                                               <a href="{{ URL::to('examination/amw/examiners',['year_id'=>$course_list->year_id , 'semester_id'=>$course_list->semester_id, 'course_management_id'=>$course_list->course_management_id,'acm_marks_dist_item_id'=>$course_list->acm_marks_dist_item_id, 'exm_exam_list_id'=>$course_list->id])  }}" class="btn btn-default btn-xs" >Examiner</a>
                                               <a href="{{ URL::to('examination/amw/index',['exam_list_id'=>$course_list->id , 'course_man_id'=>$course_list->course_management_id]) }}" class="btn btn-default btn-xs">Question Paper</a>

                                            </td>
                                        </tr>
                                  @endforeach
                                </tbody>
                        </table>
                    {{form::close() }}

@include('examination::amw.prepare_question_paper._modal._common_modal')
@stop
