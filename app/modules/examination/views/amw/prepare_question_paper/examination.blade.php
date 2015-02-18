@extends('layouts.master')
@section('sidebar')
    @include('examination::_sidebar')
@stop
@section('content')
        <h1>Welcome to Examination : <strong>{{ ucwords(Auth::user()->username) }}</strong> </h1> <br>
                    {{--{{ Form::open(array('url' => 'examination/amw/batchDelete')) }}--}}
                        <table id="example" class="table table-striped  table-bordered"  >
                                    <thead>
                                         <div class="row">
                                            <div class="col-sm-12">
                                                <div class="col-sm-8">
                                                     <div class="col-sm-3">
                                                              {{ Form::label('year', 'Year') }}
                                                              {{ Form::select('year',$year_id, Input::old('year'), array('class' => 'form-control','required'=>'required') ) }}

                                                     </div>
                                                     <div class="col-sm-3">
                                                              {{ Form::label('semester', 'Semester') }}
                                                              {{ Form::select('semester',$semester_id, Input::old('semester'), array('class' => 'form-control','required'=>'required')) }}

                                                     </div>
                                                     <div class="col-sm-2">

                                                         </br>
                                                         <a href="#" class="btn btn-default" >Filter</a>
                                                     </div>

                                                </div>

                                                <div class="col-sm-4">
                                                        <div class="btn-group" style="margin-right: 10px">
                                                            <button type="button" class="btn btn-info" data-toggle="modal"
                                                                      data-target="#AddExamination">
                                                                        Add Examination
                                                            </button>
                                                        </div>

                                                </div>
                                            </div>
                                         </div>




                                         <br>
                                         {{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}

                                         <br>
                                         <tr>
                                            <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                                            <th>Title</th>
                                            <th>Dept</th>
                                            <th>Course</th>
                                            <th>Type</th>
                                            <th>Year</th>
                                            <th>Term</th>
                                            <th>Action</th>
                                         </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($exam_data as $exam_list)
                                            <tr>
                                                <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $exam_list['id'] }}"></td>
                                                <td> {{ HTML::linkAction('ExmAmwController@courses', $exam_list->title) }} </td>
                                                <td>{{ $exam_list->relCourseManagement->relCourse->relSubject->relDepartment->title }}</td>
                                                <td>{{ $exam_list->relCourseManagement->relCourse->title }}</td>
                                                <td>{{ $exam_list->relMeta['title'] }}</td>
                                                <td>{{ Year::getYearsName($exam_list->year_id) }}</td>
                                                <td>{{ Semester::getSemesterName($exam_list->semester_id) }}</td>

                                                <td>
                                                   <a href="{{ URL::route('examination.amw.viewExamination', ['id'=>$exam_list->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#ViewExamination" data-placement="left" title="Show" href="#">View</a>
                                                   <a href="{{ URL::route('examination.amw.editExamination', ['id'=>$exam_list->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#EditExamination" data-placement="left" title="Edit" href="#">Edit</a>
                                                </td>
                                            </tr>
                                      @endforeach
                                    </tbody>
                        </table>
                    {{form::close() }}

@include('examination::amw.prepare_question_paper._modal')
@stop
