@extends('layouts.master')
@section('sidebar')
    @include('examination::_sidebar')
@stop
@section('content')
        <h1>Welcome to Courses : <strong>{{ ucwords(Auth::user()->username) }}</strong> </h1> <br>
                    {{--{{ Form::open(array('url' => 'examination/amw/batchDelete')) }}--}}
                        <table id="example" class="table table-striped  table-bordered"  >
                                    <thead>
                                             {{--<strong> Year:</strong>{{ Year::getYearsName($course_data->year_id) }} </br>--}}

                                             {{--<strong> Semester:</strong>{{ Semester::getSemesterName($course_data->semester_id) }} </br>--}}

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

                                                 <td>{{ $course_list->relMeta['title'] }}</td>

                                                <td>{{ $course_list->relCourseManagement->relCourse->relSubject->relDepartment->title }}</td>

                                                <td>
                                                   <a href="{{ URL::to('examination/amw/examiners')  }}" class="btn btn-default" >Examiner</a>
                                                   <a href="{{ URL::to('examination/amw/index')  }}" class="btn btn-default" >Questions</a>
                                                </td>
                                            </tr>
                                      @endforeach
                                    </tbody>
                        </table>
                    {{form::close() }}

@include('examination::amw.prepare_question_paper._modal')
@stop
