@extends('layouts.master')
@section('sidebar')
    @include('examination::_sidebar')
@stop
@section('content')
        <h1>Welcome to Prepare Question paper : <strong>{{ ucwords(Auth::user()->username) }}</strong> </h1> <br>
                    {{ Form::open(array('url' => 'examination/amw/batchDelete')) }}
                        <table id="example" class="table table-striped  table-bordered"  >
                                    <thead>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="col-sm-6">

                                                       <strong> Year :</strong>  {{--{{ Year::getYearsName($course_data->year_id) }} </br>--}}
                                                       </br>
                                                       <strong> Semester :</strong>{{--{{ Semester::getSemesterName($course_data->semester_id) }} </br>--}}

                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="btn-group" style="margin-right: 10px">
                                                        <button type="button" class="btn btn-default" data-toggle="modal"
                                                                  data-target="#CreateModal">
                                                                    Create Question paper
                                                        </button>

                                                        {{--<a href="{{ URL::route('examination.amw.create') }}" class="btn btn-default" data-toggle="modal" data-target="#CreateModal" data-placement="left" title="Show" href="#">Create Q P</a>--}}
                                                    </div>


                                                </div>
                                            </div>
                                        </div>





                                         <br>
                                           {{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button','data-target'=>'#confirm-delete','data-toggle'=>'modal', 'style'=>'display:none'))}}

                                         <br>
                                         <tr>
                                            <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                                            <th>Title</th>
                                            <th>Deadline</th>
                                            <th>Department</th>
                                            <th>Year</th>
                                            <th>Term</th>
                                            <th>Assigned</th>
                                            <th>Action</th>
                                         </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($question_paper as $prepare_question_paper_amw)
                                            <tr>
                                                <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $prepare_question_paper_amw['id'] }}"></td>

                                                <td> {{ HTML::linkAction('ExmAmwController@questionsItemShow', $prepare_question_paper_amw->title,['question_item_id'=>$prepare_question_paper_amw['id']]) }} </td>

                                                <td>{{$prepare_question_paper_amw->deadline}}</td>
                                                <td>{{$prepare_question_paper_amw->relCourseManagement->relCourse->relSubject->relDepartment->title}}</td>
                                                <td>{{$prepare_question_paper_amw->relCourseManagement->relYear->title }} </td>
                                                <td>{{$prepare_question_paper_amw->relCourseManagement->relSemester->title}}</td>
                                                <td> </td>
                                                {{--<td>{{ $prepare_question_paper_amw->relUser->relUserProfile->first_name.' '.$prepare_question_paper_amw->relUser->relUserProfile->middle_name.' '.$prepare_question_paper_amw->relUser->relUserProfile->last_name }}</td>--}}
                                                <td>
                                                   <a href="{{ URL::route('examination.amw.viewQuestion', ['id'=>$prepare_question_paper_amw->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#ViewQuestionPaperModal" data-placement="left" title="Show" href="#">View</a>
                                                   <a href="{{ URL::route('examination.amw.editQuestionPaper', ['id'=>$prepare_question_paper_amw->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#edit_amw_QuestionPapermodal" data-placement="left" title="Edit" href="#">Edit</a>

                                                   <a href="{{ URL::to('#') }}" class="btn btn-default" >AAF</a>
                                                   <a href="{{ URL::to('#') }}" class="btn btn-default" >AF</a>

                                                </td>
                                            </tr>
                                      @endforeach
                                    </tbody>
                        </table>
                    {{form::close() }}

@include('examination::amw.prepare_question_paper._modal._create_question_paper')
@include('examination::amw.prepare_question_paper._modal._view_question_paper')
@include('examination::amw.prepare_question_paper._modal._edit_question_paper')
@stop
