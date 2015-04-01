@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_faculty')
@stop

@section('content')
    <h2> Question Paper</h2>


    <div class="row">
          <div class="col-sm-12">
                <h4> <strong> Degree : </strong>{{ Degree::findOrFail($degree_id)->relDegreeProgram->code.'
                                               '.Degree::findOrFail($degree_id)->relDegreeGroup->code.' in
                                               '.$degree_data->relDepartment->title.',
                                               '.Semester::findOrFail($semester_id)->title.',
                                               '.Year::findOrFail($year_id)->title }} </h4>
          </div>
    </div>


     {{ Form::open(array('url' => 'admission/faculty/admission-test/qpBatchDelete')) }}
                    <table id="example" class="table table-striped  table-bordered"  >
                          <thead>
                               {{ Form::submit('Delete Items', array('class'=>'btn btn-danger btn-xs', 'id'=>'hide-button', 'style'=>'display:none'))}}

                                 <br>
                                 <tr>
                                    <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                                    <th>Title</th>
                                    <th>Deadline</th>
                                    <th>Subject</th>
                                    <th>Dept</th>
                                    <th>Year</th>
                                    <th>Term</th>
                                    <th>Is Examiner</th>
                                    <th>Action</th>
                                 </tr>
                      </thead>
                      <tbody>
                          @foreach($admtest_question_paper as $admtest_question_paper_list)
                                <tr>
                                    <td><input type="checkbox" name="id[]" class="myCheckbox" value="{{ $admtest_question_paper_list['id'] }}"></td>

                                    <td>{{ $admtest_question_paper_list->title }}</td>

                                    <td>{{ $admtest_question_paper_list->deadline }}</td>

                                    <td>{{ $admtest_question_paper_list->relBatchAdmTestSubject->relAdmTestSubject->title }}</td>

                                    <td>{{ $admtest_question_paper_list->relBatchAdmTestSubject->relBatch->relDegree->relDepartment->title }}</td>

                                    <td>{{ $admtest_question_paper_list->relBatchAdmTestSubject->relBatch->relYear->title }} </td>

                                     <td>{{ $admtest_question_paper_list->relBatchAdmTestSubject->relBatch->relSemester->title }}</td>

                                     <td>{{ $admtest_question_paper_list->status }} </td>

                                    <td>
                                        <a href="{{ URL::route('admission.faculty.question-papers.view-question-paper',['id'=>$admtest_question_paper_list->id]) }}" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal">VQP</a>
                                        <a href="{{ URL::route('admission.faculty.question-papers.view-questions-items',['id'=>$admtest_question_paper_list->id]) }}" class="btn btn-primary btn-xs" >VQs</a>
                                        <a href="{{ URL::route('admission.faculty.question-papers.add-question-paper-item',['qid'=>$admtest_question_paper_list->id]) }}" class="btn btn-info btn-xs " data-toggle="modal" data-target="#modal">AQ</a>
                                        <a href="{{ URL::route('admission.faculty.question-papers.assign-to-question-paper',['qid'=>$admtest_question_paper_list->id]) }}" class="btn bg-purple btn-xs" data-toggle="modal" data-target="#modal" >Comments</a>

                                        <a href="" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal_assign" data-placement="left" title="Comments" href="#">Assign</a>


                                        <a href="{{ URL::route('admission.faculty.question-papers.evaluate-questions') }}" class="btn bg-navy btn-xs disabled" >Evaluate</a>
                                    </td>
                                </tr>
                          @endforeach
                      </tbody>
                    </table>
     {{ Form::close() }}


<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="z-index:1050">
          <div class="modal-content">

          </div>
    </div>
</div>


{{--<div class="modal fade" id="modal_assign" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">--}}
    {{--<div class="modal-dialog">--}}
        {{--<div class="modal-content">--}}
            {{--<div class="modal-header">--}}
                {{--<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>--}}
                {{--<h4 class="modal-title" id="myModalLabel">Be Assigned to QP </h4>--}}
            {{--</div>--}}

            {{--<div class="modal-body">--}}
                     {{--{{ Form::open(array('url' => 'admission/faculty/question-papers/be_assign', 'method' =>'post', 'role'=>'form','files'=>'true'))  }}--}}
                            {{--&nbsp;&nbsp;&nbsp;--}}
                            {{--{{Form::hidden('adm_question_id', $admtest_question_paper->id, ['class'=>'form-control'])}}--}}
                            {{--@include('admission::faculty.question_papers.assign_qp')--}}
                    {{--{{ Form::close() }}--}}
            {{--</div>--}}
            {{--<div class="modal-footer">--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}


@stop