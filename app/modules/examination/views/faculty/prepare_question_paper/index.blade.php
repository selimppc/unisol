@extends('layouts.master')
@section('sidebar')
    @include('examination::_sidebar')
@stop
@section('content')
        <h1>Welcome to Prepare Question paper : <strong>{{ ucwords(Auth::user()->username) }}</strong> </h1> <br>
                    {{ Form::open(array('url' => 'examination/faculty/batchDelete')) }}

                        <table id="example" class="table table-striped  table-bordered"  >
                                    <thead>
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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($datas as $prepare_question_paper_faculty)
                                        <tr>
                                            <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $prepare_question_paper_faculty['id'] }}"></td>
                                            {{--<td>{{$prepare_question_paper_faculty['id']}} </td>--}}
                                            <td>{{$prepare_question_paper_faculty->title}} </td>
                                            <td>{{$prepare_question_paper_faculty->deadline}}</td>
                                            <td>{{$prepare_question_paper_faculty->relCourseManagement->relCourse->relSubject->relDepartment->title}}</td>
                                            <td>{{$prepare_question_paper_faculty->relCourseManagement->relYear->title }} </td>
                                            <td>{{$prepare_question_paper_faculty->relCourseManagement->relSemester->title}}</td>
                                            <td>
                                              <a href="{{ URL::route('examination.faculty.viewQuestion', ['qid'=>$prepare_question_paper_faculty->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#ViewQuestionPaperModal" data-placement="left" title="Show" href="#">View</a>
                                              <a href="{{ URL::route('examination.faculty.add_question_items', ['qid'=>$prepare_question_paper_faculty->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#AddQuestionItemsModal" data-toggle="tooltip" data-placement="left" title="Edit" href="#">Add Question Item</a>
                                           </td>
                                         </tr>
                                      @endforeach
                                    </tbody>
                        </table>
                    {{form::close() }}

@include('examination::faculty.prepare_question_paper._modal')
@stop
