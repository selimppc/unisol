@extends('layouts.master')
@section('sidebar')
    @include('examination::_sidebar')
@stop
@section('content')
        <h1>Welcome to Prepare Question paper : AMW </h1> <br>
                    {{ Form::open(array('url' => 'examination/amw/batchDelete')) }}
                        <table id="example" class="table table-striped  table-bordered"  >
                                    <thead>
                                          <div class="btn-group" style="margin-right: 10px">
                                                <button type="button" class="btn btn-default" data-toggle="modal"
                                                          data-target="#CreateModal">
                                                            Create Question paper
                                                </button>
                                          </div>
                                         <br>
                                           {{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}
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
                                      @foreach($datas as $prepare_question_paper_amw)
                                            <tr>
                                                <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $prepare_question_paper_amw['id'] }}"></td>
                                                <td>{{$prepare_question_paper_amw->title}} </td>
                                                <td>{{$prepare_question_paper_amw->deadline}}</td>
                                                <td>{{$prepare_question_paper_amw->relCourseManagement->relCourse->relSubject->relDepartment->title}}</td>
                                                <td>{{$prepare_question_paper_amw->relCourseManagement->relYear->title }} </td>
                                                <td>{{$prepare_question_paper_amw->relCourseManagement->relSemester->title}}</td>
                                                <td> Mr. </td>
                                                <td>
                                                   <a href="{{ URL::route('examination.amw.viewQuestion', ['id'=>$prepare_question_paper_amw->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#ViewQuestionPaperModal" data-placement="left" title="Show" href="#">View</a>
                                                   <a href="{{ URL::route('examination.amw.editQuestionPaper', ['id'=>$prepare_question_paper_amw->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#edit_amw_QuestionPapermodal" data-placement="left" title="Edit" href="#">Edit</a>
                                                   <a class="btn btn-default" href="{{ action('ExmAmwController@assignTo') }}">Assign</a>
                                                </td>
                                            </tr>
                                      @endforeach
                                    </tbody>
                        </table>
                    {{form::close() }}

@include('examination::amw.prepare_question_paper._modal')
@stop
