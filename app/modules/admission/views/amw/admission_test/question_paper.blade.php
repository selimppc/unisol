@extends('layouts.master')
@section('sidebar')
    @include('admission::_sidebar_admission_test')
@stop
@section('content')


<h1>Welcome to Prepare Question paper <strong></strong> </h1> <br>
            {{--{{ Form::open(array('url' => 'admission/amw/batchDelete')) }}--}}
                <table id="example" class="table table-striped  table-bordered"  >
                    <thead>
                        <div class="row">
                            <div class="col-sm-12">

                                <div class="col-sm-6">
                                </div>

                                <div class="col-sm-6">
                                    <div class="btn-group" style="margin-right: 10px">
                                        <button type="button" class="btn btn-default btn-xs" data-toggle="modal"
                                                  data-target="#CreateModal">
                                                    Create Question paper
                                        </button>
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
                            {{--<th>Year</th>--}}
                            {{--<th>Term</th>--}}
                            <th>Assigned</th>
                            <th>Status</th>
                            <th>Action</th>
                         </tr>
                    </thead>

                    <tbody>
                      @foreach($adm_question_paper as $adm_question_paper_list)
                            <tr>
                                <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $adm_question_paper_list['id'] }}"></td>

                                <td> {{ HTML::linkAction('ExmAmwController@questionsItemShow', $adm_question_paper_list->title,['question_item_id'=>$adm_question_paper_list['id']]) }} </td>

                                <td>{{$adm_question_paper_list->deadline}}</td>
                                <td>{{$adm_question_paper_list->relCourseManagement->relCourse->relSubject->relDepartment->title}}</td>
                                {{--<td>{{$prepare_question_paper_amw->relCourseManagement->relYear->title }} </td>--}}
                                {{--<td>{{$prepare_question_paper_amw->relCourseManagement->relSemester->title}}</td>--}}

                                <td> </td>

                                <td> </td>
                                {{--<td>{{ $prepare_question_paper_amw->relUser->relUserProfile->first_name.' '.$prepare_question_paper_amw->relUser->relUserProfile->middle_name.' '.$prepare_question_paper_amw->relUser->relUserProfile->last_name }}</td>--}}
                                <td>
                                   {{--<a href="{{ URL::route('admission.amw.viewQuestion', ['id'=>$adm_question_paper_list->id])  }}" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Show" href="#">View</a>--}}
                                   {{--<a href="{{ URL::route('admission.amw.editQuestionPaper', ['id'=>$adm_question_paper_list->id])  }}" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Edit" href="#">Edit</a>--}}

                                   {{--<a href="" class="btn btn-default btn-xs" data-toggle="modal" data-target="#ass_fac" data-placement="left" title="Assign Faculty" href="#">Assign Faculty</a>--}}
                                </td>
                            </tr>
                      @endforeach
                    </tbody>
                </table>

            {{form::close() }}

{{--@include('admission::amw.admission_test._modal._create_question_paper')--}}
@include('admission::amw.admission_test._modal._common_modal')


@stop